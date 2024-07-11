<!-- Student Header -->
<div class="course-student-header">
    <div class="container">
        <div class="student-group">
            <div class="course-group">
                <div class="course-group-img d-flex">
                    <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}"><img
                            src="{{asset(auth()->user()->avatar)}}" alt="" style="object-fit: cover" class="img-fluid"></a>
                    <div class="d-flex align-items-center">
                        <div class="course-name">
                            <h4>
                                <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">{{ auth()->user()->lastName . ' ' . auth()->user()->firstName }}</a>
                            </h4>
                            <p>{{ '@' . auth()->user()->username }}</p>
                        </div>
                    </div>
                </div>
                <div class="course-share ">
                    <a href="{{ route('dashboard.student')}}" class="btn btn-primary">Bảng điều khiển</a>
                </div>
            </div>
        </div>
        <div class="my-student-list">
            <ul>
                {{-- <li><a href="deposit-student-dashboard.html">Dashboard</a></li> --}}
                <li><a href="{{ route('all.courses') }}">Khoá học</a></li>
                <li><a href="{{ route('wishlist') }}">Yêu thích</a></li>
                <li><a href="{{ route('student.message') }}">Tin nhắn</a></li>
                <li><a href="{{ route('student.purchase_history') }}">Lịch sử khoá học</a></li>
                {{-- <li><a class="active" href="deposit-student.html">Deposit</a></li> --}}
                {{-- <li class="mb-0"><a href="transactions-student.html">Transactions</a></li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /Student Header -->
