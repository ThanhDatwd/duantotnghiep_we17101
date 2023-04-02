@extends('client.appLayoutEmpty.index')
<link rel="stylesheet" href="{{asset('css/client/payment.css')}}">
<link rel="stylesheet" href="{{asset('css/client/base.css')}}">
@section('main-content')
<!-- Button trigger modal -->
<button type="button" id="btn_verify_code_otp" class="btn btn-primary" data-bs-toggle="modal"
	data-bs-target="#exampleModal" hidden>
	Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
						<input type="number" id="code2" maxlength="1"
							onkeyup="inputCode(event,'code1','code2','code3',)">
					</div>
					<div class="orderCode">
						<input type="number" id="code3" maxlength="1"
							onkeyup="inputCode(event,'code2','code3','code4',)">
					</div>
					<div class="orderCode">
						<input type="number" id="code4" maxlength="1" onkeyup="inputCode(event,'code3','code4','',)">
					</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
				<button type="button" onclick="handleVerifyOtp()" class="btn btn-primary">Xác nhận</button>
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
			<div class="input-infomation row ">
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
					<div>
						<div class="form-group order">
							<input type="email" name="email" placeholder="email" id="user_email"
								value="{{old('email')}}" required>
						</div>
						<span class="text-danger">@error('email')
							{{$message}}
							@enderror</span>
					</div>
					<div>
						<div class="form-group order">
							<input type="text" name="username" placeholder="Họ tên" value="{{old('username')}}"
								required>
						</div>
						<span class="text-danger">@error('username')
							{{$message}}
							@enderror</span>
					</div>
					<div>
						<div class="form-group order">
							<input type="text" name="phone" placeholder="số điện thoại(tùy chọn)"
								value="{{old('phone')}}" required>
						</div>
						<span class="text-danger">@error('phone')
							{{$message}}
							@enderror</span>
					</div>
					<div>
						<div class="form-group order">
							<input type="text" name="address" placeholder="địa chỉ(tùy chọn)" value="{{old('address')}}"
								required>
						</div>
						<span class="text-danger">@error('address')
							{{$message}}
							@enderror</span>
					</div>
					<input type="text" id="input_province" name="province" value="{{old('province')}}" hidden>
					<input type="text" id="input_district" name="district" value="{{old('district')}}" hidden>

					<div>
						<div class="form-group order">
							<select id="province">
								<option value="">-- Chọn tỉnh/thành --</option>
							</select>
						</div>
						<span class="text-danger">@error('province')
							{{$message}}
							@enderror</span>
					</div>
					<div>
						<div class="form-group order">
							<select id="district">
								<option value="">-- Chọn quận/huyện --</option>
							</select>
						</div>
						<span class="text-danger">@error('district')
							{{$message}}
							@enderror</span>
					</div>
					<div>
						<div class="form-group order">
							<select id="ward" name="ward">
								<option value="">-- Chọn xã/phường --</option>
							</select>
						</div>
						<span class="text-danger">@error('ward')
							{{$message}}
							@enderror</span>
					</div>
					<div class="form-group order">
						<textarea name="order_note" {{old('order_note')}} placeholder="Ghi chú">Ghi chú</textarea>
					</div>
					<input type="number" name="total" value="{{$total}}" hidden>
					<input type="number" name="fee_ship" value="0" hidden>
					<input type="text" id="couponCode" value={{$couponCode}} name="couponCode" hidden>

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
							<span>0</span>
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
										<div class="col-4">
											<div class="payment_momo payment-online__item ">
												<div class="thumb">
													<img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png"
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

				</div>
				<div class="d-sm-none d-block">
					<div class="d-flex justify-content-center ">
						<button class="btn btn-buyNow p-10 " id="btn-order-now">Đặt mua</button>
					</div>
					<div class="d-flex justify-content-center mt-2">
						<a href="{{route('clientcart')}}">
							<i class='bx bx-chevron-left'></i>
							Quay về trang đặt hàng
						</a>
					</div>
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
							<img src="{{asset('upload/'.$item->thumb)}}" alt="">
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
					<form action="{{route('clientuse-coupon-code')}}" method="POST">
						@csrf
						<div class="form-group code">
							<input type="text" id="couponCode" value="{{$couponCode}}" name="couponCode" >
							<button  class="btn-applyCouponCode">Áp Dụng</button>
						</div>
					</form>
					<span class="text-danger" id="msg-applyCouponCode-error"></span>
					<span class="text-success" id="msg-applyCouponCode-success">{{$couponMsg}}</span>
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
					<button class="btn btn-buyNow d-none d-sm-block" id="btn-order-now">Đặt mua</button>
					{{-- <button hidden class="btn btn-showModalInputCode" data-toggle="modal"
						data-target="#exampleModalCenter">Đặt mua</button> --}}
				</div>
			</div>
		</div>
	</div>


