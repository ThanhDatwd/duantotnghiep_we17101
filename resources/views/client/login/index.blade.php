@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/login.css')}}">
@endsection
@section('main-content')
    
<main>
    <div class="auth-form__container">
      <div class="auth-form">
        <div class="auth-form__head">
          <a href="">
            <li class="auth-form__heading active">Đăng nhập</li>
          </a>
          <a href="{{route('clientshow-register')}}">
            <li class="auth-form__heading ">Đăng kí</li>
          </a>
        </div>
        <form action="{{route('clientlogin')}}" method="POST" class="auth-form__login ">
          @csrf
          <div class="auth-form__group">
            @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif
            @if (Session::has('fail'))
            <div class="mesage">{{Session::get('fail')}}</div>
            <div class="alert alert-danger">{{Session::get('fail')}}</div>
            @endif

          </div>
          <!-- Đây là chỗ đăng nhập -->
          <div class="auth-form__group">
            <div class="auth-form__group-data">
              <label class="group-label">Email</label>
              <span class="group-obli">*</span>
            </div>
            <input type="text" name="email" value="{{old("email")}}" placeholder="email" />
            <span class="text-danger">@error('email')
              {{$message}}
          @enderror</span>
          </div>
          <div class="auth-form__group">
            <div class="auth-form__group-data">
              <label class="group-label">mật khẩu</label>
              <span class="group-obli">*</span>
            </div>
            <input type="password" name="password"  placeholder="Nhập Mật Khẩu" />
            <span class="text-danger">@error('password')
              {{$message}}
          @enderror</span>
          </div>
          <a href="#" class="forget-password">Quên mật khẩu ?</a>
          <button class="auth-form__btn" type="submit">ĐĂNG NHẬP</button>
        </form>
      </div>
      <div class="auth-form__aside">
        <p class="auth-form__note">
          The Food cam kết bảo mật và sẽ không bao giờ đăng hay chia sẻ
          thông tin mà chưa có được sự đồng ý của bạn.
        </p>
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
    // const formLogin=document.querySelector('.auth-form__login');
    // const phone=formLogin.querySelector('[name=phone]')
    // const password=formLogin.querySelector('[name=password]')
    // const mesageElement=formLogin.querySelector('.mesage')
    // const mesage=(text='')=>{
    //   mesageElement.innerHTML=text
    //   mesageElement.classList.add('active')
    // }
    // function login(shop_id) {
    //   console.log(phone.value)
    //   if(phone.value==""||password.value==""){
    //     mesage('Vui lòng nhập đầy đủ thông tin')
    //   }
    //   else{
    //     $.post('./controller/user/login.php', {
    //         phone:phone.value,
    //         password:password.value
    //       },
    //       (data) => {
    //         if(data==202){
    //            location.href='?page=user'
    //         }
    //         else{
    //           mesage(data)
    //         }
    
    //       })
    //     }
    //   }
    //   formLogin.onsubmit=(e)=>{
    //     e.preventDefault();
    //     login()
    //   }
  </script>
@endsection