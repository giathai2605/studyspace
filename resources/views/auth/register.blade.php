@extends('auth.layouts.guest')
@section('content')
    <div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
        <div class="rounded-sm border border-stroke shadow-default dark:border-strokedark dark:bg-boxdark"
             style="background-color: rgb(109, 40, 217);">
            <div class="flex flex-wrap items-center">
                <div class="hidden w-full xl:block xl:w-1/2">
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
                            Đăng ký
                        </h2>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-4 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">
                                        Tên
                                    </label>
                                    <input name="firstName" type="text" placeholder="Nhập tên..."
                                           value="{{ old('firstName') }}"
                                           class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="mt-2 text-md" style="color:red">
                                        @error('firstName')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">
                                        Họ
                                    </label>
                                    <input name="lastName" type="text" placeholder="Nhập họ..."
                                           value="{{ old('lastName') }}"
                                           class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="mt-2 text-md" style="color:red">
                                        @error('lastName')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4 flex flex-col gap-6 xl:flex-row">
                                <div class="w-full xl:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">
                                        Số điện thoại
                                    </label>
                                    <input name="phone" type="text" placeholder="Nhập số điện thoại..."
                                           value="{{ old('phone') }}"
                                           class="w-full rounded border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="mt-2 text-md" style="color:red">
                                        @error('phone')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>

                                <div class="w-full xl:w-1/2">
                                    <label class="mb-2.5 block font-medium text-black dark:text-white">
                                        Giới tính
                                    </label>
                                    <div class="relative z-20 bg-transparent dark:bg-form-input">
                                        <select name="gender"
                                                class="relative z-20 w-full appearance-none rounded border border-stroke bg-transparent py-3 px-5 outline-none transition focus:border-primary active:border-primary dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
                                            <option value="">Chọn giới tính</option>
                                            <option value="1" {{ old('gender') == '1' ? 'selected' : '' }}>Nam</option>
                                            <option value="0" {{ old('gender') == '0' ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                        <span class="absolute top-1/2 right-4 z-30 -translate-y-1/2">
                                            <svg class="fill-current" width="24" height="24" viewBox="0 0 24 24"
                                                 fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <g opacity="0.8">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M5.29289 8.29289C5.68342 7.90237 6.31658 7.90237 6.70711 8.29289L12 13.5858L17.2929 8.29289C17.6834 7.90237 18.3166 7.90237 18.7071 8.29289C19.0976 8.68342 19.0976 9.31658 18.7071 9.70711L12.7071 15.7071C12.3166 16.0976 11.6834 16.0976 11.2929 15.7071L5.29289 9.70711C4.90237 9.31658 4.90237 8.68342 5.29289 8.29289Z"
                                                          fill=""></path>
                                                </g>
                                            </svg>
                                        </span>
                                    </div>
                                    <span class="mt-2 text-md" style="color:red">
                                        @error('gender')
                                        {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Tên người
                                    dùng</label>
                                <div class="relative">
                                    <input type="text" name="username" placeholder="Nhâp tên người dùng..."
                                           value="{{ old('username') }}"
                                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-5 font-medium outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="absolute right-4 top-3">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.5">
                                                <path
                                                    d="M11.0008 9.52185C13.5445 9.52185 15.607 7.5281 15.607 5.0531C15.607 2.5781 13.5445 0.584351 11.0008 0.584351C8.45703 0.584351 6.39453 2.5781 6.39453 5.0531C6.39453 7.5281 8.45703 9.52185 11.0008 9.52185ZM11.0008 2.1656C12.6852 2.1656 14.0602 3.47185 14.0602 5.08748C14.0602 6.7031 12.6852 8.00935 11.0008 8.00935C9.31641 8.00935 7.94141 6.7031 7.94141 5.08748C7.94141 3.47185 9.31641 2.1656 11.0008 2.1656Z"
                                                    fill=""
                                                />
                                                <path
                                                    d="M13.2352 11.0687H8.76641C5.08828 11.0687 2.09766 14.0937 2.09766 17.7719V20.625C2.09766 21.0375 2.44141 21.4156 2.88828 21.4156C3.33516 21.4156 3.67891 21.0719 3.67891 20.625V17.7719C3.67891 14.9531 5.98203 12.6156 8.83516 12.6156H13.2695C16.0883 12.6156 18.4258 14.9187 18.4258 17.7719V20.625C18.4258 21.0375 18.7695 21.4156 19.2164 21.4156C19.6633 21.4156 20.007 21.0719 20.007 20.625V17.7719C19.9039 14.0937 16.9133 11.0687 13.2352 11.0687Z"
                                                    fill=""
                                                />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <span class="mt-2 text-md" style="color:red">
                                    @error('username')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Email</label>
                                <div class="relative">
                                    <input type="email" name="email" placeholder="Nhập địa chỉ email..."
                                           value="{{ old('email') }}"
                                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-5 font-medium outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <span class="absolute right-4 top-3">
                                        <svg class="fill-current" width="22" height="22" viewBox="0 0 22 22" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <g opacity="0.5">
                                                <path
                                                    d="M19.2516 3.30005H2.75156C1.58281 3.30005 0.585938 4.26255 0.585938 5.46567V16.6032C0.585938 17.7719 1.54844 18.7688 2.75156 18.7688H19.2516C20.4203 18.7688 21.4172 17.8063 21.4172 16.6032V5.4313C21.4172 4.26255 20.4203 3.30005 19.2516 3.30005ZM19.2516 4.84692C19.2859 4.84692 19.3203 4.84692 19.3547 4.84692L11.0016 10.2094L2.64844 4.84692C2.68281 4.84692 2.71719 4.84692 2.75156 4.84692H19.2516ZM19.2516 17.1532H2.75156C2.40781 17.1532 2.13281 16.8782 2.13281 16.5344V6.35942L10.1766 11.5157C10.4172 11.6875 10.6922 11.7563 10.9672 11.7563C11.2422 11.7563 11.5172 11.6875 11.7578 11.5157L19.8016 6.35942V16.5688C19.8703 16.9125 19.5953 17.1532 19.2516 17.1532Z"
                                                    fill=""
                                                />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <span class="mt-2 text-md" style="color:red">
                                @error('email')
                                {{ $message }}
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Mật khẩu</label>
                                <div class="relative">
                                    <input type="password" name="password" id="password" placeholder="Nhập mật khẩu..."
                                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-5 font-medium outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <button type="button" id="toggleBtn" class="absolute right-4 top-3">
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
                            </div>

                            <div class="mb-6">
                                <label class="mb-2.5 block font-medium text-black dark:text-white">Xác nhận mật
                                    khẩu</label>
                                <div class="relative">
                                    <input type="password" name="password_confirmation" id="re_password"
                                           placeholder="Xác nhận mật khẩu..."
                                           class="w-full rounded-lg border border-stroke bg-transparent py-3 px-5 font-medium outline-none focus:border-primary focus-visible:shadow-none dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary"/>
                                    <button type="button" id="re_toggleBtn" class="absolute right-4 top-3">
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
                                @error('password_confirmation')
                                {{ $message }}
                                @enderror
                            </div>

                            <div class="block my-4">
                                <label for="remember-me" class="inline-flex items-center">
                                    <input id="remember-me" type="checkbox"
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                           name="remember" checked {{ old('remember') ? 'checked' : '' }}
                                           @if (Cookie::has('email')) checked @endif>
                                    <span class="ml-3 text-md text-gray-600">{{ __('Nhớ tôi') }}</span>
                                </label>
                            </div>

                            {{-- input default --}}
                            <input type="text" name="address" id="" value="Viet Nam" hidden>
                            <input type="text" name="roleID" id="" value="3" hidden>
                            <input type="text" name="avatar" id="" value="storage/users/default.png" hidden>
                            <input type="number" name="userStatusID" id="" value="1" hidden>
                            <input type="date" name="birthday" id="" value="" hidden>

                            <div class="mb-5">
                                <input type="submit" value="Đăng ký"
                                       class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90"/>
                            </div>


                            <div class="mt-6 text-center">
                                <p class="font-medium">
                                    Bạn đã có tài khoản?
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
