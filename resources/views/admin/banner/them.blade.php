@extends('admin.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/admin/product/product.css')}}">
@endsection
@section('content')
<?php
use Illuminate\Support\Facades\DB;
?>
<form action="/admin/banner/them" method="post" class="col-12 m-auto" enctype="multipart/form-data">
<div class="adproduct">
<div class="head" style="text-align: left;">
    <h2>THÊM BANNER</h2>
</div>
<div class= "container-fluid" style="Width: 100%;">
    <div class= "row">
        <div class ="col-md-12">
            <script src="https://www.dukelearntoprogram.com/course1/common/js/image/SimpleImage.js"></script>

            <div class="addpro">
                <div class="adpro1">
                    <div class="d-flex align-items-center justify-content-between mb-2 ">
                        <strong>Banner<span>(*)</span></strong>
                        <button class="btn btn-sm btn-light " id="btn-replaceImage">Thay thế</button>
                    </div>
                    <div id="cvas1" class="poster">
                        <div id="iconUpload">
                            <i class="bi bi-upload"></i>
                        </div>
                        <canvas id="imagePreviewUpload"></canvas>
                    </div>
                    <br>
                    <input type="file" hidden name="url" id="image" multiple="false" accept="image/*" onchange="uploadIm()"/><br>
                </div>
            </div>
            <button class="btnmoi" style="margin-top:-30px" type="submit">
                THÊM MỚI</button>
                
            </div>
        </div>
    </div>
 
</div>
@csrf
</div>
 </form>  
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<script>
    window.CP.PenTimer.MAX_TIME_IN_LOOP_WO_EXIT = 6000;
    var drawGray = null;
    function uploadIm(){
        var canvas = document.getElementById("imagePreviewUpload");
        var image = document.getElementById("image");
        var draw = new SimpleImage(image);
        drawGray = new SimpleImage(image);
        $("#iconUpload").hide(100)
        draw.drawTo(canvas);
    }
</script>
<script>
    $("#btn-replaceImage").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
    $("#iconUpload").click(function (e) { 
        e.preventDefault();
        $("#image").click()
    });
</script>
@endsection