@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/productDetail.css')}}">
@endsection
@section('main-content')
<div class="half-circle"></div>
<section class="product-detail grid ">
        <div class="">
            <h1 class="product-name font-weight-bold text-uppercase mb-3">hành tây củ</h1>
            <div class="product-detail--infos">
                <div class="product-detail--img">
                    <div class="swiper mySwiperProductDetailThumb">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                          </div>
                        </div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiperProductDetailGallery">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                          </div>
                          <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                          </div>
                        </div>
                      </div>
                    {{-- <img src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" class=""> --}}
                    {{-- <img src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" class="product-detail--img swiper-slide"> --}}
                </div>
                <div class="product-detail--info">
                    <div class="product-detail--info__status">Tình trạng: <span>Còn hàng</span>  |  Thương hiệu: <span>Green Food</span></div>
                    <div class="product-detail--info__prices">
                        <div class="product-detail--info__price-new">15.000<span>₫</span></div>
                        <div class="product-detail--info__price-old">25.000<span>₫</span></div>
                    </div>
                    <div class="product-detail--info__amount">
                        Số lượng <span>-</span><span>+</span><span>1</span>
                    </div>
                    <div class="product-detail--info__cta">
                        <button class="btn btn-1">Thêm vào giỏ hàng</button>
                        <button class="btn btn-2">Mua ngay</button>
                    </div>
                    <div class="btn-shopee">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/shopee_buy.png?1676652183181" alt="">
                    </div>
                </div>
            </div>
            <div class="product-detail--other mt-4">
                <h3 class="title underline">Thông tin chi tiết</h3>
                <p>đang cập nhật</p>
            </div>
        </div>
        <div class="related-products">
            <h2 class="title mb-3 text-uppercase font-weight-bold position-relative ">
                <a href="" >Sản phẩm liên quan</a>
                <div class="position-relative">
                    <span class="swiper-button-prev mre_prev "></span>
                    <span class="swiper-button-next mre_next "></span>
                </div>
            </h2>
            <div class="sidebar">
              <div class="products-row">
                <div class="swiper mySwiperRelatedProducts">
                  <div class="swiper-wrapper">
                    <div class="swiper-slide">
                      <x-ProductCard isRow="true" name="aa" thumb="https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" priceOld="aa"
                      priceCurrent="aa" discount=60 />
                    </div>
                    <div class="swiper-slide">
                      <x-ProductCard isRow="true" name="aa" thumb="https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" priceOld="aa"
                      priceCurrent="aa" discount=60 />
                    </div>
                    <div class="swiper-slide">
                      <x-ProductCard isRow="true" name="aa" thumb="https://images.unsplash.com/photo-1543466835-00a7907e9de1?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=774&q=80" priceOld="aa"
                      priceCurrent="aa" discount=60 />
                    </div>
                  </div>
                  {{-- <div class="swiper-button-next"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-pagination"></div> --}}
                </div>
              </div>
               
                <img src="https://scontent.fsgn2-7.fna.fbcdn.net/v/t39.30808-6/219284243_343850734042591_481454821461992375_n.jpg?stp=dst-jpg_p843x403&_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=Vb6Lj4eKW_UAX-LO1Y0&_nc_ht=scontent.fsgn2-7.fna&oh=00_AfA9Wfgfk21Tv5KIwq09B_fa0r05CmM1OeLxpomr6zw9EQ&oe=63F885EA" alt="" class="banner">
            </div>
        </div>
    </section>
@endsection
@section('js')
<script>
    var mySwiperProductDetailGallery = new Swiper(".mySwiperProductDetailGallery", {
      spaceBetween: 10,
      slidesPerView: 4,
      freeMode: true,
      watchSlidesProgress: true,
    });
    var mySwiperProductDetailThumb = new Swiper(".mySwiperProductDetailThumb", {
      spaceBetween: 10,
      thumbs: {
        swiper: mySwiperProductDetailGallery,
      },
    });
    var mySwiperRelatedProducts = new Swiper(".mySwiperRelatedProducts", {
     slidesPerView: 1,
     spaceBetween: 10,
     navigation: {
       nextEl: ".mre_next",
       prevEl: ".mre_prev",
      },
      //  grid:{
      //         rows:2
      //       }
    //     breakpoints: {
    //     0: {
    //       slidesPerView: 2,
    //       spaceBetween: 20,
    //       grid:{
    //         rows:2
    //       }
    //     },
    //     768: {
    //       slidesPerView: 3,
    //       spaceBetween: 20,
    //     },
    //     1024: {
    //       slidesPerView: 4,
    //       spaceBetween: 20,
    //     },
    //   },
   });
  </script>
@endsection
