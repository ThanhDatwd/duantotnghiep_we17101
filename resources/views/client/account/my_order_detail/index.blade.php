@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/myorderdetail.css')}}">
@endsection
@section('main-content')
<div class="container">
    <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
        <ol class="breadcrumb py-3" @style("margin:0;padding-left:0px")>
          <li class="breadcrumb-item"><a href="{{route('client')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{route('clientaccount')}}">Tài khoản</a></li>
          <li class="breadcrumb-item"><a href="{{route('clientaccount-show-order')}}">Đơn hàng</a></li>
          <li class="breadcrumb-item active" aria-current="page">{{$myOrder->code}}</li>
        </ol>
      </nav>
    <div class="user-page__head mt-3">
        <h5>Chi tiết đơn hàng</h5>
    </div>

    <div class="myOrderDetail">
        <div class="order-status">
            <div class="order-status__payment">
                <span>Trạng thái thanh toán</span>
                <strong class="status">
                    @if ($myOrder->payment_type=="ATM"||$myOrder->status == 4)
                    Đã thanh toán
                    @else
                    Chưa thanh toán
                    @endif
                </strong>
            </div>
            <div class="order-status__trans">
                <span>Trạng thái vận chuyển</span>
                <strong class="status">
                    @if ($myOrder->status == 1)
                    Đang chờ xác nhận
                    @elseif ($myOrder->status == 2)
                    Đã xác nhận
                    @elseif ($myOrder->status == 3)
                    Đang giao
                    @elseif ($myOrder->status == 4)
                    Hoàn thành
                    @else
                    Hủy
                    @endif
                </strong>
            </div>
        </div>
        <!-- DANH SÁCH SẢN PHẨM TRONG HÓA ĐƠN -->
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 order-info  customer">
                <div class="order-box">
                    <h6 class="title">ĐỊA CHỈ GIAO HÀNG</h6>
                    <div class="order-box__info">
                        <p class="name">
                            Người nhận : {{$myOrder->user_name}}
                        </p>
                        <p class="address"><strong>Địa chỉ người nhận: </strong> {{$myOrder->address}}, {{$myOrder->ward}},
                            {{$myOrder->district}}, {{$myOrder->province}}

                        </p>
                        <p class="phone"><strong>Số điện thoại người nhận: </strong> {{$myOrder->phone}}

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 order-info customer">
                <div class="order-box">
                    <h6 class="title">THANH TOÁN</h6>
                    <div class="order-box__info">
                        <div class="payment"> @if ($myOrder->payment_type=="ATM")
                            Online
                            @elseif ($myOrder->payment_type=="cod")
                            Thanh toán khi nhận hàng (COD)
                            @endif</div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-3 order-info customer">
                <div class="order-box">
                    <h6 class="title">GHI CHÚ</h6>
                    <div class="order-box__info">
                        <div class="note">
                            {{$myOrder->customer_note}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <table class="table table-bordered ">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Đơn giá </th>
                    <th>số lượng </th>
                    <th>Tổng</th>
                </tr>
            </thead>
            <tbody>
                 
                @foreach ($order__detail as $item )
                            <th>
                                <div class=" column_product">
                                    <a href="?page=detail&id='.$item['product_id'].'" class="image">
                                        <img src="{{asset('upload/'.$item->product->thumb)}}'" alt="">
                                    </a>
                                    <div class="text">
                                        <p>{{$item->product_name}}</p>
                                    </div>
                                </div>
                            </th>
                            <td>{{number_format($item->price)}}</td>
                            <td>{{$item->quantity}}</td>
                            <td> {{$item->quantity*$item->price}}</td>
                        </tr>
                    
                @endforeach<tr>
            </tbody>
        </table>
        <table class="table table-bordered ">
            <tbody>
                <tr>
                    <td>Phí vận chuyển</td>
                    <td class="price">{{number_format($myOrder->fee_ship)}}</td>
                </tr>
                <tr>
                    <td>tổng</td>
                    <td class="price total">
                        {{number_format($myOrder->total)}} vnđ
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>
@endsection