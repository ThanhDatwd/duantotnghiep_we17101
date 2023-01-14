@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
@endsection
@section('main-content')

{{-- --}}
@foreach ($categories as $category )
<section class="app-section">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">{{$category->name}}</a></h2>
    <div class="row align-items-center">
      <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="">
          <img style="width:100%;height:100%" class="category-thumb"
            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/bn_pr_3.png?1669280565026" alt="">
        </a>
      </div>
      <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12">
        <div class="products-row">
          <div class="swiper mySwiperTypeCategory">
            <div class="swiper-wrapper">
              @foreach ($category->products as $item)
              <div class="swiper-slide">
                <x-ProductCard name="{{$item->name}}" thumb="{{$item->thumb}}" priceOld="{{$item->price_format}}"
                  priceCurrent="{{$item->price_current_format}}" discount="{{$item->discount}}" />
              </div>
              @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
          <div class="view_more text-center mt-3 position-relative">
            <a href="thit-bo" title="Xem thêm" class="position-relative text-light d-inline-block">
              Xem thêm
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach
{{-- Hiển thị phản hồi từ khách hàng --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Flash Sale</a></h2>
    <div class="swiper mySwiperNews">
      <div class="swiper-wrapper">
        @foreach ($products as $item)
        <div class="swiper-slide">
          <div class="feedback-card">
            <div class="info">
              <img src="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif" class="thumb" alt="">
              <div class="auth">
                <div class="name">Thành Đạt</div>
                <div class="posittion">Manager</div>
              </div>
            </div>
            <div class="content">
              Mình rất ưng khi đến Mew yummy. Ở đây có rất nhiều thực phẩm phong phú, tha hồ lựa chọn. Nhân viên chuyên
              nghiệp, nhiệt tình. Chúc Mew Yummy ngày càng phát triển.
            </div>
          </div>
        </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>
{{-- hiển thị tin tức nổi bật --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Flash Sale</a></h2>
    <div class="swiper mySwiperNews">
      <div class="swiper-wrapper">
        @foreach ($products as $item)
        <div class="swiper-slide">
          <x-NewsCard title="tiêu đề bài viết "
            thumb="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif"
            summary=" Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi " />
        </div>
        @endforeach
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </div>
  </div>
</section>

@endsection
@section("js")
<script>
  var swiper = new Swiper(".mySwiperTypeCategory", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var swiper2 = new Swiper(".mySwiperTypeEvent", {
     slidesPerView: 5,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var swiper3 = new Swiper(".mySwiperNews", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
</script>
@endsection