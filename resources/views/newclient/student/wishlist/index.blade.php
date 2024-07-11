@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- My Course -->
    <section>
        <div class="container">
            <div class="student-widget">
                <div class="student-widget-group">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                @if(count($courses))
                                    @foreach ($courses as $course)
                                        <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                                            <div class="course-box course-design d-flex ">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <a href="{{ route('dashboard.courses', $course->id) }}">
                                                            <img class="img-fluid"
                                                                 style="width: 258px !important; height: 193px !important;"
                                                                 alt=""
                                                                 src="{{ asset($course->ImageData) }}">
                                                        </a>
                                                        <div class="price">
                                                            <h3>{{ format_currency($course ->Price * (100-$course ->Discount) / 100) }}
                                                                <span>{{ format_currency($course ->Price) }}</span></h3>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <div class="course-group d-flex">
                                                            <div class="course-group-img d-flex">
                                                                <a href="{{ route('dashboard.courses', $course->id) }}"><img
                                                                        src="{{ asset($course->user->avatar)}}" alt=""
                                                                        style="object-fit: cover"
                                                                        class="img-fluid"></a>
                                                                <div class="course-name">
                                                                    <h4>
                                                                        <a href="{{ route('dashboard.courses', $course->id) }}">{{ $course->user->lastName . " " . $course->user->firstName }}</a>
                                                                    </h4>
                                                                    <p>{{ "@" . $course->user->username }}</p>
                                                                </div>
                                                            </div>
                                                            @if(auth()->check())
                                                                <div
                                                                    class="course-share  d-flex align-items-center justify-content-center">
                                                                    <meta name="csrf-token"
                                                                          content="{{ csrf_token() }}">
                                                                    <a class="add-to-wishlist"
                                                                       data-course-id="{{ $course->id }}"
                                                                       href="{{ route('wishlist.add') }}"
                                                                       onclick="location.reload()">
                                                                        @if(App\Models\Wishlist::where('UserID', Auth::user()->id)->where('CourseID', $course->id)->first())
                                                                            <i class="fa-solid fa-heart"></i>
                                                                        @else
                                                                            <i class="fa-regular fa-heart"></i>
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <h3 class="title instructor-text"><a
                                                                href="{{route('detail.courses',['id'=>$course->id])}}">{{ $course->CourseName }}</a>
                                                        </h3>
                                                        <div
                                                            class="course-info d-flex align-items-center">
                                                            <div class="rating-img d-flex align-items-center">
                                                                <img src="{{ asset('img/icon/icon-01.svg') }}" alt="">
                                                                <p>{{ $course ->LessonCount }} Bài học</p>

                                                                <p>{{ $course -> category -> name }}</p>

                                                            </div>
                                                            <div class="course-view d-flex align-items-center">
                                                                {{-- <p>{{ $course -> category -> name }}</p> --}}
                                                            </div>
                                                        </div>
                                                        {{-- <div class="rating">
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star filled"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="d-inline-block average-rating"><span>4.0</span>
                                                        (15)</span>
                                                        </div> --}}
                                                        <div
                                                            class="all-btn all-category d-flex align-items-center justify-content-end">
                                                            @if(check_user_has_course($course->id))
                                                                <a href="{{ route('detail.courses', $course->id) }}"
                                                                   class="btn btn-primary">Đi tới khóa học</a>
                                                            @else
                                                                <a href="{{ route('checkout',["id"=>$course->id]) }}"
                                                                   class="btn btn-primary">MUA NGAY</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /My Course -->
@endsection
