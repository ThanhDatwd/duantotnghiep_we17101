@extends('client.appLayoutEmpty.index')
<link rel="stylesheet" href="{{asset('css/client/thankyou.css')}}">

@section('main-content')

<div class="thankyou-page">
  <div class="grid_columns">
    <div class="logo">
      <img src="https://bizweb.dktcdn.net/100/431/449/themes/834425/assets/logo.png?1642042407923" alt="">
    </div>
    <div class="container">
      <div class="flex-area">
        <div class="thankyou-area">
          <div class="icon"><i class='bx bx-check'></i></div>
          <div class="text">
            <h3>Cảm ơn ban đã đặt hàng </h3>
            <p>Một e mail xác nhận đã được gửi tới <span class="confirm-email"> dat@gmail.com</span></p>
            <p>vui lòng kiểm tra email của bạn</p>
          </div>
        </div>
        <div class="confirm-orderList">
          <h4>Đơn hàng <span class="id-order">#</span> (<span class="count-sp"></span>)</h4>
          <ul class="order-list">


          </ul>
          <div class="orderSumary">
            <div class="orderSumary-line tmp-fee">
              <span class="text">Tạm tính</span>
              <span class="price"></span>
            </div>
            <div class="orderSumary-line ship-fee">
              <span class="text">phí ship</span>
              <span class="price"></span>
            </div>
            <div class="orderSumary-line total">
              <span class="text">Tổng cộng</span>
              <span class="price"></span>
            </div>
          </div>
        </div>
        <div class="confirm-info">
          <div class="confirm-line">
            <h3>Thông tin mua hàng</h3>
            <p class="name"></p>
            <p class="email"></p>
          </div>
          <div class="confirm-line">
            <h3>Đia chỉ giao hàng</h3>
            <p class="name"></p>
            <p class="email"></p>
          </div>
          <div class="confirm-line">
            <h3>phương thức giao dịch</h3>
            <p class="email">Thanh toán khi nhận hàng</p>
          </div>
          <div class="confirm-line">
            <h3>Phương thức vận chuyển</h3>
            <p class="name">Giao Tận nơi</p>
          </div>
        </div>

      </div>
    </div>
    <div class="black-area">
      <a href="?page=home"><button class="btn-main">Quay lại trang mua hàng </button></a>
      <i class='bx bx-printer'></i>
    </div>
  </div>
</div>
@endsection