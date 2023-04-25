<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Jobs\send_email;
use App\Mail\SendVerifyCodeMail;
use App\Models\coupon;
use App\Models\order;
use App\Models\order_details;
use App\Models\order_temp;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use PhpParser\Node\Stmt\TryCatch;

class PaymentController extends Controller
{
  protected $couponEligibleForUse = false;
  public function index()
  {
    $cartFarmApp = [];
    $carts = [];
    $total = 0;
    $couponMsg = "";
    $couponCode = "";
    if (isset($_COOKIE["cartFarmApp"])) {
      $json = $_COOKIE["cartFarmApp"];
      $cartFarmApp = json_decode($json, true);

      $idList = [];
      foreach ($cartFarmApp as $item) {
        $idList[] = $item['productId'];
      }
      if (count($idList) > 0) {
        $carts = product::whereIn('id', $idList)->get();
        for ($i = 0; $i < count($carts); $i++) {
          if ($cartFarmApp[$i]['productId'] == $carts[$i]->id)
            $carts[$i]->amount = $cartFarmApp[$i]['amount'];
          $total += ($carts[$i]->price_current - ($carts[$i]->price_current * $carts[$i]->discount / 100)) * $cartFarmApp[$i]['amount'];
        }
      } else {
      }
    }
    if (isset($_COOKIE["couponCode"])) {
      $coupon = coupon::where('coupon_code', $_COOKIE["couponCode"])->first();
      $couponCode = $_COOKIE["couponCode"];
      if ($coupon != null) {
        if ($total >= $coupon->min_condition) {
          $this->couponEligibleForUse=true;
          $couponMsg = "Mã khuyến mãi đã được áp dụng";
          if ($coupon->coupon_type == 1) {
            $total = $total - $coupon->discount;
          } elseif ($coupon->coupon_type == 2) {
            $total = $total - (($total * $coupon->discount) / 100);
          } elseif ($coupon->coupon_type == 3) {
          }
        } else {
          $couponMsg = "Đơn hàng không đủ điều kiện đế sử dụng mã khuyễn mãi này";
        }
      } else {
        $couponMsg = "Mã khuyến mãi không còn tồn tại";
      }
    } else {
      $couponMsg = "Đơn hàng này chưa áp dụng mã khuyến mãi";
    }
    $data = [
      'carts' => $carts,
      'total' => $total,
      'couponMsg' => $couponMsg,
      'couponCode' => $couponCode
    ];
    return view('client.payment.index', $data);
  }
  //  CHỨC NĂNG THANH TOÁN VỚI VNPAY



  public function create_payment_vnpay_e(PaymentRequest $request)
  {
    $order_code = rand(0000, 9999);
    $order_temp = new order_temp();
    $order_temp->user_name = $request->username;
    $order_temp->email = $request->email;
    $order_temp->phone = $request->phone;
    $order_temp->address = $request->address;
    $order_temp->province = $request->province;
    $order_temp->district = $request->district;
    $order_temp->ward = $request->ward;
    $order_temp->customer_note = $request->order_note;
    $order_temp->payment_type = 'ATM';
    $order_temp->total = $request->total;
    $order_temp->fee_ship = $request->fee_ship;
    $order_temp->save();
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = route('clientreturn_payment_vnpay', [
      "data" => [
        "id" => $order_temp->id,
        "order_code" => $order_code
      ]
    ]);
    $vnp_TmnCode = "Q57HT4LD"; //Mã website tại VNPAY 
    $vnp_HashSecret = "ZNJZVKHJSPIOYDYRREQVECNZELACJGDZ"; //Chuỗi bí mật
    $vnp_TxnRef = $order_code; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
    $vnp_OrderInfo = "Thanh toán vnpay";
    $vnp_OrderType = 'billpayment';
    $vnp_Amount = $request->total * 100;
    $vnp_Locale = "vn";
    $vnp_BankCode = "";
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];



