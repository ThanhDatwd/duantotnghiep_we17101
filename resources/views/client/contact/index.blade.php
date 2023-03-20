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
                            <p class="mb-2"><b> Trụ Sở Chính:</b> Ladeco Building, 266 Doi Can Street, Ba Dinh District, Hanoi.</p>
                            <p class="mb-2"><b> Hotline:</b><a href="tel:0937.782.305">0937.782.305</a></p>
                            <p class="mb-2"><b> Email:</b><a href="mailto:haidinh147039@gmail.com">haidinh147039@gmail.com</a></p>
                            <div class="mt-3">
                                <form method="post" action="/postcontact" id="contact">
                                <div class="customer-name row">
                                    <div class="col-12 form-group">
                                    <input type="text" class="form-control" name="contact[Name]" placeholder="Tên *" required="">
                                    </div>
                                    <div class="col-12 form-group">
                                        <input type="email" class="form-control" name="contact[email]" placeholder="Địa chỉ email *" required="">
                                    </div>
                                    <div class="col-12 form-group">
                                        <textarea name="contact[Body]" placeholder="Nội dung *" class="form-control" rows="3">
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