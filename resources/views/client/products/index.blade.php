@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
    {{-- -----------------products------------ --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/client/product.css')}}">
    <link
    rel="stylesheet"
    type="text/css"
    href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>


@endsection
@section('main-content')
<div class="container">
    <div class="products">
        <h1 >Tất cả sản phẩm</h1>
        <div class="image-slider">
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528" alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/processed-food700-350-e6d0f0f.jpg" alt="">
                </div>
            </div>
            
        </div>
        
    
        {{-- ----------------------------- --}}
        <div class="product">
            <div class="pro">
                
                <div class="pro-1">
                    <div class="customsselects">
                        <div class="s1">
                                    <h2>DANH MỤC</h2>
                                    <div class="select">
                                        <input type="checkbox" id="toggle" class="toggle"> <label for="toggle">Thịt trứng</label>
                                        <ul>
                                            <li class="select-option"><input type="radio" name="choice" id="c1" value="c1"><label for="c1">Choice 1</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c2" value="c2"><label for="c2">Choice 2</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c3" value="c3"><label for="c3">Choice 3</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c4" value="c4"><label for="c4">Choice 4</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c5" value="c5"><label for="c5">Choice 5</label></li>
                                        </ul>	
                                        
                                    </div>
                                    <div class="select">
                                        <input type="checkbox" id="toggle4" class="toggle"> <label for="toggle4">Choose something</label>
                                        <ul>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c21" value="c1"><label for="c21">Choice 1</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c22" value="c2"><label for="c22">Choice 2</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c23" value="c3"><label for="c23">Choice 3</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c24" value="c4"><label for="c24">Choice 4</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c25" value="c5"><label for="c25">Choice 5</label></li>
                                        </ul>	
                                    </div>	
                                    <div class="select">
                                        <input type="checkbox" id="toggle2" class="toggle"> <label for="toggle2">Thịt trứng</label>
                                        <ul>
                                            <li class="select-option"><input type="radio" name="choice" id="c1" value="c1"><label for="c1">Choice 1</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c2" value="c2"><label for="c2">Choice 2</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c3" value="c3"><label for="c3">Choice 3</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c4" value="c4"><label for="c4">Choice 4</label></li>
                                            <li class="select-option"><input type="radio" name="choice" id="c5" value="c5"><label for="c5">Choice 5</label></li>
                                        </ul>	
                                        
                                    </div>
                                    <div class="select">
                                        <input type="checkbox" id="toggle0" class="toggle"> <label for="toggle0">Choose something</label>
                                        <ul>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c21" value="c1"><label for="c21">Choice 1</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c22" value="c2"><label for="c22">Choice 2</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c23" value="c3"><label for="c23">Choice 3</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c24" value="c4"><label for="c24">Choice 4</label></li>
                                            <li class="select-option"><input type="checkbox" name="choice2" id="c25" value="c5"><label for="c25">Choice 5</label></li>
                                        </ul>	
                                    </div>	
                        
                               
                        
                        
                        </div>
                       
                        </div>
                </div>
                <div class="pro-1">
                    <form class="pro-text">
                        <p>Thương hiệu</p>
                        <input type="checkbox" id="html" name="fav_language" value="HTML">
                        <label for="html">HTML</label><br>
                        <input type="checkbox" id="css" name="fav_language" value="CSS">
                        <label for="css">CSS</label><br>
                        <input type="checkbox" id="javascript" name="fav_language" value="JavaScript">
                        <label for="javascript">JavaScript</label>
                      
                        <br>  <br>
                      
                        <p>Loại</p>
                          <input type="checkbox" id="html" name="fav_language" value="HTML">
                          <label for="html">HTML</label><br>
                          <input type="checkbox" id="css" name="fav_language" value="CSS">
                          <label for="css">CSS</label><br>
                          <input type="checkbox" id="javascript" name="fav_language" value="JavaScript">
                          <label for="javascript">JavaScript</label>
                      </form>
                </div><br>
                {{-- -----------------pro new--------------- --}}
                <div class="pro-1">
                    <h2>MẸO ĂN NGON</h2>
                    <div class="pro-new">
                        <x-NewsCard isRow="true" title="tiêu đề bài viết" 
                        thumb="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif"
                        summary=" Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi " />
                    </div>
                </div>
            </div>
            {{-- ------------------------------- --}}
            <div class="pro">
               
                <div class="pro-xep">
                    <div class="pro-x">
                        <p style="float: left">Sắp xếp:</p>
                    
                    <form class="pro-text" style="float: left">
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">A-Z</label>
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">Z-A</label>
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">Gía tăng dần</label>
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">Giá giảm dần</label>
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">Mới nhất</label>
                        <input type="radio" id="" name="fav_language" value="">
                        <label for="">Cũ nhất</label>
                    </form>
                    </div>
                </div>
                   
                <div  style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;">
                    @foreach ($products as $item)
                    <x-ProductCard name="{{$item->name}}" 
                                   thumb="{{$item->thumb}}"
                                   priceOld="{{$item->price}}"
                                   discount="{{$item->discount}}"
                                    {{-- cột dọc true - ngang : false --}}
                                   {{-- isRow="{{true}}" --}}
                                   {{-- isProgress={{true}}
                                   progressValue={{40}} --}}
                                   {{-- progressTxt="Sắp cháy hàng" --}}
                                   />
                     
                              
                                @endforeach
            


            </div>
            {{$products->appends(request()->all())->links()}}

                
            </div>
            
        </div>
    
        
    </div>
</div>
@endsection
@section("js")

    {{-- ---------------product---------- --}}
    
    <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-1.11.0.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"
  ></script>
  <script
    type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
  ></script><script src="{{asset('./js/client/product.js')}}"></script>




<script src="{{asset('js/client/product.js')}}"></script>
@endsection