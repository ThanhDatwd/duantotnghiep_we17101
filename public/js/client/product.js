$(document).ready(function(){
    $('.image-slider').slick({
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa-solid fa-chevron-left'></i></button>",
        nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa-solid fa-chevron-right'></i></button>"   
    });
  
  });
  const paymentOnlineArea=document.querySelector(".payment.online_area")
	const paymentCodArea=document.querySelector(".payment.cod_area")
	const paymentCodMessage=document.querySelector(".payment.cod_area .message")
	const paymentOnlineList=document.querySelector(".payment.online_area .payment-online")

	paymentCodArea.onclick=()=>{
		paymentOnlineArea.classList.remove('active')
        paymentCodArea.classList.add('active')
	}
    paymentOnlineArea.onclick=()=>{
		paymentOnlineArea.classList.add('active')
        paymentCodArea.classList.remove('active')
	}
	const formOrder=document.getElementById('form-order')
	const btnPaymentVnpay=document.querySelector(".payment_vnpay")
	const btnPaymentItems=document.querySelector(".payment-online__item")
	btnPaymentVnpay.onclick=()=>{
		formOrder.action="http://127.0.0.1:8000/payment_vnpay"
		btnPaymentVnpay.classList.add('active')
    btnPaymentItems.forEach(element => {
       console.log(element)
    });
	}

//   --------------product2-----------
