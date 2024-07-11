@extends('auth.layouts.guest')
@section('content')
    @if ($errors->any())
        <script>
            swal({
                title: "Lỗi!",
                text: "{{$errors->first()}}",
                icon: "error",
                button: "OK",
            });
        </script>
    @endif

    @if (session('status'))
        <script>
            swal({
                title: "Thành công!",
                text: "{{ session('status') }}",
                icon: "success",
                button: "OK",
            });
        </script>
    @endif

    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
            <div class="flex flex-wrap items-center">
                <div class="hidden w-full xl:block xl:w-1/2" style="background-color: rgb(109, 40, 217);">
                    <div class="py-17.5 px-26 text-center">
                        <a href="{{ route('home') }}"
                           class="mb-5.5 inline-block">
                            <img class="hidden dark:block" src="{{ asset('img/logo2.svg') }}" alt="Logo"/>
                            <img class="dark:hidden" src="{{ asset('img/logo2.svg') }}" alt="Logo"/>
                        </a>
                        <p class="font-medium text-white text-2xl">
                            Chào mừng đến với Study Space!
                        </p>

                        <span class="mt-15 inline-block">
                            <img src="{{ asset('images/img1.png') }}" alt="illustration"/>
                        </span>
                    </div>
                </div>

                <div
                    class="w-full bg-white dark:bg-boxdark border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
                    <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                        <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                            Đăng nhập
                        </h2>

                        <form id="login-form" method="POST" action="{{ route('login') }}">
                            @csrf
                            @error('auth_error')
                            <div class="mb-4 text-md bg-danger text-xl text-white rounded p-2 text-center">
                                {{ $message }}
                            </div>
                            @enderror

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                                <div class="relative">
                                    <input type="email" name="email" id="email"
                                           placeholder="Nhập địa chỉ email của bạn..."
                                           @if (Cookie::has('email')) value="{{ Cookie::get('email') }}"
                                           @else value="{{ old('email') }}" @endif
                                           class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="absolute right-4 top-4">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.5">
                                                <path
                                                    d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                                    fill=""/>
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <span class="mt-2 text-md" style="color:red">
                                    @error('email')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-6">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Mật khẩu</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password"
                                           placeholder="Nhập mật khẩu của bạn..."
                                           @if (Cookie::has('password')) value="{{ Cookie::get('password') }}" @endif
                                           class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <button type="button" id="toggleBtn" class="absolute right-4 top-4">
                                        <svg xmlns='http://www.w3.org/2000/svg' height='22' width='22'
                                             viewBox='0 0 640 512'>
                                            <g opacity='0.5'>
                                                <path
                                                    d='M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z'/>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                                <span class="mt-2 text-md" style="color:red">
                                    @error('password')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="flex my-4" style="justify-content: space-between">
                                <label for="remember-me" class="inline-flex items-center">
                                    <input id="remember-me" type="checkbox"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                           name="remember" checked {{ old('remember') ? 'checked' : '' }}
                                           @if (Cookie::has('email')) checked @endif>
                                    <span class="ml-3 text-md text-gray-600">{{ __('Nhớ tôi') }}</span>
                                </label>
                                @if (Route::has('password.request'))
                                    <a class="text-md text-primary hover:text-opacity-70"
                                       href="{{ route('password.request') }}">
                                        {{ __('Quên mật khẩu?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="mb-5">
                                <input type="submit" value="Đăng nhập"
                                       class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"/>
                            </div>

{{--                            <button--}}
{{--                                class="flex w-full items-center justify-center gap-3.5 rounded-lg border border-stroke bg-gray p-4 font-medium hover:bg-opacity-70 dark:border-strokedark dark:bg-meta-4 dark:hover:bg-opacity-70">--}}
{{--                                <span>--}}
{{--                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"--}}
{{--                                         xmlns="http://www.w3.org/2000/svg">--}}
{{--                                        <g clip-path="url(#clip0_191_13499)">--}}
{{--                                            <path--}}
{{--                                                d="M19.999 10.2217C20.0111 9.53428 19.9387 8.84788 19.7834 8.17737H10.2031V11.8884H15.8266C15.7201 12.5391 15.4804 13.162 15.1219 13.7195C14.7634 14.2771 14.2935 14.7578 13.7405 15.1328L13.7209 15.2571L16.7502 17.5568L16.96 17.5774C18.8873 15.8329 19.9986 13.2661 19.9986 10.2217"--}}
{{--                                                fill="#4285F4"/>--}}
{{--                                            <path--}}
{{--                                                d="M10.2055 19.9999C12.9605 19.9999 15.2734 19.111 16.9629 17.5777L13.7429 15.1331C12.8813 15.7221 11.7248 16.1333 10.2055 16.1333C8.91513 16.1259 7.65991 15.7205 6.61791 14.9745C5.57592 14.2286 4.80007 13.1801 4.40044 11.9777L4.28085 11.9877L1.13101 14.3765L1.08984 14.4887C1.93817 16.1456 3.24007 17.5386 4.84997 18.5118C6.45987 19.4851 8.31429 20.0004 10.2059 19.9999"--}}
{{--                                                fill="#34A853"/>--}}
{{--                                            <path--}}
{{--                                                d="M4.39899 11.9777C4.1758 11.3411 4.06063 10.673 4.05807 9.99996C4.06218 9.32799 4.1731 8.66075 4.38684 8.02225L4.38115 7.88968L1.19269 5.4624L1.0884 5.51101C0.372763 6.90343 0 8.4408 0 9.99987C0 11.5589 0.372763 13.0963 1.0884 14.4887L4.39899 11.9777Z"--}}
{{--                                                fill="#FBBC05"/>--}}
{{--                                            <path--}}
{{--                                                d="M10.2059 3.86663C11.668 3.84438 13.0822 4.37803 14.1515 5.35558L17.0313 2.59996C15.1843 0.901848 12.7383 -0.0298855 10.2059 -3.6784e-05C8.31431 -0.000477834 6.4599 0.514732 4.85001 1.48798C3.24011 2.46124 1.9382 3.85416 1.08984 5.51101L4.38946 8.02225C4.79303 6.82005 5.57145 5.77231 6.61498 5.02675C7.65851 4.28118 8.9145 3.87541 10.2059 3.86663Z"--}}
{{--                                                fill="#EB4335"/>--}}
{{--                                        </g>--}}
{{--                                        <defs>--}}
{{--                                            <clipPath id="clip0_191_13499">--}}
{{--                                                <rect width="20" height="20" fill="white"/>--}}
{{--                                            </clipPath>--}}
{{--                                        </defs>--}}
{{--                                    </svg>--}}
{{--                                </span>--}}
{{--                                Đăng nhập Google--}}
{{--                            </button>--}}

                            <div class="mt-6 text-center">
                                <p class="font-medium">
                                    Bạn chưa có tài khoản?
                                    <a href="{{ route('register') }}" class="text-primary">Đăng ký</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
