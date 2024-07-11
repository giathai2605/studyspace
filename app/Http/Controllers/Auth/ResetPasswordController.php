<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
    protected string $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showResetForm(Request $request, $token, $email)
    {
        return view('auth.passwords.reset', ['token' => $token, 'email' => $email]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|max:255|regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]*$/',
            'password_confirmation' => 'same:password',
        ], [
            'password.required' => 'Mật khẩu không được để trống!',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự!',
            'password.max' => 'Mật khẩu không được quá 255 ký tự!',
            'password.regex' => 'Mật khẩu phải bao gồm cả chữ và số hoặc ký tự đặc biệt!',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp!',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email không tồn tại!']);
        }

        $user->forceFill([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ])->save();

        return redirect($this->redirectTo)->with('status', 'Đặt lại mật khẩu thành công!');
    }
}