</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
	const paymentOnlineArea=document.querySelector(".payment.online_area")
	const paymentCodArea=document.querySelector(".payment.cod_area")
	const paymentCodMessage=document.querySelector(".payment.cod_area .message")
	const paymentOnlineList=document.querySelector(".payment.online_area .payment-online")
	const btnOrderNow=document.querySelectorAll(".btn.btn-buyNow")
	const formOrder=document.getElementById('form-order')
	const btnPaymentVnpay=document.querySelector(".payment_vnpay")
	const btnPaymentMomo=document.querySelector(".payment_momo")
	const btnPaymentItems=document.querySelectorAll(".payment-online__item")
	const btn_verify_code_otp=document.querySelector("#btn_verify_code_otp")
	
	

    let getOtp=true
	paymentCodArea.onclick=()=>{
		formOrder.action="http://127.0.0.1:8000/payment_cod"
		paymentOnlineArea.classList.remove('active')
        paymentCodArea.classList.add('active')
		btnPaymentVnpay.classList.remove('active')
		btnPaymentMomo.classList.remove('active')
      $('.payment.cod_area.active .message').slideDown(500);

	}
    paymentOnlineArea.onclick=()=>{
		getOtp=false
		paymentOnlineArea.classList.add('active')
        paymentCodArea.classList.remove('active')
		$('.payment.cod_area .message').slideUp(500);

	}
	btnPaymentVnpay.onclick=()=>{
		getOtp=false
		formOrder.action="http://127.0.0.1:8000/payment_vnpay"
		btnPaymentItems.forEach(item => {
		item.classList.remove('active')
		});
		btnPaymentVnpay.classList.add('active')
	}
	btnPaymentMomo.onclick=()=>{
		getOtp=false
		formOrder.action="http://127.0.0.1:8000/search"
		btnPaymentItems.forEach(item => {
		item.classList.remove('active')
		});
		btnPaymentMomo.classList.add('active')
	}
	btnOrderNow.forEach(e=>{
		e.onclick=()=>{
			if(getOtp==true){
			sendNotificationGetOtp()
		
            
		}
		else{
			formOrder.submit()
		}
	}
    let email=document.getElementById('#email')
		}
	)
	const sendNotificationGetOtp=()=>{
		
		$("#form-order").validate({
			rules: {
			username : {
				required: true,
			},
			phone: {
				required: true,
			},
			email: {
				required: true,
				// email: true
			},
			address: {
				required: true,
			},
			province: {
				required: true,
			},
			ward: {
				required: true,
			},
			district: {
				required: true,
			},
			},
			messages : {
			username: {
				required: "Vui lòng nhập tên khi nhận hàng"
			},
			phone: {
				required: "Vui lòng nhập số điện thoại nhận hàng",
			},
			email: {
				required : "Vui lòng nhập email nhận hàng",
				// email: "Vui lòng nhập đúng định dạng abc@gmail.com"
			},
			address: {
				required: "Vui lòng nhập số điện thoại nhận hàng",
			},
			province: {
				required: "Vui lòng nhập số điện thoại nhận hàng",
			},
			district: {
				required: "Vui lòng nhập số điện thoại nhận hàng",
			},
			ward: {
				required: "Vui lòng nhập số điện thoại nhận hàng",
			},
			},
			submitHandler: function(form) {
				btn_verify_code_otp.click()
				let email=$('#user_email').val()
				console.log(email)
				$.ajax({
							type: 'post',
							url: 'http://127.0.0.1:8000/api/get_order_otp',
							data:{
								email
							},
							success:function(data){
								console.log(data)
								// alert('vui lòng nhập mã xác nhận')
							}
					});
					$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
				}
		});
		$("#form-order").submit()
		
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
	function handleVerifyOtp() {
        let code1 = document.getElementById('code1').value
        let code2 = document.getElementById('code2').value
        let code3 = document.getElementById('code3').value
        let code4 = document.getElementById('code4').value
        let otp = code1 + code2 + code3 + code4
		console.log(typeof otp)
		$.ajax({
            type: 'post',
            url: 'http://127.0.0.1:8000/api/confirm_order_otp',
			data:{
				otp
			},
            success:function(data){
				formOrder.action="http://127.0.0.1:8000/payment_cod"
				formOrder.submit()
                        // alert('vui lòng nhập mã xác nhận')
            },
			error: function(error) {
            alert("có lỗi xảy ra vui lòng nhập lại mã")
         
        }
        });
		$.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    }
//   PHẦN ÁP DỤNG MÃ CODE
$("#btn-applyCouponCode").click(()=>{
	$.post("http://127.0.0.1:8000/api/apply_coupon_code", 
	{
		code:$("#couponCode").val()
	},
		function (data) {
		    if(data.coupon!=null){
				$("#msg-applyCouponCode-success").text("Áp dụng mã khuyễn mãi thành công")
				$("#msg-applyCouponCode-error").text(null)
			}
			else{
				$("#msg-applyCouponCode-error").text("Mã khuyễn mãi không tồn tại hoặc hết hạn")
				$("#msg-applyCouponCode-success").text(null)

			}
		}
	);
})
    
	// //  Chọn quận huyện thành phố 
	// Lấy danh sách tỉnh/thành từ API
	let input_province=document.querySelector('#input_province')
	let input_district=document.querySelector('#input_district')
	let input_ward=document.querySelector('#input_ward')
	const getDataa=()=>{
       console.log("xin chào bạn")
	   
	}
	$.get("https://provinces.open-api.vn/api/p/", function(data) {
			var provinces = data;

			// Thêm các tỉnh/thành vào trường chọn
			for (var i = 0; i < provinces.length; i++) {
				$("#province").append(`<option value="${provinces[i].code}">${provinces[i].name}</option>`);
			}
		});

		// Khi người dùng chọn tỉnh/thành
		$("#province").change(function() {
			// Xóa các quận/huyện và xã/phường cũ
			$("#district").empty();
			$("#ward").empty();

			// Lấy tỉnh/thành được chọn từ trường chọn
			var selectedProvince = $("#province").val();
			input_province.value=$("#province option:selected").text()
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
			input_district.value=$("#district option:selected").text()


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