    $inputData = array(
      "vnp_Version" => "2.1.0",
      "vnp_TmnCode" => $vnp_TmnCode,
      "vnp_Amount" => $vnp_Amount,
      "vnp_Command" => "pay",
      "vnp_CreateDate" => date('YmdHis'),
      "vnp_CurrCode" => "VND",
      "vnp_IpAddr" => $vnp_IpAddr,
      "vnp_Locale" => $vnp_Locale,
      "vnp_OrderInfo" => $vnp_OrderInfo,
      "vnp_OrderType" => $vnp_OrderType,
      "vnp_ReturnUrl" => $vnp_Returnurl,
      "vnp_TxnRef" => $vnp_TxnRef,
    );

    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
      $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
      $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }

    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
      if ($i == 1) {
        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
      } else {
        $hashdata .= urlencode($key) . "=" . urlencode($value);
        $i = 1;
      }
      $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    // $data="user_name"."=".$request->user_name. '&'."email"."=".$request->email. '&'."phone"."=".$request->phone. '&'."address"."=".$request->address. '&'."province"."=".$request->province. '&'."district"."=".$request->district. '&'."ward"."=".$request->ward. '&'."order_note"."=".$request->order_note;
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
      $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
      $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array(
      'code' => '00', 'message' => 'success', 'data' => $vnp_Url
    );
    return redirect($vnp_Url);
  }
  public function return_payment_vnpay_e(Request $request)
  {

    try {
      $data = $request->data;
      $cartFarmApp = [];
      if (isset($_COOKIE["cartFarmApp"])) {
        $json = $_COOKIE["cartFarmApp"];
        $cartFarmApp = json_decode($json, true);
      }
      $order_temp = order_temp::where("id", $data['id'])->first();
      $order = new order();
      $order->user_name = $order_temp->user_name;
      $order->email = $order_temp->email;
      $order->phone = $order_temp->phone;
      $order->address = $order_temp->address;
      $order->province = $order_temp->province;
      $order->district = $order_temp->district;
      $order->ward = $order_temp->ward;
      $order->customer_note = $order_temp->customer_note;
      $order->payment_type = 'ATM';
      $order->status = 1;
      $order->total = $order_temp->total;
      $order->fee_ship = $order_temp->fee_ship;
      $order->code = $data['order_code'];
      $order->save();
      foreach ($cartFarmApp as $item) {
        // Fetch the product information from the database
        $product = Product::find($item['productId']);
        $order_detail = new order_details();
        $order_detail->order_id = $order->id;
        $order_detail->product_id = $item['productId'];
        $order_detail->product_name = $product->name;
        $order_detail->product_thumb = $product->thumb;
        $order_detail->price = $product->price_current - ($product->price_current * $product->discount / 100);
        $order_detail->quantity = $item['amount'];
        $order_detail->save();
        $product->quantity_output = $product->quantity_output + $item['amount'];
        $product->save();
      }
      $order_temp = order_temp::where("id", $data["id"])->delete();
      $coupon = coupon::where('coupon_code', $_COOKIE["couponCode"] ?? null)->first();
      if ($coupon != null) {
          $coupon->user_used = $coupon->user_used+1;
          $coupon->save();
      }
      setcookie('cartFarmApp', json_encode([]), time() + 3 * 24 * 60 * 60, '/');
      setcookie('couponCode', null, time() - 3 * 24 * 60 * 60, '/');

      return redirect()->route('clientpage-thanks',['code'=>$data['order_code']]);
    } catch (\Throwable $th) {
      throw $th;
    }
  }
  public function create_payment_momo_qr(Request $request)
  {
    header('Content-type: text/html; charset=utf-8');



    $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";


    $partnerCode = "MOMOBKUN20180529";
    $accessKey = "klm05TvNBzhg7h7j";
    $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
    $orderInfo = "Thanh toán qua MoMo";
    $amount = "10000";
    $orderId = time() . "";
    $returnUrl = "http://localhost:8000/paymomo/result.php";
    $notifyurl = "http://localhost:8000/paymomo/ipn_momo.php";
    // Lưu ý: link notifyUrl không phải là dạng localhost
    $extraData = "merchantName=MoMo Partner";

    $requestId = time() . "";
    $requestType = "captureMoMoWallet";
    // $extraData = ($_POST["extraData"] ? $_POST["extraData"] : "");
    //before sign HMAC SHA256 signature
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data = array(
      'partnerCode' => $partnerCode,
      'accessKey' => $accessKey,
      'requestId' => $requestId,
      'amount' => $amount,
      'orderId' => $orderId,
      'orderInfo' => $orderInfo,
      'returnUrl' => $returnUrl,
      'notifyUrl' => $notifyurl,
      'extraData' => $extraData,
      'requestType' => $requestType,
      'signature' => $signature
    );
    $result = $this->execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    //Just a example, please check more in there

    header('Location: ' . $jsonResult['payUrl']);
  }

  public function return_payment_momo_qr()
  {
    dd('xin chào');
  }
  public function execPostRequest($url, $data)
  {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt(
      $ch,
      CURLOPT_HTTPHEADER,
      array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data)
      )
    );
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    //execute post
    $result = curl_exec($ch);
    //close connection
    curl_close($ch);
    return $result;
  }
  public function create_payment_momo_atm(PaymentRequest $request)
  {
    //  dd('xin chào mn');
    $endpoint = "https://test-payment.momo.vn/gw_payment/transactionProcessor";
    $partnerCode = "MOMOBKUN20180529";
    $accessKey = "klm05TvNBzhg7h7j";
    $secretKey = "at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa";
    $orderInfo = "Thanh toán qua MoMo";
    $orderInfo = "Thanh toán qua MoMo";
    $amount = "10000";
    $orderId = time() . "";
    $returnUrl = route('clientreturn_payment_momo_atm');
    $notifyurl = route('clientpayment');
    // Lưu ý: link notifyUrl không phải là dạng localhost
    $bankCode = "SML";
    $requestId = time() . "";
    $requestType = "payWithMoMoATM";
    $extraData = "";
    //before sign HMAC SHA256 signature
    $rawHashArr =  array(
      'partnerCode' => $partnerCode,
      'accessKey' => $accessKey,
      'requestId' => $requestId,
      'amount' => $amount,
      'orderId' => $orderId,
      'orderInfo' => $orderInfo,
      'bankCode' => $bankCode,
      'returnUrl' => $returnUrl,
      'notifyUrl' => $notifyurl,
      'extraData' => $extraData,
      'requestType' => $requestType
    );
    // echo $serectkey;die;
    $rawHash = "partnerCode=" . $partnerCode . "&accessKey=" . $accessKey . "&requestId=" . $requestId . "&bankCode=" . $bankCode . "&amount=" . $amount . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&returnUrl=" . $returnUrl . "&notifyUrl=" . $notifyurl . "&extraData=" . $extraData . "&requestType=" . $requestType;
    $signature = hash_hmac("sha256", $rawHash, $secretKey);
    $data =  array(
      'partnerCode' => $partnerCode,
      'accessKey' => $accessKey,
      'requestId' => $requestId,
      'amount' => $amount,
      'orderId' => $orderId,
      'orderInfo' => $orderInfo,
      'returnUrl' => $returnUrl,
      'bankCode' => $bankCode,
      'notifyUrl' => $notifyurl,
      'extraData' => $extraData,
      'requestType' => $requestType,
      'signature' => $signature
    );
    $result = $this->execPostRequest($endpoint, json_encode($data));
    $jsonResult = json_decode($result, true);  // decode json

    error_log(print_r($jsonResult, true));
    return redirect($jsonResult['payUrl']);
  }
  public function return_payment_momo_atm(Request $request)
  {
    # code...
  }

  // ///////////////////////////////////////
  // ///////////////////////////////////////
  // ///////////////////////////////////////
  // ///////////////////////////////////////
  public function get_order_otp(Request $request)
  {
    // $email=$request->email??"nguyenthanhdatntd007@gmail.com";
    $otp = mt_rand(1000, 9999);
    $mail = new SendVerifyCodeMail($otp);
    Mail::to($request->email)->send($mail);
    setcookie('otp_order_gm', json_encode($otp), time() + 3 * 60, '/');

    return response()->json([
      "message" => "success",
      "otp" => $otp,
      "email" => $request->email
    ]);
  }
  public function confirm_order_otp(Request $request)
  {
    if ($request->otp != null) {
      if ($request->otp == $_COOKIE["otp_order_gm"]) {
        return response()->json(["message" => "success"], 200);
      } else {
        return response()->json(["message" => "Mã xác nhận không hợp lệ"], 403);
      }
    } else {
      return response()->json(["Không thể xác định mã xác nhận"], 405);
    }
  }
  public function create_payment_cod(Request $request)
  {

    if (
      $request->email != null
      && $request->username != null
      && $request->phone != null
      && $request->address != null
      && $request->province != null
      && $request->district != null
      && $request->ward != null
    ) {
      $cartFarmApp = [];
      $order_code=mt_rand(1000, 9999);
      if (isset($_COOKIE["cartFarmApp"])) {
        $json = $_COOKIE["cartFarmApp"];
        $cartFarmApp = json_decode($json, true);
      }
      $order = new order();
      $order->user_name = $request->username;
      $order->email = $request->email;
      $order->phone = $request->phone;
      $order->address = $request->address;
      $order->province = $request->province;
      $order->district = $request->district;
      $order->ward = $request->ward;
      $order->customer_note = $request->order_note;
      $order->payment_type = 'cod';
      $order->status = 1;
      $order->total = $request->total;
      $order->code = $order_code;
      $order->fee_ship = $request->fee_ship;
      $order->save();
      foreach ($cartFarmApp as $item) {
        // Fetch the product information from the database
        $product = product::where("id", $item['productId'])->first();
        $order_detail = new order_details();
        $order_detail->order_id = $order->id;
        $order_detail->product_id = $item['productId'];
        $order_detail->product_name = $product->name;
        $order_detail->product_thumb = $product->thumb;
        $order_detail->price = $product->price_current - ($product->price_current * $product->discount / 100);
        $order_detail->quantity = $item['amount'];
        $order_detail->save();
        $product->quantity_output = $product->quantity_output + $item['amount'];
        $product->save();
      }

      $coupon = coupon::where('coupon_code', $_COOKIE["couponCode"] ?? null)->first();
      if ($coupon != null) {
          $coupon->user_used = $coupon->user_used+1;
          $coupon->save();
      }
      setcookie('cartFarmApp', json_encode([]), time() - 3 * 24 * 60 * 60, '/');
      setcookie('couponCode', null, time() - 3 * 24 * 60 * 60, '/');
      return redirect()->route('clientpage-thanks',['code'=>$order_code]);
    } else {
      dd("Vui lòng nhập  thông tin");
    }
  }
  public function thanks($code)
  {
    $order = order::where('code', $code)->first();
    $data = [
      "order" => $order
    ];
    return view('client.thankyou.index', $data);
  }
}
