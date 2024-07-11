<header class="header">
    <div class="header-fixed">
        <nav class="navbar navbar-expand-lg header-nav scroll-sticky">
            <div class="container">
                <div class="navbar-header">
{{--                    <a id="mobile_btn" href="javascript:void(0);">--}}
{{--                        <span class="bar-icon">--}}
{{--                            <span></span>--}}
{{--                            <span></span>--}}
{{--                            <span></span>--}}
{{--                        </span>--}}
{{--                    </a>--}}
                    <a href="{{ route('home') }}" class="navbar-brand logo">
                        <img src="{{asset('img/logo2.svg')}}" class="img-fluid" alt="Logo">
                    </a>
                </div>
                <div class="main-menu-wrapper">
                    <div class="menu-header">
                        <a href="{{ route('home') }}" class="menu-logo">
                            <img src="{{asset('img/logo2.svg')}}" class="img-fluid" alt="Logo">
                        </a>
                        <a id="menu_close" class="menu-close" href="javascript:void(0);">
                            <i class="fas fa-times"></i>
                        </a>
                    </div>
                    <ul class="main-nav">
{{--                        <li class="has-submenu active">--}}
{{--                            <a class="" href="{{ route('home') }}">Trang chủ</a>--}}
{{--                        </li>--}}
{{--                        <li class="has-submenu">--}}
{{--                            <a href="#">Danh mục khóa học <i class="fas fa-chevron-down"></i></a>--}}
{{--                            <ul class="submenu">--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    <li>--}}
{{--                                        <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="has-submenu">--}}
{{--                            <a href="#">Student <i class="fas fa-chevron-down"></i></a>--}}
{{--                            <ul class="submenu first-submenu">--}}
{{--                                <li class="has-submenu ">--}}
{{--                                    <a href="students-list.html">Student</a>--}}
{{--                                    <ul class="submenu">--}}
{{--                                        <li><a href="students-list.html">List</a></li>--}}
{{--                                        <li><a href="students-grid.html">Grid</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="setting-edit-profile.html">Student Profile</a></li>--}}
{{--                                <li><a href="setting-student-security.html">Security</a></li>--}}
{{--                                <li><a href="setting-student-social-profile.html">Social profile</a></li>--}}
{{--                                <li><a href="setting-student-notification.html">Notification</a></li>--}}
{{--                                <li><a href="setting-student-privacy.html">Profile Privacy</a></li>--}}
{{--                                <li><a href="setting-student-accounts.html">Link Accounts</a></li>--}}
{{--                                <li><a href="setting-student-referral.html">Referal</a></li>--}}
                                {{-- <li><a href="setting-student-subscription.html">Subscribtion</a></li>
                                <li><a href="setting-student-billing.html">Billing</a></li>
                                <li><a href="setting-student-payment.html">Payment</a></li>
                                <li><a href="setting-student-invoice.html">Invoice</a></li>
                                <li><a href="setting-support-tickets.html">Support Tickets</a></li> --}}
{{--                            </ul>--}}
{{--                        </li>--}}
                        {{-- <li class="has-submenu">
                            <a href="#">Pages <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="notifications.html">Notification</a></li>
                                <li><a href="pricing-plan.html">Pricing Plan</a></li>
                                <li><a href="wishlist.html">Wishlist</a></li>
                                <li class="has-submenu">
                                    <a href="course-list.html">Course</a>
                                    <ul class="submenu">
                                        <li><a href="add-course.html">Add Course</a></li>
                                        <li><a href="course-list.html">Course List</a></li>
                                        <li><a href="course-grid.html">Course Grid</a></li>
                                        <li><a href="course-details.html">Course Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-submenu">
                                    <a href="come-soon.html">Error</a>
                                    <ul class="submenu">
                                        <li><a href="come-soon.html">Comeing soon</a></li>
                                        <li><a href="error-404.html">404</a></li>
                                        <li><a href="error-500.html">500</a></li>
                                        <li><a href="under-construction.html">Under Construction</a></li>
                                    </ul>
                                </li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="support.html">Support</a></li>
                                <li><a href="job-category.html">Category</a></li>
                                <li><a href="cart.html">Cart</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                                <li><a href="login.html">Login</a></li>
                                <li><a href="register.html">Register</a></li>
                                <li><a href="forgot-password.html">Forgot Password</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
                            <a href="#">Blog <i class="fas fa-chevron-down"></i></a>
                            <ul class="submenu">
                                <li><a href="blog-list.html">Blog List</a></li>
                                <li><a href="blog-grid.html">Blog Grid</a></li>
                                <li><a href="blog-masonry.html">Blog Masonry</a></li>
                                <li><a href="blog-modern.html">Blog Modern</a></li>
                                <li><a href="blog-details.html">Blog Details</a></li>
                            </ul>
                        </li> --}}
{{--                        <li class="login-link">--}}
{{--                            <a href="login.html">Login / Signup</a>--}}
{{--                        </li>--}}
                    </ul>
                </div>

                @if(Auth::check())
                    <ul class="nav header-navbar-rht">
                        <li class="nav-item user-nav">
                            <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-img">
                                <img src="{{asset(auth()->user()->avatar)}}" alt="">
                                <span class="status online"></span>
                            </span>
                            </a>
                            <div class="users dropdown-menu dropdown-menu-right" data-popper-placement="bottom-end" style="min-width: 250px">
                                <div class="user-header align-items-center">
                                    <div class="avatar avatar-sm">
                                        <img src="{{asset(auth()->user()->avatar)}}" alt="User Image"
                                             class="avatar-img rounded-circle">
                                    </div>
                                    <div class="user-text">
                                        <h7>{{ auth()->user()->lastName . ' ' .  auth()->user()->firstName }}</h7>
                                        <p class="text-muted mb-0">{{ '@' . auth()->user()->username }}</p>
                                    </div>
                                </div>
                                <a class="dropdown-item" href="{{ route('home') }}">
                                     Trang chủ
                                </a>
                                <a class="dropdown-item" href="{{ route('client.dashboard.index') }}">
                                  Bảng điều khiển</a>
                                @if(auth()->user()->hasAnyRole(['Admin', 'IT - Support', 'Quality Manager', 'Censor', 'Supper Admin']))
                                    <a class="dropdown-item" href="{{ route('admin.index') }}">
                                             Trang quản trị</a>
                                @endif
                                @if(Auth::check())
                                    <a class="dropdown-item"
                                       href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">Chỉnh sửa hồ sơ</a>
                                    <a class="dropdown-item"
                                       href="{{ route('dashboard.courses', auth()->id()) }}">
                                        Khóa học của tôi</a>
                                    <a class="dropdown-item"
                                        href="{{ route('users.my-courses') }}">
                                         Lịch sử mua hàng</a>
                                @endif
                                <a class="dropdown-item"
                                   href="{{ route('wishlist') }}"> Danh sách yêu thích</a>
{{--                                <div class="dropdown-item night-mode">--}}
{{--                                    <span><i class="feather-moon me-1"></i> Chế độ tối </span>--}}
{{--                                    <div class="form-check form-switch check-on m-0">--}}
{{--                                        <input class="form-check-input" type="checkbox" id="night-mode">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); this.closest('form').submit();">
                                        Đăng xuất
                                    </a>
                                </form>
                            </div>
                        </li>
                    </ul>
                @else
                    <ul class="nav header-navbar-rht">
                        <li class="nav-item">
                            <a class="nav-link header-sign" href="{{ asset('') . 'login' }}">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header-login" href="{{ asset('') . 'register' }}">Đăng Ký</a>
                        </li>
                    </ul>
                @endif
            </div>
        </nav>
    </div>
</header>
