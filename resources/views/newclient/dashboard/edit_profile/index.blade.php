@extends('newclient.dashboard.layouts.main')
@section('content_dashboard')
    <div class="settings-widget profile-details">
        <form action="{{ route('client.dashboard.update-profile',['id' => $user->id]) }}" method="POST"
              enctype="multipart/form-data" id="accountEdit"
              data-url="{{ route('client.dashboard.update-profile',['id' => $user->id]) }}"
              data-redirect="{{ route('client.dashboard.edit-profile',['id' => $user->id]) }}"
              class="settings-menu p-0">
            @csrf
            <div class="profile-heading">
                <h3>Trang cá nhân</h3>
                <p>Bạn có toàn quyền quản lý cài đặt tài khoản của riêng mình.</p>
            </div>
            <div class="course-group mb-0 d-flex  justify-content-center ">
                <div class="course-group-img d-flex align-items-center">
                    <img class="img-fluid" src="{{asset( auth()->user()-> avatar)}}" alt="" style="object-fit: cover; width: 100px; height: 100px">
                    <div class="course-name">
                        <h4>Hình đại diện của bạn</h4>
                        <input type="file" name="avatar" class="form-control" accept="image/*">
                        <p>PNG hoặc JPG có chiều rộng và chiều cao không lớn hơn 800px.</p>
                    </div>
                </div>
                <div class="profile-share d-flex align-items-center justify-content-center">
                </div>
            </div>
            <div class="checkout-form personal-address add-course-info">
                <div class="personal-info-head">
                    <h4>Thông tin cá nhân</h4>
                    <p>Chỉnh sửa thông tin cá nhân và địa chỉ của bạn.</p>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Tiểu sử</label>
                                <textarea type="text" class="form-control" name="description"
                                          placeholder="Hãy cho chúng tôi biết thêm về bạn...">{{ $user->description }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Tên người dùng</label>
                                <input name="username" type="text" class="form-control" placeholder="Tên..."
                                       value="{{ $user->username }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Tên</label>
                                <input name="firstName" type="text" class="form-control" placeholder="Tên..."
                                       value="{{ $user->firstName }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Họ</label>
                                <input name="lastName" type="text" class="form-control" placeholder="Họ..."
                                       value="{{ $user->lastName }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Điện thoại</label>
                                <input type="number" class="form-control" placeholder="Điện thoại" name="phone"
                                       value="{{ $user->phone }}">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control" placeholder="Email..."
                                       value="{{ $user->email }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Sinh nhật</label>
                                <input type="date" class="form-control" placeholder="Sinh nhật..." name="birthday"
                                       value="{{ $user->birthday }}">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Giới tính</label>
                                <select class="form-select select" name="gender">
                                    <option value="">Chọn giới tính</option>
                                    <option value="0" {{$user->gender == 0 ? 'selected' : ''}}>Nữ</option>
                                    <option value="1" {{$user->gender == 1 ? 'selected' : ''}}>Nam</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-control-label">Địa chỉ</label>
                                <textarea type="text" class="form-control" name="address"
                                          placeholder="Địa chỉ của bạn...">{{ $user->address }}</textarea>
                            </div>
                        </div>

                        <div class="update-profile-btn">
                            <button type="submit" class="btn btn-primary">Cập nhật hồ sơ</button>
                        </div>
                    </div>
                </form>
            </div>
        </form>
    </div>

@endsection
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('js/client/account.js') }}"></script>

