@if(Auth::check())
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <div class="settings-widget dash-profile">
            <div class="settings-menu p-0">
                <div class="profile-bg">
                    <h5>{{ \App\Models\UserCourse::query()->where('UserID', auth()->id())->count() }}</h5>
                    <img src="{{asset('img/instructor-profile-bg.jpg')}}" alt="">
                    <div class="profile-img">
                        <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">
                            <img src="{{asset( auth() -> user() -> avatar)}}" style="object-fit: cover" alt="">
                        </a>
                    </div>
                </div>
                <div class="profile-group">
                    <div class="profile-name text-center">
                        <h4>
                            <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">{{ auth() -> user() -> lastName . " " . auth() -> user() -> firstName }}</a>
                        </h4>
                        <p>
                            @if(auth() -> user() -> roleID == 1)
                                Admin
                            @else
                                {{ '@' . auth()->user()->username }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="settings-widget account-settings">
            <div class="settings-menu">
                <h3>Bảng điều khiển</h3>
                <ul>
                    <li class="nav-item active" data-nav="home">
                        <a href="{{ route('client.dashboard.index') }}" class="nav-link">
                            {{-- <i class="feather-home"></i>  --}}
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-item" data-nav="dashboard/courses">
                        <a href="{{ route('dashboard.courses',['id' => auth() -> user() -> id]) }}" class="nav-link">
                            Khóa học của tôi
                        </a>
                    </li>
                    <li class="nav-item" data-nav="dashboard/certificate">
                        <a href="{{ route('dashboard.showCertificate',['id' => auth() -> user() -> id]) }}" class="nav-link">
                            Chứng chỉ của tôi
                        </a>
                    </li>
                </ul>
                <div class="instructor-title">
                    <h3>Cài đặt</h3>
                </div>
                <ul>
                    <li class="nav-item" data-nav="dashboard/edit-profile">
                        <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}"
                           class="nav-link ">
                            Chỉnh sửa hồ sơ
                        </a>
                    </li>

                    <li class="nav-item" data-nav="change-password">
                        <a href="{{ route('password.change.form')}}"
                           class="nav-link ">
                            Đổi mật khẩu
                        </a>
                    </li>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li class="nav-item" >
                            <a href="{{ route('logout') }}" class="nav-link"
                               onclick="event.preventDefault(); this.closest('form').submit();">
                                Đăng xuất
                            </a>
                        </li>
                    </form>
                </ul>
            </div>
        </div>
    </div>
@else
    <div class="col-xl-3 col-lg-4 col-md-12 theiaStickySidebar">
        <div class="settings-widget account-settings text-center py-4">
            <ul class="nav header-navbar-rht d-block justify-content-center">
                <li class="nav-item" style="padding-right: 0">
                    <a class="nav-link header-login mb-4" href="{{ route('home') }}">Trang chủ</a>
                </li>
                <li class="nav-item" style="padding-right: 0">
                    <a class="nav-link header-login mb-4" href="{{ asset('') . 'login' }}">Đăng nhập</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link header-login" href="{{ asset('') . 'register' }}">Đăng ký</a>
                </li>
            </ul>
        </div>
    </div>
@endif
