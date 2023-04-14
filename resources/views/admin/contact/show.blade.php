@extends('admin.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">

@endsection
@section('content')
<style>
    .show-mail-area .subtitle {
        font-size: 28px;
        font-weight: 400
    }

    .row-content {
        gap: 16px;
        padding: 10px 0;
    }

    .row-content .col-left {
        width: 40px;

    }

    .row-content .col-left img {
        width: 100%;
        border-radius: 50%
    }

    .row-content .col-right {
        width: calc(100% - 50px);
    }

    .col-right.info span,
    .col-right.info em {
        font-size: 12px;
        line-height: 4px
    }

    .col-right.reply {
        background: #fff;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px
    }
    #reply-area{
        display: none
    }
    #reply-area.active{
        display: block
    }
</style>
<div class="show-mail-area p-4">
    <div class="row-content d-flex">
        <div class="col-left">
        </div>
        <div class="col-right d-flex align-items-center justify-content-between">
            <h4 class="subtitle">{{$email->subject}}</h4>
            <div class="d-flex align-items-center gap-4">
                <i class="bi bi-printer"></i>
                <i class="bi bi-box-arrow-in-up-right"></i>
            </div>
        </div>
    </div>
    <div class="row-content d-flex align-items-center">
        <div class="col-left">
            <img src="https://lh3.googleusercontent.com/a/default-user=s40-p" alt="">
        </div>
        <div class="col-right info d-flex align-items-center justify-content-between">
            <div>
                <div>
                    <strong>{{$email->custommer_name}}</strong>
                    <em>{{$email->from}}</em>
                </div>
                <div>
                    <span>Đến tôi</span>
                </div>
            </div>
            <div class="action d-flex align-items-center gap-4">
                <span>{{date_format($email->created_at,"H:i:s d/m/Y") }} {{ceil(strtotime(date('Y-m-d'))-strtotime($email->created_at))/86400}} ngày trước</span>
                <i class="bi bi-star"></i>
                <i class="bi bi-reply"></i>
                <i class="bi bi-three-dots"></i>
            </div>
        </div>
    </div>
    <div class="row-content d-flex">
        <div class="col-left"></div>
        <div class="col-right">
            <p class="body">
               {{$email->content}}
            </p>
        </div>
    </div>
    <div class="row-content d-flex action">
        <div class="col-left"></div>
        <div class="col-right">
            <div class="btn btn-light btn-outline-secondary rounded-pill btn-reply "><i class="bi bi-reply"></i> Phản hồi</div>
            <div class="btn  btn-light btn-outline-secondary rounded-pill"> <i class="bi bi-trash"></i> Xóa</div>
        </div>
    </div>
    <div id="reply-area">
        <div class="row-content d-flex reply ">
            <div class="col-left">
                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/favicon.png?1667206835361" alt="">
            </div>
            <div class="col-right reply">
                <textarea id="editorReplyEmail" name="content_reply"></textarea>
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <div class="btn btn-primary rounded-pill btn-sendMail "> <i class="bi bi-reply"></i> Gửi</div>
                 
                    <div class="btn btn-light rounded-pill btn-cancel-mail"> <i class="bi bi-trash"></i> Hủy</div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        let rowRepply=$('.row-content.reply')
    $('.btn-reply').click(function (e) { 
        e.preventDefault();
        console.log('xin chòa')
        $("#reply-area").toggle(1000);        
    });
    $('.btn-cancel-mail').click(function (e) { 
        e.preventDefault();
        $("#reply-area").hide(1000);
        $('#editorReplyEmail').val("")  
        
    });
    var editorReplyEmail = CKEDITOR.replace( 'editorReplyEmail' );
    editorReplyEmail.on( 'change', function( evt ) {
    $('#editorReplyEmail').val(evt.editor.getData());
    });
    });
    
</script>
@endsection