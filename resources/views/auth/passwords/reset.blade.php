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
                            Đặt lại mật khẩu
                        </h2>

                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            @error('auth_error')
                            <div class="mb-4 text-md bg-danger text-xl text-white rounded p-2 text-center">
                                {{ $message }}
                            </div>
                            @enderror

                            <input type="hidden" name="token" value="{{ $token }}">
                            <input type="hidden" name="email" value="{{ $email }}">

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Mật khẩu mới</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password"
                                           placeholder="Nhập mật khẩu mới"
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
                            </div>
                            <div class="mb-6">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Xác nhận mật
                                    khẩu</label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="re_password"
                                           placeholder="Xác nhận mật khẩu"
                                           class="w-full rounded-lg border border-stroke bg-transparent py-4 pl-6 pr-10 outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <button type="button" id="re_toggleBtn" class="absolute right-4 top-4">
                                        <svg xmlns='http://www.w3.org/2000/svg' height='22' width='22'
                                             viewBox='0 0 640 512'>
                                            <g opacity='0.5'>
                                                <path
                                                    d='M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z'/>
                                            </g>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <div class="mb-5">
                                <input type="submit" value="Đặt lại mật khẩu"
                                       class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

