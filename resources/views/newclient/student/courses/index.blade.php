@extends('newclient.student.layouts.main')
@section('content_student')
    <!-- My Course -->
    <section>
        <div class="container">

            <div class="student-widget">
                <div class="student-widget-group">
                    <h4 class="title">Tất cả khóa học</h4>

                    <div class="row">
                        <div class="col-lg-12">

                            <!-- Filter -->
                            <div class="showing-list">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="show-filter choose-search-blk">
                                            <form method="POST" action="{{ route('all.courses') }}">
                                                @csrf
                                                <div class="mycourse-student align-items-center">
                                                    <div class="student-filter">
                                                        <div class="d-flex gap-3 select-form mb-0">
                                                            <input type="text" name="keyword" class="form-control"
                                                                   placeholder="Tên khóa học...">
                                                            <select class="form-select select" name="CategoryID">
                                                                <option value="">Tất cả khóa học</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">Khóa
                                                                        học {{ $category->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            <select class="form-select select" name="Rating">
                                                                <option value="">Tất cả đánh giá</option>
                                                                @foreach (count_courses_by_rating() as $key => $value)
                                                                    <option value="{{ $key }}">{{ $key }} sao
                                                                        ({{ $value }})
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                            <button type="submit" class="btn btn-primary">Lọc</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /Filter -->
                            <div class="row">
                                @if((count($data)> 0))
                                    @foreach ($data as $course)
                                        <div class="col-xl-3 col-lg-4 col-md-6 d-flex">
                                            <div class="course-box course-design d-flex ">
                                                <div class="product">
                                                    <div class="product-img">
                                                        <a href="{{route('detail.courses',['id'=>$course->id])}}">
                                                            <img class="img-fluid"
                                                                 style="width: 258px !important; height: 193px !important;"
                                                                 alt="" src="{{ asset($course->ImageData) }}">
                                                        </a>
                                                        <div class="price">
                                                            <h3>{{ format_currency($course -> Price * (1-($course -> Discount / 100))) }}
                                                                <span>{{ format_currency($course -> Price) }}</span>
                                                            </h3>
                                                        </div>
                                                    </div>
                                                    <div class="product-content">
                                                        <h3 class="title"><a
                                                                href="{{route('detail.courses',['id'=>$course->id])}}">{{ $course->CourseName }}</a>
                                                        </h3>
                                                        <div class="rating-student">
                                                            <div class="rating">
                                                                @if(count_rating($course->id) == 0)
                                                                    <span class="d-inline-block average-rating">Chưa có đánh giá</span>
                                                                @else
                                                                    {{ format_rating(get_rating($course->id)) }}
                                                                    <span class="d-inline-block average-rating">{{ get_rating($course->id) }} / 5 ({{ count_rating($course->id)}})</span>
                                                                @endif
                                                            </div>
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
                                                        <div class="course-info d-flex align-items-center">
                                                            <div class="rating-img d-flex align-items-center">
                                                                <img src="{{ asset('img/icon/icon-01.svg')}}" alt="">
                                                                <p>{{ $course -> LessonCount }} Bài học</p>

                                                                <p>{{ $course -> category -> name }}</p>
                                                            </div>
                                                            <div class="course-view d-flex align-items-center">
                                                                {{-- <p>{{ $course -> category -> name }}</p> --}}
                                                            </div>
                                                        </div>
                                                        <div class="start-leason d-flex align-items-center">
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
                                    <nav aria-label="Điều hướng trang">
                                        <ul class="pagination justify-content-center">
                                            @if ($data->onFirstPage())
                                                <li class="page-item disabled">
                                                    <span class="page-link">Trước</span>
                                                </li>
                                            @else
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $data->previousPageUrl() }}"
                                                       tabindex="-1">Trước</a>
                                                </li>
                                            @endif

                                            @for ($i = 1; $i <= $data->lastPage(); $i++)
                                                <li class="page-item {{ ($data->currentPage() == $i) ? 'active' : '' }}">
                                                    <a class="page-link" href="{{ $data->url($i) }}">{{ $i }}</a>
                                                </li>
                                            @endfor

                                            @if ($data->hasMorePages())
                                                <li class="page-item">
                                                    <a class="page-link" href="{{ $data->nextPageUrl() }}">Tiếp theo</a>
                                                </li>
                                            @else
                                                <li class="page-item disabled">
                                                    <span class="page-link">Tiếp theo</span>
                                                </li>
                                            @endif
                                        </ul>
                                    </nav>
                                @else
                                    <div class="col-lg-12 text-center">
                                        <p class="text-center">
                                            Không tìm thấy khóa học nào!
                                        </p>
                                    </div>
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
