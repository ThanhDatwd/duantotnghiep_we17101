<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\order_details;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class PaymentController extends Controller
{
  public function index()
  {
    $cartFarmApp = [];
    $carts = [];
    if (isset($_COOKIE["cartFarmApp"])) {
      $json = $_COOKIE["cartFarmApp"];
      $cartFarmApp = json_decode($json, true);

      $idList = [];
      $total=0;
      foreach ($cartFarmApp as $item) {
        $idList[] = $item['productId'];
      }
      if (count($idList) > 0) {
        $carts = product::whereIn('id', $idList)->get();
        for ($i = 0; $i < count($carts); $i++) {
          if ($cartFarmApp[$i]['productId'] == $carts[$i]->id)
            $carts[$i]->amount = $cartFarmApp[$i]['amount'];
            $total+=$carts[$i]->price_current-($carts[$i]->price_current*$carts[$i]->discount/100);
        }
      } else {
      }
    }
    $data = [
      'carts' => $carts,
      'total' => $total
    ];
    return view('client.payment.index', $data);
  }
  //  CHỨC NĂNG THANH TOÁN VỚI VNPAY
  public function create_payment_vnpay_e(Request $request)
  {
  
    if (
      $request->email != null
      && $request->user_name != null
      && $request->phone != null
      && $request->address != null
      && $request->province != null
      && $request->district != null
      && $request->ward != null
    ) {
      $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
      $vnp_Returnurl = route('clientreturn_payment_vnpay',["data"=>[
        "user_name"=>$request->user_name,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "address"=>$request->address,
        "province"=>$request->province,
        "district"=>$request->district,
        "ward"=>$request->ward,
        "order_note"=>$request->order_note,
        "total"=>$request->total,
        "fee_ship"=>$request->fee_ship,

      ]]);
      $vnp_TmnCode = "Q57HT4LD"; //Mã website tại VNPAY 
      $vnp_HashSecret = "ZNJZVKHJSPIOYDYRREQVECNZELACJGDZ"; //Chuỗi bí mật

      $vnp_TxnRef = rand(0000, 9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
      $vnp_OrderInfo = "Thanh toán vnpay";
      $vnp_OrderType = 'billpayment';
      $vnp_Amount = $request->total * 100;
      $vnp_Locale = "vn";
      $vnp_BankCode = "";
      $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
      //Add Params of 2.0.1 Version
      // $vnp_ExpireDate = $_POST['txtexpire'];
      //Billing
      //Add Params of 2.0.1 Version
      // $vnp_ExpireDate = $_POST['txtexpire'];
      //Billing
      $vnp_Bill_Mobile = $request->phone;
      $vnp_Bill_Email = $request->email;
      $fullName = trim($request->user_name);
      if (isset($fullName) && trim($fullName) != '') {
        $name = explode(' ', $fullName);
        $vnp_Bill_FirstName = array_shift($name);
        $vnp_Bill_LastName = array_pop($name);
      }
      $vnp_Bill_Address = $request->address;
      $vnp_Bill_City = $request->district;
      $vnp_Bill_Country = $request->province;
      $vnp_Bill_State = $request->ward;
      $vnp_Inv_Phone="00342042049204";

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
        "vnp_Bill_FirstName" => $vnp_Bill_FirstName,
        "vnp_Bill_Email" => $vnp_Bill_Email,
        "vnp_Bill_Address" => $vnp_Bill_Address,
        "vnp_Bill_City" => $vnp_Bill_City,
        "vnp_Bill_Country" => $vnp_Bill_Country,
        "vnp_Inv_Phone"=>$vnp_Inv_Phone,

        // "vnp_Bill_Ward" => $request->ward,
        // "vnp_Bill_note" => $request->note_order,
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
    } else {
      dd('Chưa nhập thông tin ');
    }
  }
  public function return_payment_vnpay_e(Request $request)
  {
      $data=$request->data;
      $cartFarmApp = [];
      if (isset($_COOKIE["cartFarmApp"])) {
        $json = $_COOKIE["cartFarmApp"];
        $cartFarmApp = json_decode($json, true);
      }
      $order = new order();
      $order->user_name = $data["user_name"];
      $order->email = $data["email"];
      $order->phone = $data["phone"];
      $order->address = $data["address"];
      $order->province = $data["province"];
      $order->district = $data["district"];
      $order->ward = $data["ward"];
      $order->customer_note = $data["order_note"];
      $order->payment_type = 'ATM';
      $order->status = 1;
      $order->total = $data["total"];
      $order->fee_ship = $data["fee_ship"];
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
      }
      return redirect()->route('clientpage-thanks',["data"=>$data]);
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
  public function create_payment_momo_atm(Request $request)
  {

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
  public function create_payment_cod(Request $request)
  {
    if (
      $request->email != null
      && $request->user_name != null
      && $request->phone != null
      && $request->address != null
      && $request->province != null
      && $request->district != null
      && $request->ward != null
    ) {
      $cartFarmApp = [];
      if (isset($_COOKIE["cartFarmApp"])) {
        $json = $_COOKIE["cartFarmApp"];
        $cartFarmApp = json_decode($json, true);
      }
      $order = new order();
      $order->user_name = $request->user_name;
      $order->email = $request->email;
      $order->phone = $request->phone;
      $order->address = $request->address;
      $order->province = $request->province;
      $order->district = $request->district;
      $order->ward = $request->ward;
      $order->customer_note = $request->note_order;
      $order->payment_type = 'ATM';
      $order->status = 1;
      $order->total = 10000;
      $order->fee_ship = 0;
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
      }
      setcookie('cartFarmApp', json_encode([]), time() - 3 * 24 * 60 * 60, '/');
      return redirect()->route('clientpage-thanks');
    } else {
      dd("Vui lòng nhập  thông tin");
    }
  }
}
