<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ResetPasswordEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email'
            ], [
                'email.required' => 'Email không được để trống!',
                'email.email' => 'Email không đúng định dạng!',
            ]
        );

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->token = Str::random(60);
            Mail::to($request->email)->send(new ResetPasswordEmail($user));
        } else {
            return back()->withErrors(['email' => 'Email không tồn tại!']);
        }

        return back()->with(['status' => 'Link đã được gửi thành công, vui lòng kiểm tra Mail của bạn!']);
    }
}
