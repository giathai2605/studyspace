<footer class="footer">
    <!-- Footer Top -->
    <div class="footer-top aos" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-about">
                        <div class="footer-logo">
                            <img src="{{asset('img/logo.svg')}}" alt="logo">
                        </div>
                        <div class="footer-about-content">
                            <p>Các khóa học trực tuyến hấp dẫn và dễ tiếp cận cho tất cả mọi người</p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-2 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Cho quản trị viên</h2>
                        <ul>
                            @if(Auth::check())
                                <li>
                                    <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">Chỉnh
                                        sửa hồ sơ</a>
                                </li>
                            @endif
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}">Đăng ký</a></li>
                            <li><a href="{{ route('admin.index') }}">Trang quản trị</a></li>
                            <li><a href="{{ route('client.dashboard.index') }}"> Bảng điều khiển</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-2 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-menu">
                        <h2 class="footer-title">Cho người dùng</h2>
                        <ul>
                            @if(Auth::check())
                                <li>
                                    <a href="{{ route('client.dashboard.edit-profile',['id' => auth() -> user() -> id]) }}">Chỉnh
                                        sửa hồ sơ</a>
                                </li>
                            @endif
                            <li><a href="{{ route('login') }}">Đăng nhập</a></li>
                            <li><a href="{{ route('register') }}">Đăng ký</a></li>
                            <li><a href="{{ route('client.dashboard.index') }}"> Bảng điều khiển</a></li>
                        </ul>
                    </div>
                    <!-- /Footer Widget -->

                </div>

                <div class="col-lg-4 col-md-6">

                    <!-- Footer Widget -->
                    <div class="footer-widget footer-contact">
                        <h2 class="footer-title">Tin mới nhất</h2>
                        <div class="news-letter">
                            <form>
                                <input type="text" class="form-control" placeholder="Nhập địa chỉ email của bạn" name="email">
                            </form>
                        </div>
                        <div class="footer-contact-info">
                            <div class="footer-address">
                                <img src="{{asset('img/icon/icon-20.svg')}}" alt="" class="img-fluid">
                                <p> Số 1 Trịnh Văn Bô,<br> Nam Từ Liêm, Hà Nội </p>
                            </div>
                            <p>
                                <img src="{{asset('img/icon/icon-19.svg')}}" alt="" class="img-fluid">
                                <a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="42263027232f312e2f3102273a232f322e276c212d2f">[email&#160;đã được bảo vệ]</a>
                            </p>
                            <p class="mb-0">
                                <img src="{{asset('img/icon/icon-21.svg')}}" alt="" class="img-fluid">
                                +84 971 892 946
                            </p>
                        </div>
                    </div>
                    <!-- /Footer Widget -->

                </div>

            </div>
        </div>
    </div>
    <!-- /Footer Top -->

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <div class="container">

            <!-- Copyright -->
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6">
                        <div class="privacy-policy">
                            <ul>
                                <li><a href="term-condition.html">Điều khoản</a></li>
                                <li><a href="privacy-policy.html">Chính sách</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="copyright-text">
                            <p class="mb-0">&copy; Study Space. Yêu tất cả các bạn <img src="{{asset('img/icon/wish.svg')}}" alt="img"></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Copyright -->

        </div>
    </div>
    <!-- /Footer Bottom -->

</footer>
