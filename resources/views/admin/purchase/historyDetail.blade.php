@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/detailorder.css')}}">
@endsection
@section('content')

<div class="container row m-0 " style="max-width:100%">
    
    <div class=" user col-7 pt-4">
        <div class="d-flex align-items-center mb-4">
            <div class="fw-bold" style="font-size: 20px">Sản phẩm nhập hàng</div>
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
                        @foreach ($purchase_history_details as $od)
                        <div class="sanpham">
                            <div class="box box1">
                                <img  src="{{asset('upload/'.$od->thumb)}}"
                                    onerror="this.src='{{asset('upload/error.jpg')}}'" class="orderDetaiProductImg" alt="">
                            </div>
                            <div class="box box2 ">
                                <div class="boxcon boxname">
                                    <h4>{{$od->name}}</h4>
                                </div>
                                <div class="boxcon boxx">
                                    <div class="right">Số lượng: {{$od->quantity}}</div>
                                    <div class="left">Giá nhập: {{number_format($od->cost)}} Vnđ</div>
                                </div>

                            </div>

                        </div>
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
                <div class="fw-bold" style="font-size: 20px">Thông tin đơn đặt hàng</div>
            </div>
            <form action="/admin/order/detail/{{$purchase_history->id}}" enctype="multipart/form-data" method="post">
                <div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">Nhân viên nhập hàng</p>
                        @if ($purchase_history->created_by==null)
                           <input class="form-control" type="text" disabled value="Admin">
                        @else
                           <input class="form-control" type="text" disabled value="{{$purchase_history->created_by}}">
                            
                        @endif
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Mã đơn hàng</p>
                        <input class="form-control" type="text" disabled value="{{$purchase_history->purchase_code}}">
                    </div>
                    <div class="my-3">
                        <p class="dis fw-bold mb-2">Đối tác nhập hàng</p>
                        @if ($purchase_history->brand==null)
                           <input class="form-control" type="text" disabled value="(Không nhập mục này)">
                        @else
                           <input class="form-control" type="text" disabled value="{{$purchase_history->brand}}">
                        @endif
                    </div>
                    <div class="mb-2">
                        <p class="dis fw-bold mb-2">Trạng thái</p>
                        <select name="status" class="form-select">
                            @if ($purchase_history->purchase_status == 1)
                            <option value="1" selected>Hoàn thành </option>
                            @elseif ($purchase_history->purchase_status == 0)
                            <option value="2" selected>Xác nhận</option>
                            <option value="1">Hoàn thành</option>
                            @endif

                        </select>
                    </div>
                    <br>
                    <div class="d-flex flex-column dis">
                        {{-- <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Số lượng</p>
                            <p>{{$order_detail->quantity}}</p>
                        </div> --}}
                        {{-- <div class="d-flex align-items-center justify-content-between mb-2">
                            <p>Hình thức thanh toán</p>
                            <p> @if ($order->payment_type=="ATM")
                                Online
                                @elseif ($order->payment_type=="COD")
                                COD
                                @else
                                COD
                                @endif</p>
                        </div> --}}
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <p class="fw-bold">Tổng</p>
                            <p class="fw-bold">{{number_format($purchase_history->total_cost)}} VNĐ</p>
                        </div>

                        @if ($purchase_history->purchase_status == 0)
                        <div class="btn btn-primary mt-2"><button type="submit"
                            style="background: none; border:none;color:aliceblue">Cập nhật</button>
                         </div>
                        @endif
                        
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
    
</div>
</div>
@endsection