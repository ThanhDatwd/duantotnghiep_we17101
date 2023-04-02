<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Cảm ơn bạn đã mua hàng!</title>
  <style>
    /* Reset CSS */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    /* Body styles */
    body {
      font-family: Arial, sans-serif;
      font-size: 16px;
      line-height: 1.5;
      color: #333;
      background-color: #f9f9f9;
      padding: 20px;
    }

    /* Header styles */
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 20px;
    }

    .logo {
      max-width: 150px;
    }

    /* Thank you message styles */
    .thank-you {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
    }

    .thank-you h2 {
      margin-bottom: 10px;
    }

    /* Print button styles */
    .print-btn {
      margin-top: 20px;
    }

    /* Customer information styles */
    .customer-info {
      margin-bottom: 20px;
    }

    /* Order details styles */
    .order-details {
      margin-bottom: 20px;
    }

    .order-details img {
      max-width: 100px;
      margin-right: 10px;
    }
    
header{
    /* display: none; */
}
footer{
    /* display: none; */
}
.thankyou-page .logo{
    margin: auto;
    width: 140px;
    height: auto;
}
.thankyou-page .logo img{
    width: 100%;
    height: 100%;
    margin: 20px 0;
}

.thankyou-area{
    /* margin-bottom: 20px; */
    /* display: flex;
    align-items: center; */
}
.thankyou-area .icon{
    width: 80px;
    height: 80px;
    line-height: 80px;

    font-size: 50px;
    text-align: center;

    margin-right: 10px;
    border: 2px solid green;
    border-radius: 50%;
    color: green;
    background: transparent;
}

.thankyou-area .text h3{
    font-size: 16px;
    margin-bottom: 8px;
}
.thankyou-area .text p{
    font-size: 14px;
    line-height: 20px;
    margin: 0;
}


.confirm-orderList h4{
    padding: 10px 16px;
    border-bottom: 1px solid #ccc;
}
.confirm-info{
    padding: 10px;
    display: flex;
    flex-wrap: wrap;
    border: 1px solid #ccc;
}
.confirm-line{
    width: 50%;
    margin-bottom: 10px;
}
.confirm-line h3{
    font-size: 23px;
    font-weight: 500;
    color: rgb(38, 37, 37);
}
.confirm-line p{
    margin: 8px 0;
    font-size: 14px;
}
.black-area{
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    margin: 20px 0;
}
.bx-printer{
    font-size: 36px;
}
/*  css c reponsive cho phẩn  đặt hàng thành công */
@media only screen and (max-width: 960px){
    .thankyou-area{
        width: 100%;
        flex-wrap: wrap;
       text-align: center;
       justify-content: center;
       margin: 20px 0;
    }
    .thankyou-area .text{
        width: 100%;
    }
    
    .confirm-orderList{
        width: 100%;
    }
    .confirm-info{
        flex-wrap: wrap;
        width: 100%;
        margin: 0;
    }
    .confirm-line{
        width: 100%;
    }
}

  </style>
</head>

<body>
  <header>
    <div class="logo">
      <img src="path/to/logo.png" alt="Logo">
    </div>
    <h1>Cảm ơn bạn đã mua hàng!</h1>
  </header>

  <div class="customer-info">
    <div class="confirm-info">
      <div class="confirm-line">
          <h3>Thông tin mua hàng</h3>
          <p>Thông tin khách hàng</p>
          <p>Thông tin khách hàng</p>
      </div>
       <div class="confirm-line">
          <h3>Đia chỉ giao hàng</h3>
          <p>Thông tin khách hàng</p>
          <p>Thông tin khách hàng</p>
      </div>
       <div class="confirm-line">
          <h3>phương thức giao dịch</h3>
          <p class="email">Thanh toán khi nhận hàng</p>
      </div>
       <div class="confirm-line">
          <h3>Phương thức vận chuyển</h3>
          <p class="name">Giao Tận nơi</p>
      </div>
  </div>
  </div>

  <div class="order-details">
    <!-- Hiển thị danh sách sản phẩm ở đây -->
    <div class="confirm-orderList">
      <h4>Đơn hàng <span class="id-order">#</h4>
      <ul class="order-list">
        <div class="order-item">
                           <div class="order-item_img">
                               <img src="./admin/upload/'.$item['product_image'].'" alt="">
                               <span>1</span>
                           </div>
                           <div class="order-item_txt">
                               <div>
                                   <p class="name">'.$item['product_name'].'</p>
                                   <span class="weight">1kg</span>
                               </div>
                               <div class="price">'.formatMoney($item['unit_price']).'</div>
                           </div>
                       </div>
      </ul>
      <div class="orderSumary">
        <div class="orderSumary-line tmp-fee">
          <span class="text">Tạm tính</span>
          <span class="price">
             100.1000
          </span>
        </div>
        <div class="orderSumary-line ship-fee">
          <span class="text">phí ship</span>
          <span class="price">
             100.1000
          </span>
        </div>
        <div class="orderSumary-line total">
          <span class="text">Tổng cộng</span>
          <span class="price">
             100.1000
          </span>
        </div>
      </div>
    </div>

    <div class="thank-you">
      <h2>Cảm ơn bạn đã mua hàng!</h2>
      <p>Xin vui lòng giữ đơn hàng của bạn cho tới khi bạn nhận được sản phẩm của mình.</p>
      <p>
        <button class="print-btn" onclick="window.print()">In đơn hàng</button>
      </p>
    </div>
<<<<<<< HEAD
  </div>
@endsection
=======
</body>

</html>
>>>>>>> origin/develop
