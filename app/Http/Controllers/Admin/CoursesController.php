<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Imports\CoursesImport;
use App\Models\Category;
use App\Models\Courses;
use App\Models\UserCourse;
use App\Models\Rating;
use App\Models\ReplyRating;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Mockery\Exception;
use Maatwebsite\Excel\Facades\Excel;

class CoursesController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.courses';

    public function __construct()
    {
        $this->middleware('permission:courses.index', ['only' => ['index']]);
        $this->middleware('permission:courses.create', ['only' => ['create', 'store', 'import']]);
        $this->middleware('permission:courses.update', ['only' => ['edit', 'update', 'updateCourseStatus']]);
        $this->middleware('permission:courses.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:courses.show', ['only' => ['show']]);
    }

    public function index()
    {
        $data = Courses::join('users', 'users.id', '=', 'courses.UserID')
            ->select('courses.*', 'users.firstName', 'users.lastName', 'users.username')
            ->orderByDesc('created_at')
            ->paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
    }

    public function add()
    {
        $categories = Category::all();

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'CategoryID' => 'required',
                'CourseCode' => 'required|max:255|unique:courses,CourseCode',
                'CourseName' => 'required|max:255',
                'CourseSubTitle' => 'required|max:255',
                'Slug' => 'required|max:255',
                'Price' => 'required|numeric',
                'Discount' => 'required|numeric',
                'ImageData' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'IntroVideoLink' => 'required|max:255',
            ]);

            $model = new Courses();
            $model->fill($request->except('ImageData'));

            if ($request->hasFile('ImageData')) {
                $model->ImageData = upload_file(OBJECT_COURSE, $request->file('ImageData'));
            }

            $model->save();
            return redirect()->route('courses.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

//    show
    public function show(string $id)
    {
        $detail = Courses::query()->findOrFail($id);
        $categories = Category::all();
        $chapters = $detail->chapters()->orderBy('SortNumber')->paginate(10);

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('detail', 'chapters', 'categories'));
    }

    public function import(Request $request)
    {
        $file = $request->file('excel_file');
        $this->validate($request, [
            'excel_file' => 'required|mimes:xlsx,xls',
        ]);

        try {
            Excel::import(new CoursesImport, $file);
            return redirect()->route('courses.index')->with('success', 'Nhập dữ liệu thành công!');
        } catch (Exception $e) {
            return redirect()->route('courses.index')->with('error', 'Lỗi nhập dữ liệu: ');
        }
    }


    public function edit(string $id)
    {
        $detail = Courses::query()->findOrFail($id);
        $categories = Category::all();

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('detail', 'categories'));
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'CategoryID' => 'required',
                'CourseCode' => 'required|max:255|unique:courses,CourseCode,' . $id,
                'CourseName' => 'required|max:255',
                'CourseSubTitle' => 'required|max:255',
                'Slug' => 'required|max:255',
                'Price' => 'required|numeric',
                'Discount' => 'required|numeric',
                'ImageData' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'IntroVideoLink' => 'required|max:255',
            ]);

            $model = Courses::find($id);

            if (!$model) {
                return response()->json(['message' => 'Không tìm thấy khóa học'], 404);
            }

            $model->fill($request->except('ImageData'));

            if ($request->hasFile('ImageData')) {
                if (!strpos($model->ImageData, "default")) {
                    delete_file($model->ImageData);
                }
                $model->ImageData = upload_file(OBJECT_COURSE, $request->file('ImageData'));
            }

            $model->save();

            return redirect()->route('courses.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422);
        }
    }

    public function destroy(string $id)
    {
        $model = Courses::findOrFail($id);
        $model->delete();
        delete_file($model->ImageData);
        return redirect()->route('courses.index');
    }

    public function updateCourseStatus(Request $request)
    {
        $course = Courses::findOrFail($request->id);
        $course->CourseStatus = $request->CourseStatus;
        $course->save();
        return 1;
    }

    public function ratingManagement(string $id)
    {
        try{
        $data = Rating::join('users', 'users.id', '=', 'rating.UserID')
            ->select('rating.*', 'users.firstName', 'users.lastName', 'users.username','users.email')
            ->where('CourseID', $id)
            ->paginate(10);
            $data->course = Courses::findOrFail($id);

        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
        }catch (Exception $e){
            return redirect()->route('courses.index');
        }
    }

    public function ratingDetail(string $id){
        try{
        $data = Rating::join('users', 'users.id', '=', 'rating.UserID')
            ->select('rating.*', 'users.firstName', 'users.lastName', 'users.username','users.email')
            ->where('rating.id', $id)
            ->first();
            $data->ReplyRating = ReplyRating::join('users', 'users.id', '=', 'reply_rating.UserID')
            ->select('reply_rating.*', 'users.firstName', 'users.lastName', 'users.username','users.email','users.id as UserID')
            ->where('RatingID', $id)
            ->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data'));
        }catch (Exception $e){
            return redirect()->route('courses.index');
        }
    }

    public function deleteRating(string $id){
        $ratingModel = Rating::findOrFail($id);
        $replyRatingModel = ReplyRating::where('RatingID',$id)->get();
        try{
            foreach($replyRatingModel as $replyRating){
                $replyRating->delete();
            }
            $ratingModel->delete();
            return json_encode(['status'=>1,'message'=>'Xóa đánh giá thành công']);
        }catch(Exception $e){
            return json_encode(['status'=>0,'message'=> $e->getMessage()]);
        }
    }

    public function deleteReplyRating(string $id){
        $replyRatingModel = ReplyRating::findOrFail($id);
        try{
            $replyRatingModel->delete();
            return json_encode(['status'=>1,'message'=>'Xóa đánh giá thành công']);
        }catch(Exception $e){
            return json_encode(['status'=>0,'message'=> $e->getMessage()]);
        }
    }
}
