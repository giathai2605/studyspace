<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\PasswordChangedEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showChangeForm()
    {
        return view('newclient.dashboard.change_password.index');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|max:255|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]*$/',
            'new_password_confirmation' => 'same:new_password',
        ], [
            'current_password.required' => 'Mật khẩu hiện tại không được để trống!',
            'new_password.required' => 'Mật khẩu mới không được để trống!',
            'new_password.min' => 'Mật khẩu mới phải có ít nhất 8 ký tự!',
            'new_password.max' => 'Mật khẩu mới không được quá 255 ký tự!',
            'new_password.regex' => 'Mật khẩu mới phải bao gồm cả chữ và số hoặc ký tự đặc biệt!',
            'new_password_confirmation.same' => 'Xác nhận mật khẩu mới không khớp!',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng!']);
        }

        $user->forceFill([
            'password' => Hash::make($request->new_password),
        ])->save();

        Mail::to($user->email)->send(new PasswordChangedEmail($user));

        return redirect()->route('password.change.form')->with('status', 'Mật khẩu đã được thay đổi thành công!');
    }
}
