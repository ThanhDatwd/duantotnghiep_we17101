@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/login.css')}}">
@endsection
@section('main-content')
<main>
    <div class="auth-form__container">
        <div class="auth-form">
            <div class="auth-form__head">
                <a href="{{route('clientshow-login')}}">
                    <li class="auth-form__heading">Đăng nhập</li>
                </a>
                <a href="">
                    <li class="auth-form__heading active">Đăng kí</li>
                </a>
            </div>
            <form action="{{route('clientregister')}}" method="POST" class="auth-form__register">
                <div class="auth-form__group">
                    <div class="mesage"></div>
                </div>
                <!-- Đây là chỗ đăng nhập -->
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">họ tên</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="text" name="name" placeholder="Nhập Họ" />
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">số điện thoại</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="number" name="phone" placeholder="Nhập Số Điện Thoại" />
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">email</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="email" name="email" placeholder="Nhập Địa Chỉ Email" require />
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">Địa chỉ </label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="text" name="address" placeholder="nhập địa chỉ của bạn" />
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">mật khẩu</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="password" name="password" placeholder="Nhập Mật Khẩu" />
                </div>
                <button class="auth-form__btn" type="submit">
                    TẠO TÀI KHOẢN
                </button>
            </form>
            <div class="register-form"></div>
        </div>
        <div class="auth-form__aside">
            <p class="auth-form__or">Hoặc đăng nhập qua</p>
        </div>
        <div class="auth-form__logins">
            <a href="#" class="logins-facebook login">
                <ion-icon name="logo-facebook"></ion-icon>
                <span>Facebook</span>
            </a>
            <a href="#" class="logins-google login">
                <ion-icon name="logo-google"></ion-icon>
                <span>Google</span>
            </a>
        </div>
    </div>
</main>
<script>
  
</script>
@endsection