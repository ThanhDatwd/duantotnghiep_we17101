@extends('client.appLayoutEmpty.index')
<link rel="stylesheet" href="{{asset('css/client/payment.css')}}">
<link rel="stylesheet" href="{{asset('css/client/base.css')}}">
@section('main-content')
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="exampleModalLabel">Nhập mã OTP xác nhận</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="modal-body orderCode_area">
					<div class="orderCode">
						<input type="number" id="code1" maxlength="1" onkeyup="inputCode(event,'','code1','code2',)">
					</div>
					<div class="orderCode">
						<input type="number" id="code2" maxlength="1" onkeyup="inputCode(event,'code1','code2','code3',)">
					</div>
					<div class="orderCode">
						<input type="number" id="code3" maxlength="1" onkeyup="inputCode(event,'code2','code3','code4',)">
					</div>
					<div class="orderCode">
						<input type="number" id="code4" maxlength="1" onkeyup="inputCode(event,'code3','code4','',)">
					</div>
	
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
				<button type="button" class="btn btn-primary">Xác nhận</button>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<!-- =================================== -->



<div class="container">
	<div class="row" style="flex-wrap:wrap-reverse">
		<div class="col-lg-8 col-xs-12">
			<div class="col-12 pb-4 pt-4">
				<img style="width:180px"
					src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/logo.png?1676652183181" alt="">
			</div>
			<div class="input-infomation row">
				<form id="form-order" action="{{route('clientpayment_cod')}}" method="POST"
					class="form-order col-lg-6 col-xs-12">
					@csrf
					<div class="order-title">
						<h3>Thông tin nhận hàng</h3>
						<a href="">
							<i class='bx bx-user-circle'></i>
							<span>đăng nhập</span>
						</a>
					</div>
					<div class="error-txt "></div>
					<div class="form-group order">
						<input type="email" name="email" placeholder="email" value="{{old('email')}}">
					</div>
					<div class="form-group order">
						<input type="text" name="user_name" placeholder="Họ tên" value="{{old('user_name')}}">
					</div>
					<div class="form-group order">
						<input type="text" name="phone" placeholder="số điện thoại(tùy chọn)" value="{{old('phone')}}">
					</div>
					<div class="form-group order">
						<input type="text" name="address" placeholder="địa chỉ(tùy chọn)" value="{{old('email')}}">
					</div>
					<div class="form-group order">
						<select id="province" name="province">
							<option value="">-- Chọn tỉnh/thành --</option>

						</select>
					</div>
					<div class="form-group order">
						<select id="district" name="district">
							<option value="">-- Chọn quận/huyện --</option>
						</select>
					</div>
					<div class="form-group order">
						<select id="ward" name="ward">
							<option value="">-- Chọn xã/phường --</option>
						</select>
					</div>
					<div class="form-group order">
						<textarea name="note_order" {{old('note_order')}} placeholder="Ghi chú">Ghi chú</textarea>
					</div>
					<input type="number" name="total"  value="{{$total}}">
					<input type="number" name="fee_ship"  value="0">
				</form>
				<div class="transition col-lg-6 col-xs-12">
					<div class="order-title">
						<h3>Vận Chuyển</h3>
					</div>
					<div class="form-group order">
						<div class="fee-ship">
							<span>
								<i class='bx bxs-truck'></i>
								Fee ship
							</span>
							<span>40000</span>
						</div>
					</div>
					<div class="order-title">
						<h3>Thanh Toán</h3>
					</div>
					<div class="form-group order">
						<div class="payment cod_area active">
							<div class="fee-ship ">
								<div class="d-flex align-items-center gap-2 ">
									<i class='bx bxs-circle'></i>
									<span>Thanh toán khi nhận hàng</span>
								</div>
								<i class='bx bx-money-withdraw'></i>
							</div>
							<div class="message">
								bạn chỉ phải thanh toán khi nhân được hàng
							</div>
						</div>
					</div>
					<div class="form-group order ">
						<div class="payment online_area">
							<div class="fee-ship">
								<div class="d-flex align-items-center gap-2 ">
									<i class='bx bxs-circle'></i>
									<span>Thanh toán online</span>
								</div>
								<i class='bx bx-credit-card-front'></i>
							</div>
							<div class="payment-online">
								<div class="payment-online__list">
									<div class="row">
										<div class="col-4">
											<div id="payment_vnpay" class="payment_vnpay payment-online__item ">
												<div class="thumb">
													<img src="https://itviec.com/rails/active_storage/representations/proxy/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaHBBd2w2SHc9PSIsImV4cCI6bnVsbCwicHVyIjoiYmxvYl9pZCJ9fQ==--3c10eafdffd111f6ec8ef44d76353152683cf2b2/eyJfcmFpbHMiOnsibWVzc2FnZSI6IkJBaDdCem9MWm05eWJXRjBTU0lJY0c1bkJqb0dSVlE2RkhKbGMybDZaVjkwYjE5c2FXMXBkRnNIYVFJc0FXa0NMQUU9IiwiZXhwIjpudWxsLCJwdXIiOiJ2YXJpYXRpb24ifX0=--492f60b9aac6e8159e50e72bb289c5feb47a79d4/logo%20VNPAY-02.png"
														alt="">
												</div>
												<div class="check"><i class='bx bxs-check-circle'></i></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					{{-- <button id="payment_vnpay">thanh toán vnpay</button> --}}
					{{-- <form action="{{route('clientpayment_vnpay')}}" method="POST">
						@csrf
					</form>
					<form action="{{route('clientpayment_momo_qr')}}" method="POST">
						@csrf
						<button type="submit">thanh toán momo QR code</button>
					</form>
					<form action="{{route('clientpayment_momo_atm')}}" method="POST">
						@csrf
						<button type="submit" name="payUrl">thanh toán momo ATM</button>
					</form> --}}

				</div>

			</div>
		</div>
		<div class="col-lg-4 col-xs-12">
			<div class="info-product order">
				<div class="order-title">
					<h3>Thông tin nhận hàng (<span> sản phẩm</span>) </h3>
					<span class="btnDL">
						<i class='bx bx-chevron-down'></i>
					</span>
				</div>
				<ul class="order-list">
					@foreach ($carts as $item )
					@php
					
					@endphp
					<div class="order-item">
						<div class="order-item_img">
							<img src="{{$item->thumb}}" alt="">
							<span>{{$item->amount}}</span>
						</div>
						<div class="order-item_txt">
							<div>
								<p class="name">{{$item->name}}</p>
								<span class="weight">1kg</span>
							</div>
							<div class="price">
								{{number_format($item->price_current-($item->price_current*$item->discount/100))}}</div>
						</div>
					</div>
					@endforeach

				</ul>
				{{-- --}}
				<div class="discountCode">
					<div class="form-group order">
						<input type="text" name="" id="">
						<button class="btn btn-buyNow">Áp Dụng</button>
					</div>
				</div>

				<!-- Phần hiển thị tông tiền -->
				<div class="orderSumary">
					<div class="orderSumary-line tmp-fee">
						<span class="text">Tạm tính</span>
						<span class="price"></span>
					</div>
					<!-- <div class="orderSumary-line ship-fee">
                            <span class="text">phí ship</span>
                            <span class="price">400000</span>
                        </div> -->
					<div class="orderSumary-line total">
						<span class="text">Tổng cộng</span>
						<span class="price" id="order__total">{{number_format($total)}}</span>
					</div>
				</div>
				<div class="form-orderNow">
					<a href="{{route('clientcart')}}">
						<i class='bx bx-chevron-left'></i>
						Quay về trang đặt hàng
					</a>
					<button class="btn btn-buyNow" id="btn-order-now">Đặt mua</button>
					{{-- <button hidden class="btn btn-showModalInputCode" data-toggle="modal"
						data-target="#exampleModalCenter">Đặt mua</button> --}}
				</div>
			</div>
		</div>
	</div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	const paymentOnlineArea=document.querySelector(".payment.online_area")
	const paymentCodArea=document.querySelector(".payment.cod_area")
	const paymentCodMessage=document.querySelector(".payment.cod_area .message")
	const paymentOnlineList=document.querySelector(".payment.online_area .payment-online")
	const btnOrderNow=document.getElementById("btn-order-now")
	const formOrder=document.getElementById('form-order')
	const btnPaymentVnpay=document.querySelector(".payment_vnpay")
	const btnPaymentItems=document.querySelectorAll(".payment-online__item")

	paymentCodArea.onclick=()=>{
		formOrder.action="http://127.0.0.1:8000/payment_cod"
		paymentOnlineArea.classList.remove('active')
        paymentCodArea.classList.add('active')
	}
    paymentOnlineArea.onclick=()=>{
		paymentOnlineArea.classList.add('active')
        paymentCodArea.classList.remove('active')
	}
	btnPaymentVnpay.onclick=()=>{
		formOrder.action="http://127.0.0.1:8000/payment_vnpay"
		btnPaymentItems.forEach(item => {
		item.classList.remove('active')
		});
		btnPaymentVnpay.classList.add('active')
	}
	btnOrderNow.onclick=()=>{
		formOrder.submit()
	}
  

	// PHẦN NHẬP CODE
	function inputCode(event, p, c, n) {
        let length = document.getElementById(c).value.length;
        let maxLength = document.getElementById(c).getAttribute('maxlength')
        if (length == maxLength) {
            n != "" ? document.getElementById(n).focus() : ""
        }
        if (length == 0) {
            p != "" ? document.getElementById(p).focus() : ""
        }

    }
  

	// //  Chọn quận huyện thành phố 
	// Lấy danh sách tỉnh/thành từ API
	$.get("https://provinces.open-api.vn/api/p/", function(data) {
			var provinces = data;

			// Thêm các tỉnh/thành vào trường chọn
			for (var i = 0; i < provinces.length; i++) {
				$("#province").append("<option value='" + provinces[i].code + "'>" + provinces[i].name + "</option>");
			}
		});

		// Khi người dùng chọn tỉnh/thành
		$("#province").change(function() {
			// Xóa các quận/huyện và xã/phường cũ
			$("#district").empty();
			$("#ward").empty();

			// Lấy tỉnh/thành được chọn từ trường chọn
			var selectedProvince = $("#province").val();
			if (selectedProvince) {
				// Lấy thông tin địa lý của các quận/huyện từ API
				$.get("https://provinces.open-api.vn/api/p/" + selectedProvince + "?depth=2", function(data) {
					var districts = data.districts;

					// Thêm các quận/huyện vào trường chọn
					for (var i = 0; i < districts.length; i++) {
						$("#district").append("<option value='" + districts[i].code + "'>" + districts[i].name + "</option>");
					}
				});
			}
		});

		// Khi người dùng chọn quận/huyện
		$("#district").change(function() {
			// Xóa các xã/phường cũ
			$("#ward").empty();

			// Lấy quận/huyện được chọn từ trường chọn
			var selectedDistrict = $("#district").val();
			if (selectedDistrict) {
				// Lấy thông tin địa lý của các xã/phường từ API
				$.get("https://provinces.open			-api.vn/api/d/" + selectedDistrict + "?depth=2", function(data) {
				var wards = data.wards;

				// Thêm các xã/phường vào trường chọn
				for (var i = 0; i < wards.length; i++) {
					$("#ward").append("<option value='" + wards[i].name + "'>" + wards[i].name + "</option>");
				}
			});
		}
	});
</script>
@endsection