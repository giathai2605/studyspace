<?php
//echo "<pre>";
//var_dump($userPractice);
//die;
?>
    <!DOCTYPE html>
<html lang="en">

<head>
    <title>StudySpace</title>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="StudySpace"/>
    @include('client.layouts.styles')
    <style>
        * {
            margin: 0;
        }

        .control-panel {
            text-align: right;
            padding: 4px;
            font-family: sans-serif;
        }

        .themes, .languages {
            font-weight: bold;
            /*background: white;*/
            /*border: 1px solid gray;*/
            width: 100px;
            height: 30px;
        }

        #editor {
            height: 450px;
        }

        .button-container {
            background-color: rgb(31 41 55);
            text-align: right;
            padding: 4px;
        }

        #btnSubmit, .btnCompiler {
            background: #57a958;
            color: white;
            padding: 8px;
            border: 0;
            margin-right: 2px;
            cursor: pointer;
            border-radius: 5px;
        }
        #btnSubmit:disabled {
            background-color: #dddddd; /* Màu nền xám */
            color: #555555; /* Màu chữ đậm */
            cursor: not-allowed; /* Con trỏ không cho sử dụng */
        }
        .output {
            padding: 4px;
            border: 2px solid gray;
            min-height: 200px;
            width: 99%;
            margin: auto;
            resize: none;
            --tw-text-opacity: 1;
            /*color: rgb(22 163 74/var(--tw-text-opacity));*/
            background-color: rgb(31 41 55);
            color: white;
        }

        .selectOption {
            background-color: rgb(31 41 55);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        #fontSize {
            padding: 0px;
            height: 30px;
            width: 100px;
            font-weight: bold;
        }
        #option {
            display: flex;
        }
        option {
            font-weight: bold;
        }

        table th {
            padding-right: 100px;
        }
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: rgb(59 61 84);
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color:rgb(59 61 84);
        }
        .tab{
            padding-bottom: 50px;
            margin-right: 100px;
        }
    </style>
</head>

<body class="">

<div id="wrapper" class="course-watch">

    <!-- Main Contents -->
    <div class="main_content ">
        <form id="compiler" method="post" data-url="{{ route('practice.compiler') }}">
            @csrf
            <input name="idPractice" value="{{ $data -> id }}" hidden>

            <div class="selectOption">
                <div class="control-panel flex">
                    <select id="languages" class="languages">
                        <option value="c"> C</option>
                        <option value="php"> PHP</option>
                        <option value="js"> JavaScript</option>
                    </select>
                </div>
                <div id="option">
                    <div class="control-panel flex">
                        <select id="themes" class="themes">
                            <option value="ambiance">Themes</option>
                            <option value="ambiance">Clouds</option>
                            <option value="chaos"> Chaos</option>
                            <option value="chrome"> Chrome</option>
                            <option value="clouds"> Clouds</option>
                            <option value="clouds_midnight"> Clouds idnight</option>
                            <option value="cobalt"> Cobalt</option>
                            <option value="crimson_editor"> Crimson editor</option>
                            <option value="dawn"> Dawn</option>
                            <option value="dracula"> Dracula</option>
                            <option value="dreamweaver"> Dreamweaver</option>
                            <option value="eclipse"> Eclipse</option>
                            <option value="githut"> Githut</option>
                            <option value="gob"> Gob</option>
                            <option value="gruvbox"> Gruvbox</option>
                            <option value="idle_fingers"> Idle fingers</option>
                            <option value="iplastic"> Iplastic</option>
                            <option value="katzenmilch"> Katzenmilch</option>
                            <option value="kr_theme"> KRtheme</option>
                            <option value="kuroir"> Kuroir</option>
                            <option value="merbivore"> Merbivore</option>
                            <option value="merbivore_soft"> Merbivore Soft</option>
                            <option value="mono_industrial"> Mono industrial</option>
                            <option value="monokai"> Monokai</option>
                            <option value="mono_industrial"> Mono Industrial</option>
                            <option value="nord_dark"> Nord Dark</option>
                            <option value="pastel_on_dark"> Pastel Dark</option>
                            <option value="solarized_dark"> Solarized Dark</option>
                            <option value="solarized_light"> Solarized Light</option>
                            <option value="sqlserver"> Sqlserver</option>
                            <option value="terminal"> Terminal</option>
                            <option value="textmate"> Textmate</option>
                            <option value="tomorrow"> Tomorrow</option>
                            <option value="tomorrow_night"> Tomorrow Night</option>
                            <option value="tomorrow_night_blue"> Tomorrow Night Blue</option>
                            <option value="tomorrow_night_bright"> Tomorrow Night Bright</option>
                            <option value="tomorrow_night_eighties"> Tomorrow Night Eighties</option>
                            <option value="twilight"> Twilight</option>
                            <option value="vibrant_ink"> Vibrant Ink</option>
                            <option value="xcode"> Xcode</option>
                        </select>
                    </div>
                    <div class="control-panel flex">
                        <input type="number" class="form-control" id="fontSize" value="15" min="15">
                    </div>
                </div>
            </div>
            <div class="editor" id="editor"></div>
            <div class="button-container">
                <button class="btnCompiler">Run</button>
                @if(empty($userPractice))
                    <button disabled data-url="{{ route('practice.userPracticeSubmit') }}" id="btnSubmit">Submit</button>
                @else
                    <button id="btnSubmit" disabled>Done</button>
                @endif
            </div>
        </form>
        <form method="post" id="userPracticeForm" data-url="{{ route('practice.userPracticeSubmit') }}">
            @csrf
            <input type="hidden" value="{{ auth() -> id() }}" name="UserID">
            <input type="hidden" value="{{ $data -> id }}" name="PracticeLessonID">
            <input type="hidden" value="{{ now() }}" name="DoneTime">
            <input type="hidden" value="1" name="isDone">
        </form>
        <div class="output">

        </div>

    </div>

    <!-- This is the modal -->
    <div id="modal-example" style="margin-left: 22.5rem" uk-modal>
        <div class="uk-modal-dialog uk-modal-body rounded-md shadow-xl">

            <button class="absolute block top-0 right-0 m-6 rounded-full bg-gray-300 p-2 uk-modal-close"
                    type="button">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                     class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

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
        <div class="flex justify-between lg:-ml-1 mt-1 mr-2">
            <a href="{{ route('lesson-learn', $data -> lesson() ->first() -> id) }}" class="flex items-center text-blue-500">
                <ion-icon name="chevron-back-outline" class="md:text-lg text-2xl"></ion-icon>
                <span class="btn btn-primary rounded-md"> Trở lại </span>
            </a>
        </div>

        <!-- title -->
        <h2 class="lg:text-2xl text-lg font-bold mt-2 line-clamp-2"> {{ $data -> Problem }} </h2>

        <nav class="cd-secondary-nav nav-small extanded w-auto lg:block hidden">
            <ul uk-switcher="connect: #course-tabs; animation: uk-animation-fade">
                <li><a href="" class="lg:px-2"> Tổng quan </a></li>
            </ul>
        </nav>

        <hr class="-mx-6 lg:block hidden">

        <!-- sidebar list -->
        <div class="sidebar_inner" data-simplebar>
            <div class="uk-switcher" id="course-tabs">
                <div class="space-y-6 px-2 py-6">
                    <div>
                        <h3 class="text-lg font-semibold mb-1"> Chi tiết </h3>
                        <p>
                            {{ $data -> ProblemDetail }}
                        </p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-1"> Chú thích </h3>
                        <ul class="list-disc ml-5 space-y-1 mt-3">
                            <p>
                                {{ $data -> Explain }}
                            </p>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold mb-1"> Gợi ý </h3>
                        <ul class="list-disc ml-5 space-y-1 mt-3">
                            @foreach( explode('.', $data -> Suggest) as $item)
                                <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>


        </div>

        <!-- overly for mobile -->
        <div class="side_overly" uk-toggle="target: #wrapper ; cls: is-collapse is-active"></div>

    </div>

</div>

<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@include('client.layouts.scripts')
<script src="{{ asset('js/lib/ace.js') }}"></script>
<script src="{{ asset('js/lib/theme-monokai.js') }}"></script>
<script src="{{ asset('js/ide.js') }}"></script>

</body>

</html>
