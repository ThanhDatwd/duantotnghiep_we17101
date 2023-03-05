@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/cart.css')}}">
@endsection
@section('main-content')
    <div class="container cart-container">
        <div class="cart-items">
            @foreach ($carts as  $item)
            <div class="cart-item">
                <img class="item-img" src="{{$item->thumb}}" alt="" >
                <div class="cart-info">
                    <div class="info">
                        <div class="item-name">{{$item->name}}</div>
                        <div class="item-price">{{$item->price_current}}</div>
                    </div>
                    <div class="info">
                        <div class="btn-quantity">
                            <button class="minus">-</button>
                            <input type="number"  value="{{$item->amount}}" class="count" readonly>
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
                <div class="total-value">69.000 ₫</div>
            </div>
            <a href="{{route('clientpayment')}}" class="btn btn-ok">Thanh toán</a>
            <button class="btn btn-delete-all">Xóa tất cả</button>
        </div>
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
