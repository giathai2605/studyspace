<div class="inner-banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="instructor-wrap border-bottom-0 m-0">
                    <div class="about-instructor align-items-center">
                        <div class="abt-instructor-img">
                            <img src="{{ asset($seller->avatar) }}" alt="img" class="">
                        </div>
                        <div class="instructor-detail me-3">
                            <h5>{{ $seller->lastName . ' ' . $seller->firstName }}</h5>
                            <p>{{ '@' . $seller->username }}</p>
                        </div>
                        <div class="rating mb-0">
                            {{ format_rating(get_rating($data->id)) }}
                            <span class="d-inline-block average-rating">{{ get_rating($data->id) }} / 5 ({{ count_rating($data->id)}} lượt đánh giá)</span>
                        </div>
                    </div>
                    <span class="web-badge mb-3">Phát triển web</span>
                </div>
                <h2>Tên khóa học: {{ $data->CourseName }}</h2>
                <p>Mô tả: {{ $data->CourseSubTitle }}</p> 

                <div class="course-info d-flex align-items-center border-bottom-0 m-0 p-0">
                    <div class="cou-info">
                        <img src="{{asset('img/icon/icon-01.svg')}}" alt="">
                        <p>{{ countChapterInCourse($data -> id) }} Chương</p>
                    </div>

                    <div class="cou-info">
                        <img src="" alt="">
                        <p>{{ countLessonInCourse($data -> id) }}+ bài học</p>
                    </div>
                    <div class="cou-info">
                        <img src="" alt="">
                        <p>{{ countUserJoinCourse($data -> id) }} người dùng tham gia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
