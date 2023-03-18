@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/account.css')}}">
@endsection
@section('main-content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-8">
                <div class="d-flex account-tabs">
                    <div class="col-6 d-flex align-items-center flex-column account-tab ">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/checklist.png?1676652183181" alt="">
                        <div class="tab-title">Lịch sử đơn hàng</div>
                    </div>
                    <div class="col-6 d-flex align-items-center flex-column account-tab">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/account.png?1676652183181" alt="">
                        <div class="tab-title">Xin chào, <span class="tab-name">{{Auth::guard('web')->user()->username}}</span>!</div>
                    </div>
                </div>
                <div class="col tab-content account-tab" id="v-pills-tabContentnt">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h4>Thông tin cá nhân</h4>
                        <div class="info"><span>Họ và tên: </span>{{Auth::guard('web')->user()->username}}</div>
                        <div class="info"><span>Email: </span>{{Auth::guard('web')->user()->email}}</div>
                        <div class="info"><span>Số điên thoại: </span>{{Auth::guard('web')->user()->phone}}</div>
                        <div class="info"><span>Giới tính: </span>Nam</div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <button class="btn-main">Thêm địa chỉ</button>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <h4>Đổi mật khẩu</h4>
                        <p>Để đảm bảo tính bảo mật vui lòng đặt mật khẩu với ít nhất 8 kí tự</p>
                        <div class="mb-3">
                            <label for="currentPassword" class="form-label">Mật khẩu hiện tại <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="currentPassword" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="newPassword" class="form-label">Mật khẩu mới <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="newPassword" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="newPaswordRepeat" class="form-label">Nhập lại mật khẩu mới <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="newPaswordRepeat" placeholder="">
                        </div>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..55.</div>
                </div>
            </div>
            <div class="col-4">
                <div class="nav flex-column nav-pills me-3 align-items-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Thông tin tài khoản</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Quản lý địa chỉ <span>(0)</span></button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Đổi mật khẩu</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false"><a href="{{route('clientlogout-user')}}">Đăng xuất</a></button>
                </div>
            </div>
        </div>
    </div>
@endsection