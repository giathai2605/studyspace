@extends('auth.layouts.guest')
@section('content')
    @if ($errors->any())
        <script>
            swal({
                title: "Lỗi!",
                text: "{{ $errors->first() }}",
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
                            Quên mật khẩu
                        </h2>

                        <form method="POST" action="{{ route('password.email') }}">
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
                            </div>

                            <div class="mb-5">
                                <input type="submit" value="Gửi link khôi phục mật khẩu"
                                       class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"/>
                            </div>

                            <div class="mt-6 text-center">
                                <p class="font-medium">
                                    Đã nhớ mật khẩu?
                                    <a href="{{ route('login') }}" class="text-primary">Đăng nhập</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
