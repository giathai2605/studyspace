@extends('auth.layouts.guest')
@section('content')
    @if (session('message'))
        <script>
            swal({
                title: "Thành công!",
                text: "{{ session('message') }}",
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
                            <img class="hidden dark:block" src="{{ asset('img/logo1.svg') }}" alt="Logo"/>
                            <img class="dark:hidden" src="{{ asset('img/logo1.svg') }}" alt="Logo"/>
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
                            Xác thực Email của bạn
                        </h2>

                        <div class="card-body">
                            <h4 class="text-xl text-black dark:text-white">Liên kết xác minh đã được gửi tới Email <b>[{{ auth()->user()->email }}]</b>. Nếu bạn không nhận được email, nhấn nút bên dưới để gửi yêu cầu khác.</h4>
                            <form class="mt-6" method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90">{{ __('Gửi yêu cầu khác') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
