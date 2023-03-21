@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/detailorder.css')}}">
@endsection
@section('content')

<div class="container d-lg-flex">
        <div class="box-1 bg-light user w-100">
            <div class="d-flex align-items-center mb-3 ">
                {{-- <img src="{{asset('upload/'.$order_detail->thumb)}}" onerror="this.src='{{asset('upload/error.jpg')}}'"
                    class="pic rounded-circle" alt=""> --}}
                    <p class="fw-bold" style="font-size: 35px">Chi tiết đơn đặt hàng</p>
            </div>
            <div class="box-inner-1 pb-3 mb-3 ">
                {{-- <div class="d-flex justify-content-between mb-3 userdetails">
                   
                </div> --}}
                <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                    data-bs-interval="2000">
                    <div class="carousel-inner" style="height: 0%">
                        <div class="carousel-item active">
                            <style>
                                .sanpham {
                                    display: flex;
                                    background: #fff;
                                    margin: 10px 0;
                                    border-radius: 20px;
                                    padding:10px 20px 0 20px;
                                }
                                .sanpham .box {
                                    margin: 8px 10px;
                                    
                                }
                                .sanpham .box2{
                                    width: 100%;
                                }
                                .sanpham .box img {
                                    max-width:  150px;
                                    height: 100%;
                                    max-height: 100px;
                                }
                                .boxx{
                                    display: flex;
                                    border-top: 1px solid darkgray;
                                    padding-top: 20px
                                }
                                .boxx .left {
                                    margin-left: 20px;
                                    float: right;

                                }
                                .boxx .right {
                                    float: right
                                }
                                .boxname {
                                    width: 100%;
                                    padding:15px 0;
                                    text-transform: capitalize;
                                    
                                }
                                .boxname h4 {
                                    font-size: 20px
                                }
                            </style>
                            @foreach ($order_detail as $od)
                            @if ($od->order_id == $order->id)
                                <div class="sanpham">
                                    <div class="box box1">
                <img src="{{asset('upload/'.$od->thumb)}}" onerror="this.src='{{asset('upload/error.jpg')}}'"
                    class="" alt="">
                                    </div>
                                    <div class="box box2 ">
                                        <div class="boxcon boxname">
                                            <h4>{{$od->product_name}}</h4>
                                        </div>
                                       
                                        <div class="boxcon boxx">
                                            <p class="right">Số lượng: {{$od->quantity}}</p>
                                            <p class="left"> Giá: {{$od->price}}</p>
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
                    {{-- <label for="two" class="box py-2 second">
                        <div class="d-flex">
                            <span class="circle"></span>
                            <div class="course">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold">
                                        Collection 01
                                    </span>
                                    <span class="fas fa-dollar-sign">29</span>
                                </div>
                                <span>10 x Presets. Released in 2018</span>
                            </div>
                        </div>
                    </label> --}}
                    <label for="three" class="box py-2 third">
                        <div class="d-flex">
                            <span class="circle"></span>
                            <div class="course">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="fw-bold">
                                        Chú thích của shop
                                    </span>
                                    {{-- <span class="fas fa-dollar-sign">29</span> --}}
                                </div>
                                <span>{{$order->shop_note}}</span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="box-inner-2">
                <div>
                    <p class="fw-bold" style="font-size: 25px">Thông tin đơn đặt hàng</p>
                </div>
                <form action="/admin/order/detail/{{$order->id}}"  enctype="multipart/form-data" method="post">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Tên người đặt hàng</p>
                        <input class="form-control" type="text" disabled value="{{$order->user_name}}">
                    </div>
                    <div>
                        <p class="dis fw-bold mb-2">Email </p>
                        <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                            {{-- <div class="fab fa-cc-visa ps-3"></div> --}}
                            <input type="text" class="form-control" disabled placeholder="{{$order->email}}">
                            {{-- <div class="d-flex w-50">
                                <input type="text" class="form-control px-0" placeholder="MM/YY">
                                <input type="password" maxlength=3 class="form-control px-0" placeholder="CVV">
                            </div> --}}
                        </div>
                        <div class="my-3">
                            <p class="dis fw-bold mb-2">Số điện thoại </p>
                            <input class="form-control" type="text" disabled value="{{$order->phone}}">
                        </div>
                        <div class="mb-3">
                            <p class="dis fw-bold mb-2">Địa chỉ</p>
                            <input class="form-control" type="text" disabled value="{{$order->address}}">
                        </div>
                        <div class="mb-3">
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
                                <option value="4" >Hoàn thành</option>
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
                                    <p> @if ($order->payment_type==1)
                                        Online
                                        @elseif ($order->payment_type==2)
                                        Cod
                                        @elseif ($order->payment_type==3)
                                        ATM
                                        @else
                                        Chưa phân loại
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
                                <div class="btn btn-primary mt-2" ><button type="submit" style="background: none; border:none;color:aliceblue">Cập nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection