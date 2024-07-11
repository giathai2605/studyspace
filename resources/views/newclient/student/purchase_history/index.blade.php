@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- Purchase History -->
    <section class="course-content purchase-widget">
        <div class="container">
            <div class="student-widget">
                <div class="student-widget-group">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="row">
                                @foreach($courses as $course)
                                <div class="col-lg-12 col-md-12 d-flex">
                                    <div class="course-box course-design list-course d-flex">
                                        <div class="product">
                                            <div class="product-img">
                                                <a href="{{ route('detail.courses', $course->id) }}">
                                                    <img class="img-fluid" alt=""
                                                        src="{{asset($course->ImageData)}}">
                                                </a>
                                                <div class="price">
                                                    <h3 class="free-color">{{format_currency($course -> Price * (1-($course -> Discount / 100))) }}<span>{{ format_currency($course -> Price) }}</span></h3>
                                                </div>
                                            </div>
                                            <div class="product-content">
                                                <div class="head-course-title">
                                                    <h3 class="title"><a href="{{ route('detail.courses', $course->id) }}">{{ $course->CourseName }}</a></h3>
                                                    <div class="all-btn all-category d-flex align-items-center">
                                                        <a href="{{route('detail.courses',['id'=>$course->id])}}" class="btn btn-primary">Xem ngay</a>
                                                    </div>
                                                </div>
                                                <div class="course-info d-flex align-items-center border-bottom-0 pb-0">
                                                    <div class="rating-img d-flex align-items-center">
                                                        <img src="{{asset('img/icon/icon-01.svg')}}" alt="">
                                                        <p>+{{$course->LessonCount}} Bài học</p>
                                                    </div>
                                                    <div class="course-view d-flex align-items-center">
                                                        <img src="{{asset('img/icon/icon-01.svg')}}" alt="">
                                                        <p>+{{$course->ChapterCount}} Chương học</p>
                                                    </div>
                                                </div>
                                                <div class="rating">
                                                    @if(count_rating($course->id) == 0)
                                                        <span class="d-inline-block average-rating">Chưa có đánh giá</span>
                                                    @else
                                                        {{ format_rating(get_rating($course->id)) }}
                                                        <span class="d-inline-block average-rating">{{ get_rating($course->id) }} / 5 ({{ count_rating($course->id)}})</span>
                                                    @endif
                                                </div>
                                                <div class="course-group d-flex mb-0">
                                                    @if(auth()->check())
                                                    <div
                                                        class="course-share  d-flex align-items-center justify-content-center">
                                                        <meta name="csrf-token"
                                                              content="{{ csrf_token() }}">
                                                        <a class="add-to-wishlist"
                                                           data-course-id="{{ $course->id }}"
                                                           href="{{ route('wishlist.add') }}">
                                                            @if(App\Models\Wishlist::where('UserID', Auth::user()->id)->where('CourseID', $course->id)->first())
                                                                <i class="fa-solid fa-heart"></i>
                                                            @else
                                                                <i class="fa-regular fa-heart"></i>
                                                            @endif
                                                        </a>
                                                    </div>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /Purchase History -->
@endsection
