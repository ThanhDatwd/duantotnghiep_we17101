@extends('client.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/client/contact.css')}}">

<!-- LINK CSS -->
@endsection
@section('main-content')

    <div class="content container ">
        <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
            <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
              <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Liên hệ</li>
            </ol>
          </nav>
        <div class="com-info">
            <div class="mt-2">

                <div class="col-main page-title">
                    <h1>Liên Hệ</h1>
                </div>  
                
                <div class="m-auto bg-white d-block">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <p class="mb-2"><b> Địa chỉ cửa hàng:</b> {{$company_info->address}}</p>
                            <p class="mb-2"><b> Hotline:</b><a href="tel:{{$company_info->hotline}}"> {{$company_info->hotline}}</a></p>
                            <p class="mb-2"><b> Email:</b><a href="mailto:haidinh147039@gmail.com"> {{$company_info->email}}</a></p>
                            <div class="mt-3">
                                <form method="post" action="{{route('clientcontact')}}" id="contact">
                                    @csrf
                                <div class="customer-name row">
                                    <div class="auth-form__group">
                                        @if (Session::has('success'))
                                        <div class="alert alert-success">{{Session::get('success')}}</div>
                                        @endif
                                        @if (Session::has('fail'))
                                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                                        @endif
                    
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Tên *" required>
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <input type="text" class="form-control" name="subject" value="{{old('subject')}}" placeholder="Tiêu đề *" required>
                                        </div>
                                    <div class="col-12 form-group mb-3">
                                        <input type="email" class="form-control" name="from" value="{{old('from')}}" placeholder="Địa chỉ email *" required>
                                    </div>
                                    <div class="col-12 form-group mb-3">
                                        <textarea name="content" value="{{old('content')}}" placeholder="Nội dung *" class="form-control" rows="3">
                                        </textarea>
                                    </div>
                                    <span class="require d-block mb-3">
                                        <em class="required">* Thông tin bắt buộc</em>
                                        
                                    </span>
                                    <div class="buttons-set">
                                    <button type="submit" title="Submit" class="sitdown modal-open position-relative book-submit btn btn-primary text-center d-flex align-items-center font-weight-bold subml">Gửi liên hệ</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                            
                        </div>
                        <div class="col-md-6 col-12">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8780847756075!2d105.8118063154837!3d21.037563592852386!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab1306e135ff%3A0x206f91b00da7b3ce!2zMjY2IMSQ4buZaSBD4bqlbiwgQ-G7kW5nIFbhu4ssIEJhIMSQw6xuaCwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2sus!4v1562602124854!5m2!1svi!2sus" width="650" height="320" allowfullscreen=""></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



@endsection
@section('js')
 <!-- Link java S -->
@endsection