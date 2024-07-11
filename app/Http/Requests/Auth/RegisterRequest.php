<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'regex:/^(?:\+84|0)(?:3[2-9]|5[2689]|7[06-9]|8[1-9]|9[0-9])[0-9]{7}$/', 'unique:' . User::class],
            'gender' => ['required'],
            'username' => ['required', 'string', 'max:255', 'unique:' . User::class],
            'email' => ['required', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'min:8', 'max:255', 'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*?&]*$/'],
            'password_confirmation' => ['required', 'same:password'],
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'Vui lòng nhập tên của bạn!',
            'firstName.string' => 'Tên không đúng định dạng!',
            'firstName.max' => 'Tên quá dài!',
            'lastName.required' => 'Vui lòng nhập họ của bạn!',
            'lastName.string' => 'Họ không đúng định dạng!',
            'lastName.max' => 'Họ quá dài!',
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn!',
            'phone.regex' => 'Số điện thoại không đúng định dạng!',
            'phone.unique' => 'Số điện thoại này đã được sử dụng!',
            'gender.required' => 'Vui lòng chọn giới tính của bạn!',
            'username.required' => 'Vui lòng nhập tên người dùng!',
            'username.string' => 'Tên người dùng không đúng định dạng!',
            'username.max' => 'Tên người dùng quá dài!',
            'username.unique' => 'Tên người dùng đã được sử dụng!',
            'email.required' => 'Vui lòng nhập email của bạn!',
            'email.email' => 'Email không đúng định dạng!',
            'email.max' => 'Email quá dài!',
            'email.unique' => 'Email này đã được sử dụng!',
            'password.required' => 'Vui lòng nhập mật khẩu!',
            'password.regex' => 'Mật khẩu phải bao gồm cả chữ và số hoặc ký tự đặc biệt!',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự!',
            'password.max' => 'Mật khẩu quá dài!',
            'password_confirmation.required' => 'Vui lòng xác nhận mật khẩu!',
            'password_confirmation.same' => 'Xác nhận mật khẩu không chính xác!',
        ];
    }
}
