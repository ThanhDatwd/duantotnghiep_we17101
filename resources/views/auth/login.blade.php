<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

<section class="vh-100" style="background-color: #33935e;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/img1.webp"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form action="{{route('sitelogin')}}" method="post">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif
                    @if (Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif

                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <span class="h1 fw-bold mb-0">Đăng nhập</span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Đăng nhập vào tài khoản của bạn</h5>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Tài khoản </label>
                      <input type="text" name="email" value="{{old('email')}}" id="form2Example17" class="form-control form-control-lg" value="" />
                        <span class="text-danger">@error('email')
                            {{$message}}
                        @enderror</span>
                    </div>
  
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Mật khẩu</label>
                      <input type="password" name="password" id="form2Example27" class="form-control form-control-lg" />
                      <span class="text-danger">@error('password')
                        {{$message}}
                    @enderror</span>
                    </div>
                    
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Đăng nhập</button>
                    </div>
  
                    <a class="small text-muted" href="#!">Quên mật khẩu?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Bạn không có tài khoản? <a href="/register"
                        style="color: #393f81;">Đăng ký tại đây</a></p>
                    {{-- <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a> --}}
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>