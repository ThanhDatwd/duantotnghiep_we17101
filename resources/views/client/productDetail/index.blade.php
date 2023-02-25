@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/productDetail.css')}}">
@endsection
@section('main-content')
<section class="product-detail grid container">
        <div class="">
            <h1 class="product-name font-weight-bold text-uppercase mb-3">{{$product->name}}</h1>
            <div class="product-detail--infos">
                <div class="product-detail--img">
                    <div class="swiper mySwiperProductDetailThumb">
                        <div class="swiper-wrapper">
                          <div class="swiper-slide">
                            <img src="{{asset('upload/'.$product->thumb)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" />
                          </div>
                          @foreach ($product->products_images as $product_images )
                          <div class="swiper-slide">
                            <img src="{{asset('upload/'.$product_images->url)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" />
                          </div>
                          @endforeach
                        </div>
                      </div>
                      <div thumbsSlider="" class="swiper mySwiperProductDetailGallery">
                        <div class="swiper-wrapper">
                          @foreach ($product->products_images as $product_images )
                          <div class="swiper-slide">
                            <img src="{{asset('upload/'.$product_images->url)}}" alt="" onerror="this.src='{{asset('upload/error.jpg')}}'" />
                          </div>
                          @endforeach
                        </div>
                      </div>
                    {{-- <img src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" class=""> --}}
                    {{-- <img src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80" alt="" class="product-detail--img swiper-slide"> --}}
                </div>
                <div class="product-detail--info">
                    <div class="product-detail--info__status">Tình trạng: <span>Còn hàng</span>  |  Thương hiệu: <span>Green Food</span></div>
                    <div class="product-detail--info__prices">
                        @if ($product->discount>0)
                          <div class="product-detail--info__price-new">{{($product->price_current-($product->price_current*$product->discount/100))}}<span>₫</span></div>
                          <div class="product-detail--info__price-old">{{$product->price_current}}<span>₫</span></div>
                        @else
                          <div class="product-detail--info__price-old">{{$product->price_current}}<span>₫</span></div>
                        @endif
                    </div>
                    <div class="product-detail--info__amount">
                        Số lượng <span>-</span><span>+</span><span>1</span>
                    </div>
                    <div class="product-detail--info__cta">
                        <button class="btn btn-1">Thêm vào giỏ hàng</button>
                        <button class="btn btn-2">Mua ngay</button>
                    </div>
                    <div class="hotline-call">
                      <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/customer-service.png?1676652183181" alt="">
                      <div>Gọi ngay <span>1900 6090</span> để được tư vấn tốt nhất!</div>
                    </div>
                    <div class="btn-shopee">
                        <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/shopee_buy.png?1676652183181" alt="">
                    </div>
                </div>
            </div>
            <div>
              @if (strlen($coupons)>1)
                <x-AppCouponCard :list="$coupons"/>
              @endif
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
    <section class="container" style="margin-top: 20px" >
      
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
