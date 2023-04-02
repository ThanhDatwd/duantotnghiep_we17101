@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/cart.css')}}">
@endsection
@section('main-content')
<div class="container ">
    <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
        <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
          <li class="breadcrumb-item"><a href="{{route('client')}}">Trang chủ</a></li>
          <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
        </ol>
      </nav>
@if (count($carts)>0)
   <div class="row">
       <div class="col-12 col-md-8 mt-2 mb-2">
        <div class="cart-items">
            @foreach ($carts as $item)
            <div class="cart-item">
                <img class="item-img" src="{{asset('upload/'.$item->thumb)}}" alt="">
                <div class="cart-info">
                    <div class="info">
                        <div class="item-name">{{$item->name}}</div>
                        <div class="item-price">
                            {{number_format($item->price_current-($item->price_current*$item->discount/100))}} vnđ</div>
                    </div>
                    <div class="info">
                        <div class="btn-quantity">
                            <form action="{{route('clientminus-to-cart')}}" method="POST">
                                @csrf
                               <input type="text" name="productId" value="{{$item->id}}" hidden>
                               <input type="number" name="amount" value="1" hidden>
                                <button class="minus">-</button>
                            </form>
                            <span class="count">{{$item->amount}}</span>
                            <form action="{{route('clientadd-to-cart')}}" method="POST">
                                @csrf
                               <input type="text" name="productId" value="{{$item->id}}" hidden>
                               <input type="number" name="amount" value="1" hidden>
                                <button class="plus">+</button>
                            </form>
                        </div>
                        <form action="{{route('clientremove-to-cart')}}" method="POST">
                            @csrf
                            <input type="text" name="productId" value="{{$item->id}}" hidden>
                            <button class="btn btn-delete">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
       </div>
       <div class="col-12 col-md-4 mt-2 mb-2">
        <div class="checkout">
            <div class="btn checkout-info">
                <div class="total-text">Tổng</div>
                <div class="total-value">{{number_format($total)}} vnđ</div>
            </div>
            <a href="{{route('clientpayment')}}" class="btn btn-ok">Thanh toán</a>
            <form action="{{route('clientremove-all-cart')}}" method="POST">
                @csrf
                <button style="width:100%" class="btn btn-delete-all">Xóa tất cả</button>
            </form>
        </div>
        <div class="alert-success text-center mt-2">{{$couponMsg}}</div>
       </div>
   </div>
    @else
    <div class="alert alert-warning  my-3">Không có sản phẩm nào. Quay lại <b> <a href="{{route('clientcategory-group-all')}}"> cửa hàng </a> </b> để tiếp tục mua sắm.</div>
    @endif
</div>

<div class="container">
    @if (count(json_decode($coupons))>0)
<x-AppCouponCard :list="$coupons" />
@endif
</div>
@endsection

@section("js")
<script>
    let minusBtn = document.querySelector(".minus");
        let count = document.querySelector(".count");
        let plusBtn = document.querySelector(".plus");

        let countNum = 1;
        count.value = countNum;

        minusBtn.addEventListener("click", () => {
            countNum -= 1;
            count.value = countNum;
        });

        plusBtn.addEventListener("click", () => {
            countNum += 1;
            count.value = countNum;
        });
</script>
@endsection