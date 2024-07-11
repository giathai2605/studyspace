<!-- Home Banner -->
<section class="home-slide d-flex align-items-center">
    <div class="container">
        <div class="row ">
            <div class="col-md-7">
                <div class="home-slide-face aos" data-aos="fade-up">
                    <div class="home-slide-text ">
                        <h5>Người dẫn đầu trong học tập trực tuyến</h5>
                        <h1>Các khóa học trực tuyến hấp dẫn và dễ tiếp cận cho tất cả mọi người</h1>
                        <p>Làm chủ tương lai của bạn bằng cách học các kỹ năng mới trực tuyến</p>
                    </div>
                    <div class="banner-content">
                        <div class="form-inner">
                            <div class="input-group">
                                <i class="fa-solid fa-magnifying-glass search-icon"></i>
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <input data-asset="{{asset('')}}" data-url="{{ route('search') }}" type="text"
                                       id="searchInput" class="form-control"
                                       placeholder="Tìm kiếm khóa học">

                            </div>
                        </div>
                        <div class="header_search_dropdown">
                            <ul class="header_search_dropdown overflow-auto" id="searchResults"
                                style="max-height: 400px;">
                            </ul>
                        </div>
                    </div>
                    <div class="trust-user">
                        <p>Được tin tưởng bởi {{ $countUser }} người dùng <br>trên toàn thế giới</p>
                        <div class="trust-rating d-flex align-items-center">
                            <div class="rate-head">
                                <h2>+<span>{{count_review()}}</span></h2>
                            </div>
                            <div class="rating d-flex align-items-center">
                                <h2 class="d-inline-block average-rating">{{ average_rating() }}+</h2>
                                {{format_rating(average_rating())  }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 d-flex align-items-center">
                <div class="girl-slide-img aos" data-aos="fade-up">
                    <img src="{{ asset('img/object.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /Home Banner -->
<section class="section student-course">
    <div class="container">
        <div class="course-widget">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="course-full-width">
                        <div class="blur-border course-radius align-items-center aos" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center">
                                <div class="course-img">
                                    <img src="{{ asset('img/pencil-icon.svg') }}" alt="">
                                </div>
                                <div class="countNumber">
                                    <h4><span>{{ $countCourse }}</span></h4>
                                    <p>Khóa học online</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center">
                                <div class="course-img">
                                    <img src="{{ asset('img/cources-icon.svg') }}" alt="">
                                </div>
                                <div class="countNumber">
                                    <h4><span>{{ $countCategory }}</span></h4>
                                    <p>Danh mục khóa học</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center">
                                <div class="course-img">
                                    <img src="{{ asset('img/certificate-icon.svg') }}" alt="">
                                </div>
                                <div class="countNumber">
                                    <h4><span>{{ $countCertificate }}</span></h4>
                                    <p>Chứng chỉ hoàn thành</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex">
                    <div class="course-full-width">
                        <div class="blur-border course-radius aos" data-aos="fade-up">
                            <div class="online-course d-flex align-items-center">
                                <div class="course-img">
                                    <img src="{{ asset('img/gratuate-icon.svg') }}" alt="">
                                </div>
                                <div class="countNumber">
                                    <h4><span>{{ $countUserActive }}</span></h4>
                                    <p>Người dùng hoạt động</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Banner -->
