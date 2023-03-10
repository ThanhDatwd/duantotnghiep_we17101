@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/detailorder.css')}}">
@endsection
@section('content')

<div class="container d-lg-flex">
        <div class="box-1 bg-light user">
            <div class="d-flex align-items-center mb-3">
                {{-- <img src="{{asset('upload/'.$order_detail->thumb)}}" onerror="this.src='{{asset('upload/error.jpg')}}'"
                    class="pic rounded-circle" alt=""> --}}
                    <p class="fw-bold" style="font-size: 35px">Chi tiết đơn đặt hàng</p>
            </div>
            <div class="box-inner-1 pb-3 mb-3 ">
                <div class="d-flex justify-content-between mb-3 userdetails">
                    <p class="fw-bold">Tên sản phẩm: {{$order_detail->product_name}}</p>
                    <p class="fw-lighter">{{number_format($order_detail->price)}} VNĐ</p>
                </div>
                <div id="my" class="carousel slide carousel-fade img-details" data-bs-ride="carousel"
                    data-bs-interval="2000">
                    <div class="carousel-inner" style="height: 0%">
                        <div class="carousel-item active">
                            <img src="{{asset('upload/'.$order_detail->product_thumb)}}" onerror="this.src='{{asset('upload/error.jpg')}}'"
                                class="d-block w-100" >
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
                                <span>{{$order_detail->order->customer_note}}</span>
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
                                <span>{{$order_detail->order->shop_note}}</span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
        <div class="box-2">
            <div class="box-inner-2">
                <div>
                    <p class="fw-bold" style="font-size: 25px">Thông tin người đặt hàng</p>
                </div>
                <form action="">
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
                        
                        
                    <br>
                            <div class="d-flex flex-column dis">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Số lượng</p>
                                    <p>{{$order_detail->quantity}}</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Giảm giá</p>
                                    <p>{{$order_detail->discount}}</p>
                                </div>

                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>Phí giao hàng<span></span></p>
                                    <p>{{number_format($order->fee_ship)}} VNĐ</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="fw-bold">Tổng</p>
                                    <p class="fw-bold">{{number_format($order->total)}} VNĐ</p>
                                </div>
                                <div class="btn btn-primary mt-2"> Hủy
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection