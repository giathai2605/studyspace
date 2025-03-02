@extends('client.layouts.main')
@section('content')
    <!--------------------Main Contents -------------------->
    <main class="main_content">
        <!-- Slideshow -->
        <div class="uk-position-relative uk-visible-toggle overflow-hidden lg:-mt-20" tabindex="-1"
             uk-slideshow="animation: scale; min-height: 200; max-height: 450; autoplay: true">
            <ul class="uk-slideshow-items rounded">
                <li>
                    <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                        <img src="{{ asset('images/hero-1.jpg') }}" class="object-cover" alt="" uk-cover/>
                    </div>
                    <div class="container relative md:p-20 md:mt-7 p-5 h-full">
                        <div uk-slideshow-parallax="scale: 1,1,0.8"
                             class="flex flex-col justify-center h-full w-full space-y-3">
                            <h1 uk-slideshow-parallax="y: 100,0,0"
                                class="lg:text-4xl text-2xl text-white font-semibold">
                                Learn from the best
                            </h1>
                            <p uk-slideshow-parallax="y: 150,0,0"
                               class="text-base text-white font-medium pb-4 lg:w-1/2">
                                Choose from 130,000 online video courses
                                with new additions published every month
                            </p>
                            <a uk-slideshow-parallax="y: 200,0,50" href="#"
                               class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-32">
                                Get Started
                            </a>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="uk-position-cover" uk-slideshow-parallax="scale: 1.2,1.2,1">
                        <img src="{{ asset('images/hero-2.jpg') }}" class="object-cover" alt="" uk-cover/>
                    </div>
                    <div class="container relative md:p-20 md:mt-7 p-5 h-full">
                        <div uk-slideshow-parallax="scale: 1,1,0.8"
                             class="flex flex-col justify-center h-full w-full space-y-3">
                            <h1 uk-slideshow-parallax="y: 100,0,0"
                                class="lg:text-4xl text-2xl text-white font-semibold">
                                Learn from the best
                            </h1>
                            <p uk-slideshow-parallax="y: 150,0,0"
                               class="text-base text-white font-medium pb-4 lg:w-1/2">
                                Choose from 130,000 online video courses
                                with new additions published every month
                            </p>
                            <a uk-slideshow-parallax="y: 200,0,0" href="#"
                               class="bg-opacity-90 bg-white py-2.5 rounded-md text-base text-center w-32">
                                Get Started
                            </a>
                        </div>
                    </div>
                </li>
            </ul>

            <ul class="uk-slideshow-nav uk-dotnav absolute bottom-0 left-0 m-7 lg:flex hidden"></ul>
        </div>
        <div class="container">
            <!--  ------------------Course feature------------- -->
            <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                <h2 class="text-2xl font-medium">Featured Course</h2>
            </div>
            <div class="relative -mt-3" uk-slider="finite: true">
                <div class="uk-slider-container px-1 py-3">

                    <ul class="uk-slider-items uk-child-width-1-1@m uk-grid">
                        @foreach ($data as $key)
                            <li>
                                <div class="bg-white shadow-sm rounded-lg uk-transition-toggle md:flex shadow-md hover:shadow-none transition-all">
                                    <div class="md:w-5/12 md:h-60 h-40 overflow-hidden rounded-l-lg relative">
                                        <img src="{{ asset($key -> ImageData) }}" alt=""
                                             class="w-full h-full absolute inset-0 object-cover"/>
                                        <img src="https://demo.foxthemes.net/courseplus/assets/images/icon-play.svg"
                                             class="w-16 h-16 uk-position-center uk-transition-fade" alt=""/>
                                    </div>
                                    <div class="flex-1 md:p-10 p-10 ">
                                        <a href="{{ route('course-intro', $key->id) }}">
                                            <div class="font-semibold line-clamp-2 md:text-xl md:leading-relaxed">
                                                {{ $key->CourseName }}
                                            </div>
                                        </a>
                                        <div class="mt-2 md:block hidden">
                                            {{ $key->CourseSubTitle }}
                                        </div>
                                        <div class="font-semibold mt-3">
                                            John Michael
                                        </div>
                                        <div class="mt-1 flex items-center justify-between">
                                            <div class="flex space-x-2 items-center text-sm pt-2">
                                                <div>{{ $key->TimeLessonTotal }} hour</div>
                                                <div>·</div>
                                                <div>{{ $key->ChapterCount }} chapter</div>
                                            </div>
                                            <div class="text-lg font-semibold">
                                                {{ $key->Price }}$
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
                <a class="absolute bg-white uk-position-center-left -ml-3 flex items-center justify-center p-2 rounded-full shadow-md text-xl w-11 h-11 z-10 dark:bg-gray-800 dark:text-white "
                   href="#" uk-slider-item="previous">
                   <i class='bx bx-chevron-left' ></i>
                </a>
                <a class="absolute bg-white uk-position-center-right -mr-3 flex items-center justify-center p-2 rounded-full shadow-md text-xl w-11 h-11 z-10 dark:bg-gray-800 dark:text-white"
                   href="#" uk-slider-item="next">
                   <i class='bx bx-chevron-right'></i>
                </a>
            </div>
            <!-- ------------- Slider Course feature----------------- -->

            <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                <h2 class="text-2xl font-semibold">Popular Classes</h2>
                <a href="#" class="text-blue-500 sm:block hidden">
                    See all
                </a>
            </div>

            <div class="mt-3">
                <h4 class="py-3 border-b font-semibold text-grey-700 mx-1 mb-4" hidden>
                    <ion-icon name="star"></ion-icon>
                    Featured today
                </h4>

                <!--  slider -->
                <div class="mt-3">
                    <h4 class="py-3 border-b font-semibold text-grey-700 mx-1 mb-4" hidden>
                        <ion-icon name="star"></ion-icon>
                        Featured today
                    </h4>

                    <div class="relative" uk-slider="finite: true">
                        <div class="uk-slider-container px-1 py-3">
                            <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2@s uk-grid-small uk-grid">
                                @foreach ($data as $key )
                                    <li>

                                        <a href="{{ route('course-intro', $key->id) }}" class="uk-link-reset">
                                            <div class="card uk-transition-toggle shadow-md hover:shadow-none transition-all">
                                                <div class="card-media h-40">
                                                    <div class="card-media-overly"></div>
                                                    <img src="{{ asset($key->ImageData) }}" alt=""
                                                         class=""/>
                                                    <span class="icon-play"></span>
                                                </div>
                                                <div class="card-body p-4">
                                                    <div class="font-semibold line-clamp-2">
                                                        {{ $key->CourseName }}
                                                        <div class="flex space-x-2 items-center text-sm pt-3">
                                                            <div>{{ $key->TimeLessonTotal }} hour</div>
                                                            <div>·</div>
                                                            <div>
                                                                {{ $key->ChapterCount }} chapter
                                                            </div>
                                                        </div>
                                                        <div class="pt-1 flex items-center justify-between">
                                                            <div class="text-sm font-medium">
                                                                John Michael
                                                            </div>
                                                            <div class="text-lg font-semibold">
                                                                {{ $key->Price }} $
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                               href="#" uk-slider-item="previous">
                               <i class='bx bx-chevron-left'></i>
                            </a>
                            <a class="absolute bg-white top-1/4 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                               href="#" uk-slider-item="next">
                               <i class='bx bx-chevron-right'></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- -----------------Latest Books------------------  -->
            <div class="sm:my-4 my-3 flex items-end justify-between pt-3">
                <h2 class="text-2xl font-semibold">Latest Books</h2>
                <a href="#" class="text-blue-500 sm:block hidden">
                    See all
                </a>
            </div>

            <div class="relative" uk-slider="finite: true">
                <div class="uk-slider-container px-1 py-3">
                    <ul
                        class="uk-slider-items uk-child-width-1-5@m uk-child-width-1-3@s
uk-child-width-1-2 uk-grid-small uk-grid text-sm font-medium text-center">
                        @foreach($documents as $dcm)
                        <li>
                            <div class="card">
                                <a href="#">
                                    <img src="{{ asset('uploads/documents/thumbnail/'.$dcm->thumbnail) }}" alt=""
                                         class="w-full h-52 object-cover"/>
                                    <div class="p-3 truncate">
                                       {{ $dcm->name }}
                                    </div>
                                </a>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                       href="#" uk-slider-item="previous">
                       <i class='bx bx-chevron-left'></i>
                    </a>
                    <a class="absolute bg-white bottom-1/2 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                       href="#" uk-slider-item="next">
                       <i class='bx bx-chevron-right'></i>
                    </a>
                </div>
            </div>


            <!--  ---------------------Latest Episodes ------------------>
            <div class="tube-card p-4 mt-3" uk-toggle="cls: tube-card p-4; mode: media; media: 640">
                <h4 class="py-3 px-5 border-b font-semibold text-grey-700 -mx-4 -mt-3 mb-4">
                    Latest Episodes
                </h4>

                <div class="relative -mx-1" uk-slider="finite: true">
                    <div class="uk-slider-container md:px-1 px-2 py-3">
                        <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-2 uk-grid-small uk-grid">
                            @foreach ($lessons as $key )
                                <li>
                                    <a href="episodes-watch.html">
                                        <div class="w-full md:h-40 h-28 overflow-hidden rounded-lg relative">
                                            <img src="{{ asset('images/episodes/img-2.jpg') }}" alt=""
                                                 class="w-full h-full absolute inset-0 object-cover"/>
                                            {{-- <span
                                                class="absolute bottom-2 right-2 px-2 py-1 text-xs font-semibold bg-black bg-opacity-50 text-white rounded">
                                                12:21</span> --}}
                                            <img src="{{ asset($key->VideoTime) }}"
                                                 class="w-12 h-12 uk-position-center" alt=""/>
                                        </div>
                                    </a>
                                    <div class="pt-3">
                                        <a href="episodes-watch.html" class="font-semibold line-clamp-2" style=" display: -webkit-box;
                                    -webkit-box-orient: vertical;
                                    -webkit-line-clamp: 1;
                                    overflow: hidden;
                                    text-overflow: ellipsis;">
                                            {{ $key->LessonName}}
                                        </a>
                                        <p class="text-sm pt-1">
                                            <a href="#"> {{ $key->ChapterName}} </a>
                                        </p>
                                        <p class="text-sm pt-1">
                                            <a style=" display: -webkit-box;
                                       -webkit-box-orient: vertical;
                                       -webkit-line-clamp: 1;
                                       overflow: hidden;
                                       text-overflow: ellipsis;" href="#"> {{ $key->LessonDescription}} </a>
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                        <a class="absolute bg-white top-16 flex items-center justify-center p-2 -left-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                           href="#" uk-slider-item="previous">
                           <i class='bx bx-chevron-left'></i>
                        </a>
                        <a class="absolute bg-white top-16 flex items-center justify-center p-2 -right-4 rounded-full shadow-md text-xl w-9 z-10 dark:bg-gray-800 dark:text-white"
                           href="#" uk-slider-item="next">
                           <i class='bx bx-chevron-right'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
