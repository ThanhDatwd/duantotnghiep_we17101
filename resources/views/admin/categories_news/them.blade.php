@extends('admin.appLayout.index')
@section('content')
<?php

use Illuminate\Support\Facades\DB;

?>



<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/admin/product.css')}}">
    @yield('css')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>
<style>

</style>
<div class="adproduct">
<div class="direct-header">
        <div class="direct">
        <a href="/admin">Trang chủ</a>
        <span>></span>
        <a href="/admin/news">Tin tức</a>
        <span>></span>
        <a href="/admin/news/them">Thêm tin tức</a>
    </div>
<div class="head" style="text-align: center;">
    <h1>Thêm tin tức</h1>
</div>
<div class="span">
   <input type="hidden">
</div>
<div class="span">
   <input type="hidden">
</div>
<style>
    .direct-header{
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .direct{
        display: flex;
        align-items: center;
    }
    .direct a{
        color: #000;
        text-decoration: none;
    }
    .direct span{
        margin: 0 5px;
    }
    .head{
        margin-top: 20px;
    }
</style>
</div>

<form action="/admin/categories_news/them" method="post" class="col-7 m-auto" enctype="multipart/form-data">
<div class= "container-fluid" style="Width: 100%;">
    <div class= "row">
        <div class ="col-md-9 ">
            <div id="exTab1" class="container">
              
                

                <div class="tab-content clearfix">
                    <div class="tab-pane boxlist active" id="1a">
                        <div class="boxlist1">
                            <div class="addpro">
                               
                                <div class="adpro1">
                                    <p>Tên loại tin <span>(*)</span></p>
                                    <input type="text" placeholder="Nhập tên loại tin" name="name">
                                    @error('title')
                                   <p>{{$message}}</p>
                                    @enderror
                                    
                                </div>
                             
                            </div>
                       
                            
                              
                             
                            </div>
                      
                       


                       
                </div>
            </div>

        </div>

        <div class ="col-md-3">
  
         
            <button class="btnmoi" type="submit">
                THÊM MỚI</button>
                
            </div>
        </div>
    </div>
 
</div>
@csrf
 </form>  
</div>

@endsection