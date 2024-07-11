@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
    @if (session('status'))
        <script>
            swal({
                title: "Thành công!",
                text: "{{ session('status') }}",
                icon: "success",
                button: "OK",
            });
        </script>
    @endif
    <div class="settings-widget profile-details">
        <div class="settings-menu p-0">
            <div class="profile-heading">
                <h3>Bảo mật</h3>
                <p>Đổi mật khẩu tại đây.</p>
            </div>
            {{--            <div class="checkout-form personal-address border-line">--}}
            {{--                <div class="personal-info-head">--}}
            {{--                    <h4>Email Address</h4>--}}
            {{--                    <p>Your current email address is <span><a href="https://dreamslms.dreamstechnologies.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7b161a030c1e17173b1e031a160b171e55181416">[email&#160;protected]</a></span></p>--}}
            {{--                </div>--}}
            {{--                <form action="#">--}}
            {{--                    <div class="new-address">--}}
            {{--                        <div class="row">--}}
            {{--                            <div class="col-lg-6">--}}
            {{--                                <div class="form-group">--}}
            {{--                                    <label class="form-control-label">New email address</label>--}}
            {{--                                    <input type="text" class="form-control" placeholder="Enter your New email address">--}}
            {{--                                </div>--}}
            {{--                            </div>--}}
            {{--                            <div class="profile-share d-flex ">--}}
            {{--                                <button type="button" class="btn btn-success">Update</button>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            <div class="checkout-form personal-address">
                <div class="row">
                    <div class="col-lg-6">
                        <form method="POST" action="{{ route('password.change') }}">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">Mật khẩu hiện tại</label>
                                <div class="relative">
                                    <input type="password" name="current_password" id="current_password"
                                           class="form-control" placeholder="Nhập mật khẩu hiện tại">
                                    <button class="btn btn-default reveal absolute" id="oldToggleBtn"
                                            style="right: 0; top: 0" type="button"><i
                                            class="fa fa-eye-slash"></i></button>
                                </div>
                                <span>
                                    @error('current_password')
                                        <strong class="text-danger text-sm">{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Mật khẩu mới</label>
                                <div class="pass-group relative" id="passwordInput">
                                    <input type="password" name="new_password" id="new_password"
                                           class="form-control pass-input"
                                           placeholder="Nhập mật khẩu mới">
                                    <button class="btn btn-default reveal absolute" id="newToggleBtn"
                                            style="right: 0; top: 0" type="button"><i
                                            class="fa fa-eye-slash"></i></button>
                                </div>
                                <span>
                                    @error('new_password')
                                        <strong class="text-danger text-sm">{{ $message }}</strong>
                                    @enderror
                                </span>
                                <div class="password-strength" id="passwordStrength">
                                    <span id="poor"></span>
                                    <span id="weak"></span>
                                    <span id="strong"></span>
                                    <span id="heavy"></span>
                                </div>
                                <div id="passwordInfo"></div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Nhập lại mật khẩu mới</label>
                                <div class="relative">
                                    <input type="password" name="new_password_confirmation" id="re_password"
                                           class="form-control"
                                           placeholder="Xác nhận mật khẩu mới">
                                    <button class="btn btn-default reveal absolute" id="re_toggleBtn"
                                            style="right: 0; top: 0" type="button"><i
                                            class="fa fa-eye-slash"></i></button>
                                </div>
                                <span>
                                    @error('new_password_confirmation')
                                        <strong class="text-danger text-sm">{{ $message }}</strong>
                                    @enderror
                                </span>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <a class="text-sm text-primary"--}}
{{--                                   href="{{ route('password.request') }}">--}}
{{--                                    Quên mật khẩu rồi sao?--}}
{{--                                </a>--}}
{{--                            </div>--}}
                            <div class="update-profile save-password">
                                <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
