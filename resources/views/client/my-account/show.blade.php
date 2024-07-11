@extends('client.layouts.main')
@section('content')
    <style>
        .user {
            background-color: #FFF;
            border-radius: 15px;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            transition: all 0.5s ease;
        }

        .user:hover {
            box-shadow: none;
            transition: all 1s ease;
        }

        .usser {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .left {
            background-color: #363949;
            color: #fff;
            border-radius: 15px 0px 0px 15px;
            padding: 40px;
        }

        .left span {
            color: #fff;
            font-size: 15px;
            margin: 10px 0;
        }

        .right {
            background-color: #fff;
            color: #000;
            border-radius: 15px;
            padding: 40px;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .right h4 {
            text-align: center;
            font-size: 35px;
        }

        .right p {
            text-align: justify;
            margin: 20px 0;
        }

        .absolute {
            position: relative;
        }

        .image img {
            border-radius: 50%;
            width: 200px;
            height: 200px;
        }

        .image .absolute i {
            position: absolute;
            font-size: 20px;
            background-color: #fff;
            color: #363949;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            bottom: 5%;
            transform: translatex(-50%)
        }

        .mt-4 h3 {
            text-align: center;
            color: #fff;
        }

        .content {
            margin: 50px 0;
            width: 100%;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dark {
            display: flex;
            justify-content: space-between;
            gap: 50px;
        }

        .edit {
            font-weight: bold;
            margin-top: 20px;
            width: 100%;
            background-color: #fff;
            color: #363949;
            padding: 10px 0;
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .edit:hover {
            background-color: #363949;
            color: #fff;
            transition: all 0.5s ease;
            border: 1px solid #fff;
            transition: all 0.3s ease;
        }
    </style>
    <main class="main_content">
        <div class="container">
            <div class="mx-auto max-w-242.5">
                <!-- ====== Profile Section Start -->
                <div class="user ">
                    <div class="usser">
                        <div class="left">
                            <div class="">
                                <div class="relative image flex justify-center content-center">
                                    <img src="{{ asset($profile->avatar) }}"
                                         class="max-w-30 rounded-full  backdrop-blur sm:h-44 sm:max-w-44 sm:p-3"
                                         alt="profile"/>
                                    {{--                                    <label for="profile"--}}
                                    {{--                                           class="absolute flex h-8.5 w-8.5 cursor-pointer items-center justify-center rounded-full hover:bg-opacity-90 sm:bottom-2 sm:right-2">--}}
                                    {{--                                        <i class='bx bxs-camera-plus'></i>--}}
                                    {{--                                        form--}}
                                    {{--                                        <input type="file" name="profile" id="profile" class="sr-only"/>--}}
                                    {{--                                    </label>--}}
                                </div>
                            </div>
                            <div class="mt-4">
                                <h3 class="mb-1.5 text-2xl font-bold text-black dark:text-white">
                                    {{ $profile->firstName . ' ' . $profile->lastName }}
                                </h3>
                                <h3 class="mb-1.5 text-md font-medium text-black opacity-75 dark:text-white">
                                    {{ '@' . $profile->username }}
                                </h3>
                                <div class="content space-y-5 dark:border-strokedark dark:bg-[#37404F]">
                                    <div class="">
                                        <div class="dark dark:border-strokedark xsm:flex-row">
                                            <span class="font-semibold">Phone number: </span>
                                            <span
                                                class="text-md text-black dark:text-white">{{ $profile->phone }}</span>
                                        </div>
                                        <div class="dark xsm:flex-row">
                                            <span class="font-semibold">Gender: </span>
                                            <span
                                                class="text-black dark:text-white">
                                                {{ $profile->gender == 1 ? 'Male' : 'female' }}
                                            </span>
                                        </div>
                                        <div class="dark xsm:flex-row">
                                            <span class="font-semibold">Birthday: </span>
                                            <span
                                                class="text-black dark:text-white">
                                                {{ \Carbon\Carbon::parse($profile->birthday)->format('d/m/Y') }}
                                            </span>
                                        </div>
                                        <a href="{{ route('account.edit', ['id' => $profile->id] )}}">
                                            <div class="edit">
                                                Edit
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mx-auto max-w-180 right">
                            <div class="relative" uk-slider="finite: true">
                                <h1 style="text-align: center;color: orangered; font-size: 50px; font-weight: bold;">Certificates</h1>

                                <div style="width: 400px" class="uk-slider-container px-1 py-3">

                                    <ul
                                        class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s
uk-child-width-1-2 uk-grid-small uk-grid text-sm font-medium text-center">
                                        @foreach($certificates as $certificate)
                                            <li style="width: 200px">
                                                <div class="card">
                                                    <a href="{{ route('certificate.preview', $certificate) }}">
                                                        <img src="{{ asset($certificate -> course -> ImageData) }}" alt=""
                                                             class="w-full h-52 object-cover"/>
                                                        <div class="p-3 truncate">
                                                            {{ $certificate->course-> CourseName }}
                                                        </div>
                                                    </a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <div style="display: flex; margin-top: 10px">
                                        <a style="left: 0"
                                           class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                           href="#" uk-slider-item="previous">
                                            <i class='bx bx-chevron-left'></i>
                                        </a>
                                        <a style="margin-left: 300px"
                                           class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                                           href="#" uk-slider-item="next">
                                            <i class='bx bx-chevron-right'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- ====== Profile Section End -->
                </div>
            </div>
@endsection
