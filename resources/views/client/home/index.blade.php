@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/home.css')}}">
@endsection
@section('main-content')

<section class="banner">
  <div class="swiper mySwiperBanner">
    <div class="swiper-wrapper">
      @foreach ($products as $item)
      <div class="swiper-slide">
        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/slide-img2.png?1669280565026" alt="">
      </div>
      @endforeach
    </div>
    <div class="swiper-pagination"></div>
  </div>
</section>
{{-- Dịch vụ --}}
<section class="service-section">
  <div class="container">
    <div class="swiper mySwiperService">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <div class="service__card">
            <img
              src="https://bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/img_poli_4.png?1669280565026"
              alt="">
            <div>Sản phẩm an toàn</div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="service__card">
            <img
              src="https://bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/img_poli_4.png?1669280565026"
              alt="">
            <div>Chất lượng cam kết</div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="service__card">
            <img
              src="https://bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/img_poli_4.png?1669280565026"
              alt="">
            <div>Dịch vụ vượt trội</div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="service__card">
            <img
              src="https://bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/img_poli_4.png?1669280565026"
              alt="">
            <div>Giao hàng nhanh</div>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="service__card">
            <img
              src="https://bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/img_poli_4.png?1669280565026"
              alt="">
            <div>Giao hàng nhanh</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <svg style="transform:rotate(180deg); transition: 0.3s" viewBox="0 0 1440 80">
    <defs>
      <linearGradient id="mew-poli-svg" x1="0" x2="0" y1="1" y2="0">
        <stop stop-color="var(--lightLeftColBackground)" offset="0%"></stop>
        <stop stop-color="var(--lightLeftColBackground)" offset="100%"></stop>
      </linearGradient>
    </defs>
    <path style="transform:translate(0, 0px); opacity:1" fill="url(#mew-poli-svg)"
      d="M0,20L40,26.7C80,33,160,47,240,53.3C320,60,400,60,480,53.3C560,47,640,33,720,31.7C800,30,880,40,960,50C1040,60,1120,70,1200,61.7C1280,53,1360,27,1440,28.3C1520,30,1600,60,1680,65C1760,70,1840,50,1920,38.3C2000,27,2080,23,2160,31.7C2240,40,2320,60,2400,65C2480,70,2560,60,2640,51.7C2720,43,2800,37,2880,28.3C2960,20,3040,10,3120,5C3200,0,3280,0,3360,0C3440,0,3520,0,3600,6.7C3680,13,3760,27,3840,30C3920,33,4000,27,4080,28.3C4160,30,4240,40,4320,41.7C4400,43,4480,37,4560,28.3C4640,20,4720,10,4800,20C4880,30,4960,60,5040,70C5120,80,5200,70,5280,66.7C5360,63,5440,67,5520,58.3C5600,50,5680,30,5720,20L5760,10L5760,100L5720,100C5680,100,5600,100,5520,100C5440,100,5360,100,5280,100C5200,100,5120,100,5040,100C4960,100,4880,100,4800,100C4720,100,4640,100,4560,100C4480,100,4400,100,4320,100C4240,100,4160,100,4080,100C4000,100,3920,100,3840,100C3760,100,3680,100,3600,100C3520,100,3440,100,3360,100C3280,100,3200,100,3120,100C3040,100,2960,100,2880,100C2800,100,2720,100,2640,100C2560,100,2480,100,2400,100C2320,100,2240,100,2160,100C2080,100,2000,100,1920,100C1840,100,1760,100,1680,100C1600,100,1520,100,1440,100C1360,100,1280,100,1200,100C1120,100,1040,100,960,100C880,100,800,100,720,100C640,100,560,100,480,100C400,100,320,100,240,100C160,100,80,100,40,100L0,100Z">
    </path>
  </svg>
