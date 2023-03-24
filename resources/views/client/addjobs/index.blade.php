
@extends('client.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/client/contact.css')}}">

<!-- LINK CSS -->
@endsection
@section('main-content')
    <div class="addjobs container ">
        <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
            <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
              <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tuyển dụng</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="jobs">
                <div class="col-main page-title">
                    <h1>Tuyển Dụng</h1>
                    <div class="rte m-auto bg-white d-block">

                        <p>{{$ql}}
                        </p>
                        <p>{{$dathang}}
                        </p>
                        <p>
                            {{$nhaphang}}
                        </p>
                        <p>
                            {{$nhanhang}}
                        </p>
                        <p>
                            {{$tuvan}}
                        </p>
                        <p>
                            {{$kiemtra}}
                        </p>
                        <p>
                            {{$mucdich}}
                        </p>
                        <p>
                            {{$baocao}}
                        </p>
                        <p>
                            <b> Thời gian hợp đồng:</b> {{$job}}
                        </p>
                        <p>
                            <b> Thời hạn xin việc:</b> {{$time}}
                        </p>
                        <p>
                            <b>
                                Ngày Bắt đầu Dự kiến:</b>  {{$time}}
                        </p>
                        <p>
                            <b>
                                Loại hình công việc:</b> {{$loaihinh}}
                        </p>
                        <p>
                            <b> Lương:</b>{{$luong}}
                        </p>
                        <p><b> Các cân nhắc do COVID-19:</b>
                            Đeo khẩu trang khi gặp!
                        </p>
                        <p>
                            <b>
                            Kinh nghiệm làm việc:</b>
                            Thu ngân cho Siêu thị: {{$uutien}}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection