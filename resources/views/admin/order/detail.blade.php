@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/detailorder.css')}}">
@endsection
@section('content')

<div class="container row m-0 " style="max-width:100%">
    
    <div class=" user col-7 pt-4">
        <div class="d-flex align-items-center mb-4">
            <div class="fw-bold" style="font-size: 25px">Sản phẩm đặt hàng</div>
        </div>
        <div class="box-inner-1 pb-3 mb-3 ">
            <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                data-bs-interval="2000">
                <div class="carousel-inner" style="height: 0%">
                    <div class="carousel-item active">
                        <style>
                            .sanpham {
                                display: flex;
                                background: #fff;
                                margin-bottom: 10px;
                                border-radius: 4px;
                                padding: 0 8px;
                            }

                            .sanpham .box {
                                margin: 8px 10px;

                            }

                            .sanpham .box2 {
                                width: 100%;
                            }

                            .sanpham .box img {
                                width: 70px
                            }

                            .boxx {
                                display: flex;
                                border-top: 1px solid darkgray;
                                padding-top: 10px;
                                gap: 20px;
                            }

                            .boxx .left ,
                            .boxx .right {
                                font-size: 12px
                            } 
                            
                            .boxname {
                                width: 100%;
                                font-size: 14px;
                                text-transform: capitalize;

                            }

                            .boxname h4 {
                                font-size: 14px
                            }
                        </style>
                        @foreach ($order_detail as $od)
                        @if ($od->order_id == $order->id)
                        <div class="sanpham">
                            <div class="box box1">
                                <img  src="{{asset('upload/'.$od->thumb)}}"
                                    onerror="this.src='{{asset('upload/error.jpg')}}'" class="orderDetaiProductImg" alt="">
                            </div>
                            <div class="box box2 ">
                                <div class="boxcon boxname">
                                    <h4>{{$od->product_name}}</h4>
                                </div>
                                <div class="boxcon boxx">
                                    <div class="right">Số lượng: {{$od->quantity}}</div>
                                    <div class="left">Đơn giá: {{$od->price}}</div>
                                </div>

                            </div>

                        </div>
                        @endif
                        @endforeach
                    </div>

                </div>

            </div>
            <p class="dis info my-3">
            </p>
            <div class="radiobtn">
                <input type="radio" name="box" id="one">
                <input type="radio" name="box" id="two">
                <input type="radio" name="box" id="three">
        
            </div>
        </div>
    </div>
    <div class="col-5 pt-4">
        <div class="box-inner-2">
            <div class="d-flex align-items-center mb-4">
                <div class="fw-bold" style="font-size: 25px">Thông tin đơn đặt hàng</div>
            </div>
            <form action="/admin/order/detail/{{$order->id}}" enctype="multipart/form-data" method="post">
                <div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">Tên người đặt hàng</p>
                        <input class="form-control" type="text" disabled value="{{$order->user_name}}">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Email </p>
                        <input class="form-control" type="text" disabled value="{{$order->email}}">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Số điện thoại </p>
                        <input class="form-control" type="text" disabled value="{{$order->phone}}">
                    </div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">Địa chỉ nhà</p>
                        <input class="form-control" type="text" disabled value="{{$order->address}}">
                    </div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">khu vực</p>
                        <input class="form-control" type="text" disabled value=" {{$order->ward}}, {{$order->district}}, {{$order->province}}">
                    </div>
                    <div class="mb-2">
                        <label for="one" class="box py-2 first">
                            <div class="d-flex align-items-start">
                                <span class="circle"></span>
                                <div class="course">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <span class="fw-bold">
                                            Chú thích của khách hàng
                                        </span>
                                        {{-- <span class="fas fa-dollar-sign">29</span> --}}
                                    </div>
                                    <span>{{$order->customer_note}}</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">Trạng thái</p>
                        <select name="status" class="form-select">
                            @if ($order->status == 1)
                            <option value="1" selected>Đang chờ xác nhận</option>
                            <option value="2">Xác nhận</option>
                            <option value="3">Đang giao</option>
                            <option value="4">Hoàn thành</option>
                            @elseif ($order->status == 2)
                            <option value="1">Đang chờ xác nhận</option>
                            <option value="2" selected>Xác nhận</option>
                            <option value="3">Đang giao</option>
                            <option value="4">Hoàn thành</option>
                            @elseif ($order->status == 3)
                            <option value="1">Đang chờ xác nhận</option>
                            <option value="2">Xác nhận</option>
                            <option value="3" selected>Đang giao</option>
                            <option value="4">Hoàn thành</option>
                            @else
                            <option value="1">Đang chờ xác nhận</option>
                            <option value="2">Xác nhận</option>
                            <option value="3">Đang giao</option>
                            <option value="4" selected>Hoàn thành</option>
                            @endif

                        </select>
                    </div>
                    <br>
                    <div class="d-flex flex-column dis">
                        {{-- <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Số lượng</p>
                            <p>{{$order_detail->quantity}}</p>
                        </div> --}}
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Hình thức thanh toán</p>
                            <p> @if ($order->payment_type=="ATM")
                                Online
                                @elseif ($order->payment_type=="COD")
                                COD
                                @else
                                COD
                                @endif</p>
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Phí giao hàng<span></span></p>
                            <p>{{number_format($order->fee_ship)}} VNĐ</p>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="fw-bold">Tổng</p>
                            <p class="fw-bold">{{number_format($order->total)}} VNĐ</p>
                        </div>
                        <div class="btn btn-primary mt-2"><button type="submit"
                                style="background: none; border:none;color:aliceblue">Cập nhật</button>
                        </div>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
    
</div>
</div>
@endsection