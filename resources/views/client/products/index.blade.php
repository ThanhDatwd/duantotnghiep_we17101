@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
{{-- -----------------products------------ --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('css/client/product.css')}}">
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />


@endsection
@section('main-content')
<section  class="container">
    <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
      <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
        <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$title}}</li>
      </ol>
    </nav>
  </section>
<div class="container">
    <div class="products">
        <h1>{{$title}}</h1>
        <div class="image-slider">
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528"
                        alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528"
                        alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528"
                        alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://i0.wp.com/images-prod.healthline.com/hlcmsresource/images/AN_images/healthy-eating-ingredients-1296x728-header.jpg?w=1155&h=1528"
                        alt="">
                </div>
            </div>
            <div class="image-item">
                <div class="image">
                    <img src="https://images.immediate.co.uk/production/volatile/sites/30/2020/08/processed-food700-350-e6d0f0f.jpg"
                        alt="">
                </div>
            </div>

        </div>


        {{-- ----------------------------- --}}
        <div class="row">
            <div class="col-12 col-lg-3 d-sm-block d-none"  >
                <div class="pro-1">
                    <div class="customsselects">
                        <div class="s1">
                            <h2>DANH MỤC</h2>
                            @foreach ($categoryGroups as $group )
                            <div class="select">
                                {{-- <input type="checkbox" id="toggle" class="toggle"> <label
                                    for="toggle">{{$group->name}}</label> --}}
                                <div class="select-title">
                                    <a href="{{route('clientcategory-group',["slug"=>$group->slug])}}">{{$group->name}}</a>
                                    <i class='bx bxs-down-arrow'></i>
                                </div>
                                <ul>
                                    @foreach ($group->categories as $item)
                                    <li class="select-option"><a href="{{route('clientcategory',["slug"=>$item->slug])}}">{{$item->category_name}}</a></li>

                                    @endforeach
                                </ul>

                            </div>
                            @endforeach






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

                        <br> <br>

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
            <div class="col-12 col-lg-9">

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

                @if (count($products)>0)
                <div class="row">
                    @foreach ($products as $item)
                    @php
                    $price1="";
                    $price2=number_format($item->price_current);
                    if($item->discount>0){
                    $price1=number_format($item->price_current)."đ";
                    $price2=number_format($item->price_current-($item->price_current*$item->discount/100));
                    }
                    @endphp
                    <div class="col-6  col-lg-3 mb-2 mt-2">
                        <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->slug])}}" name="{{$item->name}}"
                            thumb="{{$item->thumb}}" priceOld="{{$price1}}" priceCurrent="{{$price2}}đ"
                            discount="{{$item->discount}}" />
    
                    </div>
                        @endforeach
                </div>
                @else
                <div class="alert alert-warning d-flex justify-content-center">Danh mục trống</div>

                @endif

                <div class="d-flex justify-content-center mt-3">{{$products->appends(request()->all())->links()}}</div>

            </div>

        </div>


    </div>
</div>
@endsection
@section("js")

{{-- ---------------product---------- --}}

<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{asset('./js/client/product.js')}}"></script>




<script src="{{asset('js/client/product.js')}}"></script>
@endsection