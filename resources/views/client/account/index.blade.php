@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/account.css')}}">
@endsection
@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="d-flex">
                    <div class="col-6 d-flex align-items-center flex-column account-tab">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/checklist.png?1676652183181" alt="">
                        <div>Lịch sử đơn hàng</div>
                    </div>
                    <div class="col-6 d-flex align-items-center flex-column account-tab">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/account.png?1676652183181" alt="">
                        <div>Xin chào, <span>User name</span></div>
                    </div>
                </div>
                <div class="col tab-content account-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                </div>
            </div>
            <div class="col-4">
                <div class="nav flex-column nav-pills me-3 align-items-left" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Thông tin tài khoản</button>
                    <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Quản lý địa chỉ <span>(0)</span></button>
                    <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Đổi mật khẩu</button>
                    <button class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Cài đặt</button>
                </div>
            </div>
        </div>
    </div>
@endsection