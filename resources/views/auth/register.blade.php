<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<style>

.card-registration .select-input.form-control[readonly]:not([disabled]) {
font-size: 1rem;
line-height: 2.15;
padding-left: .75em;
padding-right: .75em;
}
.card-registration .select-arrow {
top: 13px;
}
</style>
<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row justify-content-center align-items-center h-100">
        <div class="col-12 col-lg-9 col-xl-7">
          <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
            <div class="card-body p-4 p-md-5">
              <h1 class="mb-4 pb-2 pb-md-0 mb-md-5">ĐĂNG KÝ</h1>
              <form action="/admin/admin_users/them"method="post" class="col-12 m-auto" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 mb-4">
                      <div class="form-outline">
                          <label class="form-label" for="firstName">Tên đăng nhập</label>
                        <input type="text" id="firstName" class="form-control form-control-lg" />
                      </div>
    
                    </div>
                
                  </div>
                  <div class="row">
                    <div class="col-md-12 mb-4">
                      <div class="form-outline">
                          <label class="form-label" for="firstName">Mật khẩu</label>
                        <input type="text" id="firstName" class="form-control form-control-lg" />
                      </div>
    
                    </div>
                
                  </div>
                 
                <div class="row">
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                        <label class="form-label" for="firstName">Họ</label>
                      <input type="text" id="firstName" class="form-control form-control-lg" />
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4">
  
                    <div class="form-outline">
                        <label class="form-label" for="lastName">Tên</label>
                      <input type="text" id="lastName" class="form-control form-control-lg" />
                    </div>
                  </div>
                </div>
                  {{-- <div class="row">
                      <div class="col-12 mb-4">
                          <div class="form-outline">
                          <label class="form-label"  for="lastName">Họ và tên</label>
                          <input type="text" class="form-control form-control-lg">
                          </div>
                      </div>
                  </div> --}}
  
                <div class="row">
                  <div class="col-md-6 mb-4 d-flex align-items-center">
                    <div class="form-outline datepicker w-100">
                        <label for="birthdayDate" class="form-label">Ngày sinh</label>
                      <input type="text" class="form-control form-control-lg" id="birthdayDate" />
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4">
                    <h6 class="mb-2 pb-1">Giới tính: </h6>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="femaleGender"
                        value="option1" checked />
                      <label class="form-check-label" for="femaleGender">Nữ</label>
                    </div>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="maleGender"
                        value="option2" />
                      <label class="form-check-label" for="maleGender">Nam</label>
                    </div>
  
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="otherGender"
                        value="option3" />
                      <label class="form-check-label" for="otherGender">Khác</label>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                        <label class="form-label" for="emailAddress">Email</label>
                      <input type="email" id="emailAddress" class="form-control form-control-lg" />
                    </div>
  
                  </div>
                  <div class="col-md-6 mb-4 pb-2">
  
                    <div class="form-outline">
                        <label class="form-label" for="phoneNumber">Số điện thoại</label>
                      <input type="tel" id="phoneNumber" class="form-control form-control-lg" />
                    </div>
  
                  </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-4">
                        <label class="form-label" for="phoneNumber">Địa chỉ</label>
                        <input type="text" id="" class="form-control form-control-lg" />

                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="file">
                    </div>
                </div>
  
                <div class="mt-4 col-12 pt-2">
                  <input class="btn btn-dark btn-lg" style="width:100%" type="submit" value="Đăng ký" />
<hr>
                  <a href="/login"> <input  class="btn btn-success btn-lg" style="width:100%" value="Đăng nhập" />
                  </a>
                </div>
  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>