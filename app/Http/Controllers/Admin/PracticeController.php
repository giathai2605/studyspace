<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\PracticeImport;
use App\Models\Lesson;
use App\Models\PracticeLessons;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PracticeController extends Controller
{
    const OBJECT = "admin.practice";
    const DOT = ".";

    public function __construct()
    {
        $this->middleware('permission:practice.index', ['only' => ['index']]);
        $this->middleware('permission:practice.create', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:practice.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:practice.destroy', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        $data = PracticeLessons::query()->where('LessonID', $id)->get();
        $lesson = Lesson::query()->where('id', $id)->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data', 'lesson'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $lesson = Lesson::query()->where('id', $id)->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('lesson'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'Problem' => 'required', // Kiểm tra email là duy nhất trong bảng 'users'
                'ProblemDetail' => 'required', // Kiểm tra first name không được trống
                'Explain' => 'required', // Kiểm tra last name không được trống
                'Suggest' => 'required', // Kiểm tra username không được trống không trùng
                'LessonID' => 'required'
            ]);

            $model = new PracticeLessons();
            $model->fill($request->all());
            $model->save();
//            return redirect()->route('practice.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }
    public function import(Request $request)
    {
        $lessonID = $request->input('LessonID');

        $file = $request->file('excel_file');
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new PracticeImport($lessonID), $file);
            return redirect()->route('lesson.index')->with('success', 'Data Imported!');
        } catch (Exception $e) {
            return redirect()->route('lesson.index')->with('error', 'Error importing data: ');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $lesson = Lesson::query()->where('id', $id)->get();
        $model = PracticeLessons::query()->findOrFail($id);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('model', 'lesson'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'Problem' => 'required',
                'ProblemDetail' => 'required',
                'Explain' => 'required',
                'Suggest' => 'required',
                'LessonID' => 'required'
            ]);

            $model = PracticeLessons::find($id);

            if (!$model) {
                return response()->json(['message' => 'Practice not found'], 404);
            }

            $model->fill($request->all());
            $model->save();

//            return redirect()->route('users.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $model = PracticeLessons::query()->findOrFail($id);
            $model->delete();
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }
}
