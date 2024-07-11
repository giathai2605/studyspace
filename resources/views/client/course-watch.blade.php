<?php
$previousCompleted = true;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>StudySpace</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="StudySpace" />
    <link rel="stylesheet" href="{{ asset('css/uikit.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    <style>
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            user-select: none;
            border: 1px solid transparent;
            padding: 0.5rem 1rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: all 0.3s ease;
        }

        .btn-primary {
            color: #fff;
            background-color: #005CAA;
            border-color: #005CAA;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #005CAA;
            border-color: #005CAA;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }
    </style>
</head>

<body class="bg-black">

    <div id="wrapper" class="course-watch">

        <!-- Main Contents -->
        <div class="main_content h-screen flex justify-center items-center">

            <ul class="uk-switcher w-full " id="video_tabs">
                @foreach ($data->videos()->get() as $video)
                    <li>
                        <!-- to autoplay video uk-video="automute: true" -->
                        <div class="embed-video">
                            <iframe src="{{ $video->LessonLinkUrl }}" width="640" height="1422" frameborder="0"
                                allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </li>
                @endforeach
            </ul>


        </div>

        <!-- This is the modal -->
        <div id="modal-example" style="margin-left: 22.5rem" uk-modal>
            <div class="uk-modal-dialog uk-modal-body rounded-md shadow-xl">

                <button class="absolute block top-0 right-0 m-6 rounded-full bg-gray-300 p-2 uk-modal-close"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="text-sm mb-2"> Section 2</div>
                <h2 class="mb-5 font-semibold text-2xl"> Your First webpage </h2>
                <p class="text-base">Do You want to skip the rest of this chapter and chumb to next chapter.</p>

                <div class="text-right  pt-3 mt-3">
                    <a href="#" class="py-2 inline-block px-8 rounded-md hover:bg-gray-200 uk-modal-close"> Stay
                    </a>
                    <a href="#" class="py-2 inline-block px-8 rounded-md bg-blue-600 text-white"> Continue </a>
                </div>
            </div>
        </div>

        <!-- sidebar -->
        <div class="sidebar bg-white">

            <!-- slide_menu for mobile -->
            <span class="btn-close-mobi right-3 left-auto" uk-toggle="target: #wrapper ; cls: is-active"></span>

            <!-- back to home link -->
            {{-- {{ dd($data->chapter->CourseID) }} --}}
            <div class="flex justify-between lg:-ml-1 mt-1 mr-2">
                <a class="flex items-center text-blue-500"
                    href="{{ route('detail.courses', $data->chapter->CourseID) }}">
                    <ion-icon name="chevron-back-outline" class="md:text-lg text-2xl"></ion-icon>
                    <span class="btn btn-primary rounded-md"> Trở lại </span>
                </a>
            </div>

            <!-- title -->
            <h1 class="lg:text-2xl text-lg font-bold mt-2 line-clamp-2"> {{ $data->LessonName }} </h1>

            <nav class="cd-secondary-nav nav-small extanded w-auto lg:block hidden">
                <ul uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
                    <li><a href="#" class="lg:px-2"> Tổng quan </a></li>
                    <li><a href="#" class="lg:px-2"> Ghi chú </a></li>
                    @if(checkUserCompleteAllPracticeInLesson($data->id, auth()->user()->id))
                    <li><a href="#" class="lg:px-2"> Bình luận </a></li>
                    @else
                        <li><a disabled="true" type="button" id="notComplete" > Bình luận </a></li>
                    @endif
                </ul>
            </nav>

            <hr class="-mx-6 lg:block hidden">

            <!-- sidebar list -->
            <div class="sidebar_inner" data-simplebar>

                <div class="uk-switcher" id="course-tabs">

                    <div id="curriculum">
                        <div uk-accordion="multiple: true" class="divide-y space-y-3">
                            <div class="pt-2">
                                <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                                    <div class="mb-1 text-sm font-medium"> Bài học: {{ $data->LessonName }}</div>
                                </a>
                                <div class="uk-accordion-content mt-3">

                                    <ul class="course-curriculum-list"
                                        uk-switcher="connect: #video_tabs; animation: uk-animation-fade">
                                        @foreach ($data->videos()->get() as $video)
                                            <li>
                                                <a href="#">
                                                    {{ $video->Title }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                            <div class="pt-2">
                                <a class="uk-accordion-title text-md mx-2 font-semibold" href="#">
                                    <div class="mb-1 text-sm font-medium"> Thực hành</div>
                                </a>
                                <div class="uk-accordion-content mt-3">

                                    <ul class="course-categories">
                                        @foreach ($data->practices as $practice)
                                            <li>
                                                @if ($previousCompleted)
                                                    <a href="{{ route('practice', $practice->id) }}">
                                                        {{ $practice->Problem }}
                                                    </a>
                                                @else
                                                    <a href="#" style="color: grey" class="text-gray-400">
                                                        {{ $practice->Problem }}
                                                    </a>
                                                @endif
                                                @php
                                                    if ($practiceDone->isEmpty()) {
                                                        $previousCompleted = false;
                                                    }
                                                    foreach ($practiceDone as $item) {
                                                        if ($item->PracticeLessonID == $practice->id) {
                                                            $previousCompleted = true;
                                                            break;
                                                        }
                                                        $previousCompleted = false;
                                                    }
                                                @endphp


                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  Overview -->
                    <div class="space-y-6 px-2 py-6"
                        style="background-image: url('https://marketplace.canva.com/EAFb839IkJk/1/0/1131w/canva-orange-yellow-watercolor-notes-background-a4-document-XcvrljJgNwg.jpg')">
                        <form id="noteForm"
                            action="{{ is_null($notes) || $notes->note()->count() == 0 ? route('lesson-learn.store', $data->id) : route('lesson-learn.update-note', $notes->note()->first()->id) }}"
                            method="POST">
                            @csrf
                            <label>Hãy ghi chú tại đây, bạn sẽ cần vào một ngày nào đó!</label>
                            <textarea name="noteContent" id="noteContent" style="resize: none; height: 500px !important;"
                                class="w-full rounded-lg border-[1.5px] border-stroke bg-transparent py-3 px-5 font-medium outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter dark:border-form-strokedark dark:bg-form-input dark:focus:border-primary">
@if (!is_null($notes) && $notes->note()->count() != 0)
{{ $notes->note()->first()->noteContent }}
@endif
</textarea>
                        </form>
                    </div>

                    <!--  Comments -->
                    <div id="list__comment" class="px-2 pb-16  hidden__scrollbar"
                        style="max-height: 700px;overflow-y: scroll;">
                        <h3 class="text-xl font-semibold mb-3"> Bình luận </h3>
                        @foreach ($comments as $comment)
                            <div class="border-t pt-5">
                                <div class="flex items-center gap-x-4 mb-2">
                                    <img src="{{ asset($comment->avatar) }}" alt=""
                                        class="rounded-full shadow w-10 h-10">
                                    <div>
                                        <h4 class="-mb-1 text-base">
                                            {{ $comment->firstname }} {{ $comment->lastname }}
                                        </h4>
                                        <span class="text-sm text-gray-500 mt-1">
                                            {{ timeAgo($comment->created_at) }}
                                        </span>
                                    </div>
                                </div>
                                <p class="bg-gray-100 px-3 py-2 rounded-md">
                                    {{ $comment->Content }}
                                </p>
                                @if ($comment->Image != null)
                                    <img src="{{ asset($comment->Image) }}" alt=""
                                        class="w-full  mt-2 rounded-md object-cover">
                                @endif

                                <div class="reply__comment  py-2 pl-5">
                                    @foreach ($comment->replyComments as $reply)
                                        <div>
                                            <div class="flex items-center gap-x-4 my-2">
                                                <img src="{{ asset($reply->avatar) }}" alt=""
                                                    class="rounded-full shadow w-8 h-8">
                                                <div>
                                                    <h4 class="-mb-1 text-base">
                                                        {{ $reply->firstname }} {{ $reply->lastname }}
                                                    </h4>
                                                    <span class="text-sm text-gray-500 mt-1">
                                                        {{ timeAgo($reply->created_at) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <p class="bg-gray-100 px-3 py-2 rounded-md">
                                                {{ $reply->Content }}
                                            </p>
                                        </div>
                                    @endforeach
                                    <div id="list__reply-comment-{{ $comment->id }}"></div>
                                    <form method="post" id="replyComment{{ $comment->id }}"
                                        enctype="multipart/form-data" data-url="{{ route('comment.reply') }}">
                                        @csrf
                                        <div class="form-group flex justify-between items-center">
                                            <img src="{{ asset(Auth::user()->avatar) }}" alt=""
                                                class="rounded-full shadow w-6 h-6">
                                            <input type="hidden" name="CommentID" value="{{ $comment->id }}">
                                            <input type="text" name="Content"
                                                class="form-control rounded-md border-gray-300 focus:border-primary focus:ring-0 border-b"
                                                placeholder="Trả lời {{ $comment->firstname }}  {{ $comment->lastname }}">
                                            <button data-id="{{ $comment->id }}" class="add__reply-comment"
                                                type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                    class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                        <form class="fixed bottom-0" id="add__comment" method="POST" enctype="multipart/form-data"
                            data-url=" {{ route('comment.create') }}">
                            @csrf
                            <div class="form-group flex justify-between items-center relative">
                                <img src="{{ asset(auth()->user()->avatar) }}" alt=""
                                    class="rounded-full shadow w-10 h-10">
                                <input type="hidden" name="LessonID" value="{{ $data->id }}">

                                <input type="text" name="Content" id="Content"
                                    class="form-control rounded-md border-gray-300 focus:border-primary focus:ring-0 border-b"
                                    placeholder="Bình luận...">
                                <div class="button absolute right-0 flex gap-3 items-center">
                                    <button type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

            <!-- overly for mobile -->
            <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://www.google.com/recaptcha/api.js?render=6LeBGhEpAAAAAMsIqkTVwYDs-7tD--PaRcFDq-aq"></script>
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/uikit.js') }}"></script>
    <script src="{{ asset('js/tippy.all.min.js') }}"></script>
    <script src="{{ asset('js/simplebar.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/client/main.js') }}"></script>
    <script>
        window.addEventListener('keydown', function(e) {
            if ((e.ctrlKey && e.key === 'u') || e.key === 'F12') {
                e.preventDefault(); // Ngăn chặn hành động mặc định của Ctrl+U và F12
            }
        });
    </script>
</body>

</html>
