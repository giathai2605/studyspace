<div class="row">
    <div class="col-md-4 d-flex">
        <div class="card instructor-card w-100">
            <div class="card-body">
                <div class="instructor-inner">
                    <h6>Số khóa học đã tham gia</h6>
                    <h4 class="instructor-text-success">{{ $coursesAttended }}</h4>
                    <p>Khóa học</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card instructor-card w-100">
            <div class="card-body">
                <div class="instructor-inner">
                    <h6>Đã hoàn thành</h6>
                    <h4 class="instructor-text-info">
                        {{ $isDoneCourse }}
                    </h4>
                    <p>Khóa học</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 d-flex">
        <div class="card instructor-card w-100">
            <div class="card-body">
                <div class="instructor-inner">
                    <h6>Đã thích</h6>
                    <h4 class="instructor-text-warning">
                        {{ $isLikedCourse }}
                    </h4>
                    <p>Khóa học</p>

                </div>
            </div>
        </div>
    </div>
</div>


