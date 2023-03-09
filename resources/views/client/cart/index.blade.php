@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/cart.css')}}">
@endsection
@section('main-content')
<div class="container cart-container mt-5">
    <div class="cart-items">
        @foreach ($carts as $item)
        <div class="cart-item">
            <img class="item-img" src="{{$item->thumb}}" alt="">
            <div class="cart-info">
                <div class="info">
                    <div class="item-name">{{$item->name}}</div>
                    <div class="item-price">
                        {{number_format($item->price_current-($item->price_current*$item->discount/100))}}</div>
                </div>
                <div class="info">
                    <div class="btn-quantity">
                        <button class="minus">-</button>
                        <input type="text" value={{$item->amount}} class="count" readonly>
                        <button class="plus">+</button>
                    </div>
                    <button class="btn btn-delete">Xóa</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="checkout">
        <div class="btn checkout-info">
            <div class="total-text">Tổng</div>
            <div class="total-value">{{number_format($total)}} ₫</div>
        </div>
        <a href="{{route('clientpayment')}}" class="btn btn-ok">Thanh toán</a>
        <form action="{{route('clientremove-all-cart')}}" method="POST">
            @csrf
            <button style="width:100%" class="btn btn-delete-all">Xóa tất cả</button>
        </form>
    </div>
</div>
<div class="container">
    @if (strlen($coupons)>1)
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