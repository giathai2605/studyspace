<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Courses;
use App\Models\VideoDoneData;
use App\Models\UserCourse;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    const DOT = '.';
    const OBJECT = 'admin.users';

    public function __construct()
    {
        $this->middleware('permission:users.index', ['only' => ['index']]);
        $this->middleware('permission:users.create', ['only' => ['create', 'store']]);
        $this->middleware('permission:users.staff', ['only' => ['staff']]);
        $this->middleware('permission:users.admin', ['only' => ['admin']]);
        $this->middleware('permission:users.customer', ['only' => ['customer']]);
        $this->middleware('permission:users.update', ['only' => ['edit', 'update']]);
        $this->middleware('permission:users.destroy', ['only' => ['destroy']]);
        $this->middleware('permission:users.show', ['only' => ['show']]);
        $this->middleware('permission:users.block', ['only' => ['block', 'updateUserStatus']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::all();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data')); //admin.users.index
    }

    public function admin()
    {
        $data = User::query()->where('roleID', 1)
            ->orderBy('users.id', 'desc')->paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data')); //admin.users.index
    }

    public function staff()
    {
        $data = User::query()->whereIn('roleID', [2, 3, 5])
            ->join('roles', 'users.roleID', '=', 'roles.id')
            ->orderBy('users.id', 'desc')->paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data')); //admin.users.index
    }

    public function customer()
    {
        $data = User::query()->where('roleID', 4)
            ->orderBy('users.id', 'desc')->paginate(10);
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('data')); //admin.users.index
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        $roleID = $id;
        $roles = Role::whereNot('name', 'Supper Admin')->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('roleID', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users', // Kiểm tra email là duy nhất trong bảng 'users'
                'firstName' => 'required', // Kiểm tra first name không được trống
                'lastName' => 'required', // Kiểm tra last name không được trống
                'username' => 'required|unique:users', // Kiểm tra username không được trống không trùng
                'password' => 'required|confirmed', // Kiểm tra password không được trống và phải được xác nhận
                'phone' => 'required|regex:/^\d{10}$/', // Kiểm tra phone theo một biểu thức chính quy (regex)
                'birthday' => 'required|before:today', // Kiểm tra birthday không được trống và phải trước ngày hiện tại
            ]);

            $model = new User();
            $roleName = Role::query()->findOrFail($request->roleID)->name;

            $model->fill($request->except('avatar', 're-password'));

            if ($request->hasFile('avatar')) {
                $model->avatar = upload_file(OBJECT_USER, $request->file('avatar'));
            }

            $model->save();
            $model->syncRoles($roleName);

//            return redirect()->route('users.index');
        } catch (ValidationException $e) {
            $errors = $e->validator->errors()->all();
            return response()->json(['message' => $errors], 422); //gửi mã lỗi để check ở js
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $profile = User::query()->findOrFail($id);
        $coursesAttended = UserCourse::query()->where('UserID', $id)->get()->count();
        $videoDone = VideoDoneData::query()->where('UserID', $id)->count();
        $isDoneCourse = UserCourse::query()->where('UserID', $id)->where('isdone', 1)->count();
        $donePercent = DB::table('user_courses')
            ->join('courses', 'user_courses.CourseID', '=', 'courses.id')
            ->select('user_courses.UserID', 'courses.CourseName', 'user_courses.DonePercent')
            ->where('user_courses.UserID', $id)
            ->get();
        return view('admin.users.profile', compact('profile', 'videoDone', 'isDoneCourse', 'coursesAttended', 'donePercent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = User::query()->findOrFail($id);
        $roles = Role::whereNot('name', 'Supper Admin')->get();
        return view(self::OBJECT . self::DOT . __FUNCTION__, compact('item', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email,' . $id, // Kiểm tra email là duy nhất trong bảng 'users' (ngoại trừ email hiện tại)
                'firstName' => 'required', // Kiểm tra first name không được trống
                'lastName' => 'required', // Kiểm tra last name không được trống
                'username' => 'required|unique:users,username,' . $id, // Kiểm tra username không được trống không trùng (ngoại trừ username hiện tại)
                'phone' => 'required|regex:/^\d{10}$/', // Kiểm tra phone theo một biểu thức chính quy (regex)
                'birthday' => 'required|date|before:today', // Kiểm tra birthday không được trống, phải là ngày và trước ngày hiện tại
            ]);

            $model = User::find($id);
            $roleName = Role::query()->findOrFail($request->roleID)->name;

            if (!$model) {
                return response()->json(['message' => 'User not found'], 404);
            }

            $model->fill($request->except('avatar', 're-password'));

            if ($request->hasFile('avatar')) {
                if (!strpos($model->avatar, "default")) {
                    delete_file($model->avatar);
                }
                $model->avatar = upload_file(OBJECT_USER, $request->file('avatar'));
            }

            $model->save();
            $model->syncRoles($roleName);

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
        $model = User::findOrFail($id);
        $model->delete();
        if (!strpos($model->avatar, "default")) {
            delete_file($model->avatar);
        }
//        return redirect()->route('users.index');
    }

    public function block(string $id)
    {
        $user = User::findOrFail($id);
        if ($user->userStatusID === 1) {
            $user->userStatusID = 0;
            $user->save();
        }
        return redirect()->route('users.index');
    }

    public function updateUserStatus(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->userStatusID = $request->userStatusID;
        $user->save();
        return 1;
    }
}
