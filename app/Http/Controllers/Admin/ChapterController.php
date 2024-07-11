<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\ChapterImport;
use App\Models\Chapter;
use App\Models\Courses;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ChapterController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.chapter';

    public function __construct()
    {
        $this->middleware('permission:chapter.index', ['only' => ['index']]);
        $this->middleware('permission:chapter.create', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:chapter.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:chapter.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:chapter.show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chapters = Chapter::join('courses', 'course_chapters.CourseID', '=', 'courses.id')
            ->select('course_chapters.*', 'courses.CourseName')
            ->orderBy('course_chapters.SortNumber', 'asc')
            ->paginate(10);

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('chapters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $idCourse = null)
    {

        $courses = Courses::all();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('courses', 'idCourse'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $idCourse = null)
    {
        if ($idCourse) {
            $request->merge(['CourseID' => $idCourse]);
        }
        $data = $request->except('_token');
        try {
            $request->validate([
                'CourseID' => 'required',
                'ChapterName' => 'required|max:255',
                'SortNumber' => 'required|integer|min:0',
            ]);
            if (DB::table('course_chapters')->where('CourseID', $request->CourseID)
                ->where('SortNumber', $request->SortNumber)->exists()) {
                $err = 'Số thứ tự đã tồn tại: ' . $request->CourseID;
                return response()->json(['message' => $err], 422);
            }
            Chapter::create($data);
            return redirect()->route('chapter.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    public function import(Request $request)
    {
        $file = $request->file('excel_file');
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new ChapterImport(), $file);
            return redirect()->route('chapter.index')->with('success', 'Nhập dữ liệu thành công!');
        } catch (Exception $e) {
            return redirect()->route('chapter.index')->with('error', 'Lỗi nhập dữ liệu: ');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $courses = Courses::all();
        $lessons = $chapter->lessons()->paginate(10);

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('chapter', 'lessons', 'courses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        $courses = Courses::all();

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact(['chapter', 'courses']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->except('_token');
        try {
            $request->validate([
                'CourseID' => 'required',
                'ChapterName' => 'required|max:255',
                'SortNumber' => 'required|integer|min:0',
            ]);
            if (DB::table('course_chapters')->where('CourseID', $request->CourseID)
                ->where('SortNumber', $request->SortNumber)
                ->where('id', '!=', $id)->exists()) {
                $err = 'Số thứ tự đã tồn tại: ' . $request->CourseID;
                return response()->json(['message' => $err], 422);
            }
            $chapter = Chapter::findOrFail($id);
            if (!$chapter) {
                return response()->json(['message' => 'Không tìm thấy khóa học!'], 404);
            }
            $chapter->update($data);
            return redirect()->route('chapter.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $chapter = Chapter::findOrFail($id);
        if ($chapter) {
            $chapter->delete();
            return redirect()->route('chapter.index');
        }
    }
}
