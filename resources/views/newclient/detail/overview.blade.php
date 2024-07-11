<style>
    @import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

    fieldset, label {
        margin: 0;
        padding: 0;
    }

    body {
        margin: 20px;
    }

    h1 {
        font-size: 1.5em;
        margin: 10px;
    }

    /****** Style Star Rating Widget *****/

    .rating__course {
        border: none;
        float: left;
    }

    .rating__course > input {
        display: none;
    }

    .rating__course > label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating__course > .half:before {
        content: "\f089";
        position: absolute;
    }

    .rating__course > label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating__course > input:checked ~ label, /* show gold star when clicked */
    .rating__course:not(:checked) > label:hover, /* hover current star */
    .rating__course:not(:checked) > label:hover ~ label {
        color: #FFD700;
    }

    /* hover previous stars in list */

    .rating__course > input:checked + label:hover, /* hover current star when changing rating__course */
    .rating__course > input:checked ~ label:hover,
    .rating__course > label:hover ~ input:checked ~ label, /* lighten current selection */
    .rating__course > input:checked ~ label:hover ~ label {
        color: #FFED85;
    }
</style>


<div class="col-lg-8">

    <!-- Overview -->
    <div class="card overview-sec">
        <div class="card-body">
            <h5 class="subs-title">Tổng quan</h5>
            <h6>Mô tả khóa học</h6>
            <p>{{ $data->CourseSubTitle }}</p>
        </div>
    </div>
    <!-- /Overview -->

    <!-- Course Content -->
    <div class="card content-sec">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <h5 class="subs-title">Các chương học</h5>
                </div>
                <div class="col-sm-6 text-sm-end">
                    <h6>{{ $data->ChapterCount }} Chương</h6>
                </div>
            </div>
            @foreach ($data->chapters as $key => $chapter)
                <div class="course-card">
                    <h6 class="cou-title">
                        <a class="collapsed" data-bs-toggle="collapse" href="#course{{ $key + 1 }}"
                           aria-expanded="false">{{ $chapter->ChapterName }}</a>
                    </h6>
                    <div id="course{{ $key + 1 }}" class="card-collapse collapse" style="">
                        <ul>
                            @foreach ($chapter->lessons as $key => $lesson)
                                <li>
                                    @if(check_user_has_course($data->id))
                                    <a style="text-decoration: none;
                                    @if(auth())
                                    {{checkUserCompleteAllPracticeInLesson($lesson->id, auth()->id()) ? 'color: green' : ''}}
                                    @endif
                                    "
                                       href="@if(check_user_has_course($data->id)){{ route('lesson-learn', $lesson->id) }}@else#@endif"><img
                                            src="{{ asset('img/icon/play.svg') }}" alt=""
                                            class="me-2">{{ $lesson->SortNumber }}. {{ $lesson->LessonName }}</a>
                                    @else
                                        <span class="me-2  is__bought"><img
                                                src="{{ asset('img/icon/play.svg') }}" alt=""
                                                class="me-2">{{ $lesson->SortNumber }}. {{ $lesson->LessonName }}</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <!-- /Course Content -->

    <!-- Instructor -->
    <div class="card instructor-sec">
        <div class="card-body">
            <h5 class="subs-title">Về người hướng dẫn</h5>
            <div class="instructor-wrap">
                <div class="about-instructor">
                    <div class="abt-instructor-img">
                        <img src="{{ asset($seller->avatar) }}" alt="img" class="img-fluid">
                    </div>
                    <div class="instructor-detail">
                        <h5>{{ $seller->lastName . ' ' . $seller->firstName }}</h5>
                        <p>{{ '@' . $seller->username }}</p>
                    </div>
                </div>
                <div class="rating">
                    {{ format_rating(get_rating($data->id)) }}
                    <span class="d-inline-block average-rating">{{ get_rating($data->id) }} / 5 ({{ count_rating($data->id)}} lượt đánh giá)</span>
                </div>
            </div>

            <p>Tiểu sử: {{ $seller->description }}</p>

        </div>
    </div>
    <!-- /Instructor -->

    <!-- Reviews -->
    <div class="card review-sec">
        <h5 class="subs-title p-4">Đánh giá</h5>
        @foreach ($ratings as $key => $rating)
            <div class="card-body {{ $key + 1 }}">
                <div class="instructor-wrap">
                    <div class="about-instructor">
                        <div class="abt-instructor-img">
                            <img src="{{ asset($rating->user->avatar) }}" alt="img" class="img-fluid"
                                 style="object-fit: cover">
                        </div>
                        <div class="instructor-detail">
                            <h5>
                                {{ $rating->user->lastName }} {{ $rating->user->firstName }}
                            </h5>
                            <p>
                                {{ '@' . $rating->user->username}}
                            </p>
                        </div>
                    </div>
                    <div class="rating">
                        {{ format_rating($rating->Rating) }}
                    </div>
                </div>
                <p class="rev-info">“{{ $rating->Comment }}“</p>

                @foreach (get_reply_rating($rating->ratingID) as $reply)
                    <div class="instructor-wrap" style="margin-left:25px;">
                        <div class="d-flex mb-3" style="gap:25px;">
                            <div class="instructor-detail user-reply d-flex align-content-center">
                                <div class="abt-instructor-img">
                                    <img src="{{ asset($reply->avatar) }}" alt="img" class="img-fluid"
                                         style="object-fit: cover">
                                </div>
                                <div>
                                    <p class="fw-bold ml-3"
                                       style="white-space: nowrap;">{{ $reply->lastName }} {{ $reply->firstName }}
                                    </p>
                                    <p>
                                        {{ '@' . $reply->username}}
                                    </p>
                                </div>
                            </div>
                            <p class="rev-info">“{{ $reply->Comment }}“</p>
                        </div>
                    </div>
                @endforeach

                <form method="post" action="{{ route('rating.storeReply') }}" class="reply-rating">
                    @csrf
                    <div class="d-flex">
                        <input type="hidden" name="RatingID" value="{{ $rating->ratingID }}">
                        <input type="text" name="Comment" class="form-control" placeholder="Trả lời">
                        <button type="submit" class="btn btn-primary">Gửi</button>
                    </div>
                </form>
            </div>
        @endforeach


        <!-- /Reviews -->

        <!-- Rating -->
        <form method="POST" action="{{ route('rating.store') }}" id="add-rating" class="card comment-sec mx-3">
            <div class="card-body">
                @if(Auth::check())
                    @if($isRegistered)
                        <h5 class="subs-title">Đánh giá của bạn</h5>
                        <div class="instructor-wrap">
                            <div class="about-instructor">
                                <div class="abt-instructor-img">
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="img"
                                         class="img-fluid" style="object-fit: cover">
                                </div>
                                <div class="instructor-detail">
                                    <h5>
                                        {{ Auth::user()->lastName }} {{ Auth::user()->firstName }}
                                    </h5>
                                    <p>
                                        @if(Auth::user()->roleID == 1)
                                            Admin
                                        @else
                                            {{ '@' . Auth::user()->username}}
                                        @endif
                                    </p>
                                </div>
                            </div>
                            <div class="rating">
                                <fieldset class="rating__course">
                                    <input type="radio" id="star1" name="Rating" value="5"/><label class="full"
                                                                                                   for="star1"
                                                                                                   title="Sucks big time - 1 star"></label>
                                    <input type="radio" id="star2" name="Rating" value="4"/><label class="full"
                                                                                                   for="star2"
                                                                                                   title="Kinda bad - 2 stars"></label>
                                    <input type="radio" id="star4" name="Rating" value="3"/><label class="full"
                                                                                                   for="star4"
                                                                                                   title="Pretty good - 4 stars"></label>
                                    <input type="radio" id="star3" name="Rating" value="2"/><label class="full"
                                                                                                   for="star3"
                                                                                                   title="Meh - 3 stars"></label>
                                    <input type="radio" id="star5" name="Rating" value="1"/><label class="full"
                                                                                                   for="star5"
                                                                                                   title="Awesome - 5 stars"></label>

                                    </label>

                                </fieldset>
                            </div>
                        </div>
                        @csrf
                        <input type="hidden" name="CourseID" value="{{ $data->id }}">
                        <input type="hidden" name="UserID" value="{{ Auth::user()->id }}">
                        <div class="row">
                            <div class="form-group">
                                <textarea name="Comment" rows="4" class="form-control"
                                          placeholder="Nhận xét..."></textarea>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn submit-btn" type="submit">Đánh giá</button>
                        </div>
                    @else
                        <h5 class="subs-title">Bạn cần đăng ký khóa học để đánh giá</h5>
                    @endif
                @else
                    <h5 class="subs-title">Đăng nhập để đánh giá</h5>
                @endif
            </div>
        </form>
    </div>
    <!-- /Rating -->

</div>
<script>
    $(document).ready(function () {
        $(document).on('click', '.is__bought', function (e) {
            e.preventDefault();
          swal({
            title: "Bạn cần đăng ký khóa học để xem nội dung",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
        });
    });
</script>

