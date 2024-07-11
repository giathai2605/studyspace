<!-- Feature Course -->
<section class="section new-course">
    <div class="container">
        <div class="section-header aos" data-aos="fade-up">
            <div class="section-sub-head">
                <span>Có gì mới!</span>
                <h2>Khóa học nổi bật</h2>
            </div>
            <div class="all-btn all-category d-flex align-items-center">
                <a href="{{ route('all.courses') }}" class="btn btn-primary">Toàn bộ khóa học</a>
            </div>
        </div>
        <div class="course-feature">
            <div class="row">
                @foreach($courses as $course)
                    <div class="col-lg-4 col-md-6 d-flex">
                        <div class="course-box d-flex aos" data-aos="fade-up">
                            <div class="product">
                                <div class="product-img">
                                    <a href="{{route('detail.courses',['id'=>$course->id])}}">
                                        <img class="img-fluid"
                                             style="width: 370px !important; height: 230px !important;" alt=""
                                             src="{{ asset($course->ImageData) }}">
                                    </a>
                                    <div class="price">
                                            <h3>{{ format_currency($course -> Price *  (100 - $course -> Discount) / 100) }}
                                            <span>{{ format_currency($course -> Price) }}</span></h3>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="course-group d-flex">
                                        <div class="course-group-img d-flex">
                                            <a href="{{route('detail.courses',['id'=>$course->id])}}"><img
                                                    src="{{ asset($course->user->avatar)}}"
                                                    alt="" class="img-fluid" style="object-fit: cover"></a>
                                            <div class="course-name">
                                                <h4>
                                                    <a href="{{route('detail.courses',['id'=>$course->id])}}">{{ $course->user->lastName . " " . $course->user->firstName }}</a>
                                                </h4>
                                                <h4 style="font-size: 14px"><a
                                                        href="{{route('detail.courses',['id'=>$course->id])}}">{{ "@" . $course->user->username }}</a>
                                                </h4>
                                            </div>
                                        </div>
                                        @if(auth()->check())
                                            <div class="course-share  d-flex align-items-center justify-content-center">
                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                <a class="add-to-wishlist" data-course-id="{{ $course->id }}"
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
                                    <h3 class="title instructor-text"><a
                                            href="{{route('detail.courses',['id'=>$course->id])}}">{{ $course->CourseName }}</a>
                                    </h3>
                                    <div class="course-info d-flex align-items-center">
                                        <div class="rating-img d-flex align-items-center">
                                            <img src="{{ asset('img/icon/icon-01.svg')}}" alt="">
                                            <p>{{ $course -> LessonCount }} Bài học</p>
                                        </div>
                                        <div class="course-view d-flex align-items-center">
                                            <p>{{ $course -> category -> name }}</p>
                                        </div>
                                    </div>
                                    <div class="rating">
                                        @if(count_rating($course->id) == 0)
                                            <span class="d-inline-block average-rating">Chưa có đánh giá</span>
                                        @else
                                            {{ format_rating(get_rating($course->id)) }}
                                            <span class="d-inline-block average-rating">{{ get_rating($course->id) }} / 5 ({{ count_rating($course->id)}} lượt đánh giá)</span>
                                        @endif
                                    </div>
                                    <div class="all-btn all-category d-flex align-items-center justify-content-end">
                                        @if(check_user_has_course($course->id))
                                            <a href="{{ route('detail.courses', $course->id) }}"
                                               class="btn btn-primary">Đi tới khóa học</a>
                                        @else
                                            <a href="{{ route('detail.courses', $course->id) }}"
                                               class="btn btn-primary">MUA NGAY</a>
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
</section>
<!-- /Feature Course -->
