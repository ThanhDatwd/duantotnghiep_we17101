@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/cart.css')}}">
@endsection
@section('main-content')
    <div class="container cart-container">
        <div class="cart-items">
            <div class="cart-item">
                <img class="item-img" src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" >
                <div class="cart-info">
                    <div class="info">
                        <div class="item-name">Nho không hạt</div>
                        <div class="item-price">250.000 ₫</div>
                    </div>
                    <div class="info">
                        <div class="btn-quantity">
                            <button class="minus">-</button>
                            <input type="number"  value="1" class="count" readonly>
                            <button class="plus">+</button>
                        </div>
                        
                        <button class="btn btn-delete">Xóa</button>
                    </div>
                </div>
            </div>
            <div class="cart-item">
                <img class="item-img" src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" >
                <div class="cart-info">
                    <div class="info">
                        <div class="item-name">Nho không hạt</div>
                        <div class="item-price">250.000 ₫</div>
                    </div>
                    <div class="info">
                        <div class="btn-quantity">
                            <button class="minus">-</button>
                            <input type="number"  value="1" class="count" readonly>
                            <button class="plus">+</button>
                        </div>
                        
                        <button class="btn btn-delete">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="checkout">
            <div class="btn checkout-info">
                <div class="total-text">Tổng</div>
                <div class="total-value">69.000 ₫</div>
            </div>
            <button class="btn btn-ok">Thanh toán</button>
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
