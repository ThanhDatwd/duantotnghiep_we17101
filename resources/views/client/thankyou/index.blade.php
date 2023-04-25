@extends('client.appLayoutEmpty.index')
@section('css')
<title>Cảm ơn bạn đã mua hàng!</title>
<link rel="stylesheet" href="{{asset('css/client/thankyou.css')}}">

@endsection
@section('main-content')
  <div class="container">
    <header>
      <div class="logo">
        <img style="width:160px" src="{{asset('img/logo.png')}}" alt="Logo">
      </div>
      <h1>Cảm ơn bạn đã mua hàng!</h1>
    </header>
    <div class="customer-info">
      <div class="confirm-info">
        <div class="confirm-line">
            <h3>Thông tin mua hàng</h3>
            <p><strong>Tên khách hàng :</strong>{{$order->user_name}}</p>
            <p><strong>Số điện thoại  :</strong>{{$order->phone}}</p>
            <p><strong>Email          :</strong>{{$order->email}}</p>
        </div>
         <div class="confirm-line">
            <h3>Đia chỉ giao hàng</h3>
            <p><strong>Địa chỉ nhà   :</strong>{{$order->address}}</p>
            <p><strong>Khu vực  :</strong>{{$order->ward}}, {{$order->district}}, {{$order->province}}</p>
        </div>
         <div class="confirm-line">
            <h3>Phương thức giao dịch</h3>
            @if ($order->payment_type=='ATM')
              <p class="email">Thanh toán online</p>
              
            @else
            <p class="email">Thanh toán khi nhận hàng</p>
              
            @endif
        </div>
         <div class="confirm-line">
            <h3>Phương thức vận chuyển</h3>
            <p class="name">Giao Tận nơi</p>
        </div>
    </div>
    </div>
    
    <div class="order-details">
      <!-- Hiển thị danh sách sản phẩm ở đây -->
      <div class="confirm-orderList">
        <h4>Đơn hàng <span class="id-order">{{$order->code}}</h4>
        <ul class="order-list">
          @foreach ($order->order_details as $item )
          <div class="order-item">
            <div class="order-item_img">
                <img src="{{asset('upload/'.$item->product_thumb)}}" alt="">
                <span>{{$item->quantity}}</span>
            </div>
            <div class="order-item_txt">
                <div>
                    <p class="name">{{$item->product_name}}</p>
                </div>
                <div class="price">{{number_format($item->price)}}</div>
            </div>
        </div>
          @endforeach
          
        </ul>
        <div class="orderSumary">
          <div class="orderSumary-line total">
            <span class="text">Tổng cộng</span>
            <span class="price">
               {{number_format($order->total)}}
            </span>
          </div>
        </div>
      </div>
    
      <div class="thank-you">
        <h2>Cảm ơn bạn đã mua hàng!</h2>
        <p>Xin vui lòng giữ đơn hàng của bạn cho tới khi bạn nhận được sản phẩm của mình.</p>
        <div class="d-flex  align-items-center justify-content-between">
          <a href="{{route('client')}}">Trở về trang mua hàng</a>
          <button class="btn btn-primary" onclick="window.print()">In đơn hàng</button>
        </div>
      </div>
  </div>
@endsection
