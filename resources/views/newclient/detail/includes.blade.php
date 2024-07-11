<style>
    .btn-wish2 {
        background-color: #F66962;
        color: white;
    }

    .btn-wish2:hover {
        background-color: #f33b36;
    }
</style>
<div class="col-lg-4">
    <div class="sidebar-sec sticky-top" style="z-index: 1 !important; top: 100px">

        <!-- Video -->
        <div class="video-sec vid-bg">
            <div class="card">
                <div class="card-body">
                    <div class="video-details">
                       <div class="">
                        <div class="course-fee">
                            <h2><span
                                    style="margin-right:5px; color: #F66962">{{ format_currency($data->Price*(100-$data->Discount)/100) }}</span>
                            </h2>
                        </div>
                        <div class="d-flex gap-1">
                            <h2>
                                <del class="color:#">{{ format_currency($data->Price) }}</del>
                            </h2>
                            <div class="course-fee">
                                <h2><p>-{{ $data->Discount }}%</p></h2>
                            </div>
                        </div>
                       </div>
{{--                        <div class="row gx-2">--}}
{{--                            @if(Auth::check())--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <a href="{{route('wishlist.add.get',['id'=>$data->id])}}"--}}
{{--                                       class="btn btn-wish w-100 btn-wish2"></i> Yêu thích</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <a href="javascript:;" class="btn btn-wish w-100"></i> Chia sẻ</a>--}}
{{--                                </div>--}}
{{--                            @else--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <a href="{{route('wishlist.add.get',['id'=>$data->id])}}"--}}
{{--                                       class="btn btn-wish w-100 btn-wish2"></i> Yêu thích</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-md-6">--}}
{{--                                    <a href="javascript:(0);" class="btn btn-wish w-100"></i> Chia sẻ</a>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <center>
                            @if($data->chapters->isEmpty() || $data->chapters->first()->lessons->isEmpty())
                                <div class="all-btn all-category d-flex align-items-center justify-content-center">
                                <a href="#"
                                   class="btn btn-primary">
                                    Sắp ra mắt</a>
                                </div>
                            @else
                                <div class="all-btn all-category d-flex align-items-center justify-content-center">
                                <a href="{{ check_user_has_course($data->id) ? route('lesson-learn',['id'=>$data->chapters->first()->lessons->first()->id]) : route('checkout',["id"=>$data->id]) }}"
                                   class="btn btn-primary">
                                    {{ $userCourse == 0 ? "Mua ngay" : "Bắt đầu ngay" }} </a>
                                </div>
                            @endif
                        </center>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Video -->

        <!-- Include -->
        <div class="card include-sec">
            <div class="card-body">
                <div class="cat-title">
                    <h4>Thông tin khóa học</h4>
                </div>
                <ul>
                    <li>
                        <img src="{{asset('img/icon/import.svg')}}" class="me-2" alt="">
                            {{ countChapterInCourse($data->id) }} Chương
                    </li>
                    <li>
                        <img src="{{asset('img/icon/play.svg')}}" class="me-2" alt="">
                            {{ countLessonInCourse($data -> id) }}+ Bài học
                    </li>
                    <li>
                        <img src="{{asset('img/icon/key.svg')}}" class="me-2" alt="">
                        Truy cập trọn đời
                    </li>
                    <li>
                        <img src="{{asset('img/icon/teacher.svg')}}" class="me-2" alt="">
                        Cấp chứng chỉ hoàn thành
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Include -->

        <!-- Features -->
        <div class="card feature-sec">
            <div class="card-body">
                <div class="cat-title">
                    <h4>Học viên</h4>
                </div>
                <ul>
                    <li><img src="{{asset('img/icon/users.svg')}}" class="me-2" alt=""> Số người tham gia:
                        <span>{{countUserJoinCourse($data->id)}}</span>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /Features -->

    </div>
</div>

<script>
    $(document).ready(function () {
        $(".btn-wish").click(function (e) {
            e.preventDefault();

            var url = $(this).attr("href");

            $.ajax({
                url: url,
                method: "GET",
                success: function (response) {
                    if (response.success) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Thành công!',
                            text: response.message,
                            button: "OK",
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Thất bại!',
                            text: response.message,
                            button: "OK",
                        });
                    }
                },
                error: function (error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Thất bại!',
                        text: 'Vui lòng đăng nhập!',
                        button: "OK",
                    });
                }
            });
        });
    });
</script>