</section>
{{-- kết thúc phần dịch vụ --}}
{{-- Phần danh mục nổi bật --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Danh mục nổi bật</a></h2>
    <div class="swiper mySwiperCategoryGroup">
      <div class="swiper-wrapper">
        @foreach ($products as $item)
        <div class="swiper-slide">
          <div class="category__group__card">
            <div class="content">
              <a href="" class="name">hải sản</a>
              <div class="categories">
                <li> <a href="">Tôm hùm</a></li>
                <li> <a href="">Cua hoàng đế</a></li>
                <li> <a href="">Mực trứng</a></li>
                <li> <a href="">Rau củ quả các loại</a></li>
              </div>
            </div>
            <div class="thumb">
              <img
                src="https://bizweb.dktcdn.net/thumb/compact/100/434/011/collections/untitled-design-3.png?v=1639501059257"
                alt="">
            </div>
          </div>

        </div>
        @endforeach
      </div>
      <div class="swiper-button-next categoryGroup"></div>
      <div class="swiper-button-prev categoryGroup"></div>
      <div class="swiper-pagination categoryGroup "></div>
    </div>
  </div>
</section>
{{-- Kết thúc phần danh mục nổi bật --}}
{{-- --}}
<section class="app-section pt-3 pb-3">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Flash Sale</a></h2>
    <div class="products-row">
      <div class="swiper mySwiperTypeEvent">
        <div class="swiper-wrapper">
          @foreach ($products as $item)
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
    </div>
  </div>
</section>

{{-- --}}
@php
$indexCategory=0;
@endphp
@foreach ($categories as $category )
@php
$indexCategory++;
@endphp

<section class="app-section">
  <div class="container">
    <h2 class="title pt-3 pb-3 mb-0"><a href="">{{$category->name}}</a></h2>
    <div class="row align-items-center products-section {{($indexCategory%2==0)?" left":"right"}}">
      <div class="col-xl-3 col-lg-4 col-md-5 col-xs-12 mb-3 mb-md-0">
        <a href="">
          <img style="width:100%;height:100%" class="category-thumb"
            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/bn_pr_3.png?1669280565026" alt="">
        </a>
      </div>
      <div class="col-xl-9 col-lg-8 col-md-7 col-xs-12" style="height:100%">
        <div class="products-row">
          <div class="swiper mySwiperTypeCategory">
            <div class="swiper-wrapper">
              @foreach ($category->products as $item)
              <div class="swiper-slide">
                <x-ProductCard  name="{{$item->name}}" thumb="{{$item->thumb}}" priceOld="{{$item->price_format}}"
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
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Phản hồi tù khách hàng</a></h2>
    <div class="swiper mySwiperFeeback " style="padding: 10px">
      <div class="swiper-wrapper ">
        @foreach ($products as $item)
        <div class="swiper-slide ">
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
    <h2 class="title pt-3 pb-3 mb-0"><a href="">Bài viết nổi bật</a></h2>
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
  var mySwiperTypeCategory = new Swiper(".mySwiperTypeCategory", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 20,
          grid:{
            rows:2
          }
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperTypeEvent = new Swiper(".mySwiperTypeEvent", {
     slidesPerView: 5,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 2,
          spaceBetween: 20,
          grid:{
            rows:2
          }
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperFeeback = new Swiper(".mySwiperFeeback", {
     slidesPerView: 2,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var mySwiperCategoryGroup = new Swiper(".mySwiperCategoryGroup", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next.categoryGroup",
          prevEl: ".swiper-button-prev.categoryGroup",
        },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
   });
   var mySwiperBanner = new Swiper(".mySwiperBanner", {
     slidesPerView: 1,
     spaceBetween: 0,
     autoplay: {
        delay:4000,
        disableOnInteraction: false,
      },
     loop:true,
     pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,

      },
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
   });
   var mySwiperNews = new Swiper(".mySwiperNews", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
     breakpoints: {
        0: {
          slidesPerView: 1.3,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
      
   });
   var mySwiperNews = new Swiper(".mySwiperService", {
     slidesPerView: 4,
     spaceBetween: 20,
     navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        breakpoints: {
        0: {
          slidesPerView: 1.3,
          spaceBetween: 20,
          pagination: {
              el: ".swiper-pagination",
              dynamicBullets: true,

            },
        },
        640: {
          slidesPerView: 3,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 4,
          spaceBetween: 20,
        },
      },
   });
   
   
</script>
@endsection