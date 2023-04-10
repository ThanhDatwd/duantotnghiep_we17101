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
                @csrf
                <div class="auth-form__group">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

                </div>
                <!-- Đây là chỗ đăng nhập -->
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">họ tên</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="text" name="username" value="{{old("username")}}" placeholder="Nhập Họ" />
                    <span class="text-danger">@error('username')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">số điện thoại</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="number" name="phone" value="{{old("phone")}}" placeholder="Nhập Số Điện Thoại" />
                    <span class="text-danger">@error('phone')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">email</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="email" name="email" value="{{old("email")}}" placeholder="Nhập Địa Chỉ Email" require />
                    <span class="text-danger">@error('email')
                        {{$message}}
                        @enderror
                    </span>
                </div>
                <div class="auth-form__group">
                    <div class="auth-form__group-data">
                        <label class="group-label">mật khẩu</label>
                        <span class="group-obli">*</span>
                    </div>
                    <input type="password" name="password" placeholder="Nhập Mật Khẩu" />
                    <span class="text-danger">@error('password')
                        {{$message}}
                        @enderror
                    </span>
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