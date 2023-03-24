@extends('client.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/client/aboutus.css')}}">

<!-- LINK CSS -->
@endsection
@section('main-content')
    <div class="aboutus container ">
        <nav aria-label="breadcrumb" @style("border-bottom:1px solid #eae8e8; ")>
            <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
              <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Về Chúng Tôi</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="jobs">
                <div class="col-main page-title">
                    <h1>Về Chúng Tôi</h1>
                    <div class="rte m-auto bg-white d-block">
                        <span><b>{{$vechungtoi}}</b> <i> là doanh nghiệp tư nhân chuyên về kinh doanh bán buôn thực phẩm (xuất – nhập khẩu các mặt hàng thực phẩm) được thành lập vào ngày 11/03/2022. Với mục tiêu cốt lõi là mang đến cho khách hàng và các đối tác trong và ngoài nước luôn tự hào về ẩm thực Việt, cùng trao giá trị cho nhau và cùng nhau Thịnh Vượng.</i></span>

                        <h2>SỰ CAM KẾT</h2>

                        <span><b>{{$vechungtoi}}</b><i> cam kết mang đến cho khách hàng và đối tác những sản phẩm đúng chất lượng, đủ số lượng và đáng tin cậy (3Đ) để khách hàng và các đối tác luôn tự hào về ẩm thực Việt, cùng trao giá trị cho nhau và cùng nhau Thịnh Vượng!</i></span>

                        <h2>TẦM NHÌN - SỨ MỆNH</h2>
                        <p><i>{{$tamnhin}}</i></p>
                        <p><i>{{$sumenh}}</i></p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection