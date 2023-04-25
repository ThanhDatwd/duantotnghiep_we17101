@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/productDetail.css')}}">
@endsection
@section('main-content')
@if(session('success'))
<div class="alert alert-success">
  {{ session('success') }}
</div>
@endif

<section class="container">
  <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
    <ol class=" breadcrumb p-3" @style("margin:0;padding-left:0px")>
    <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
    </ol>
  </nav>
</section>
<section class="product-detail grid container mt-4">
  <div class="">
    <h1 class="product-name font-weight-bold text-uppercase mb-3">{{$product->name}}</h1>
    <div class="product-detail--infos">
      <div class="product-detail--img">
        <div class="swiper mySwiperProductDetailThumb">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <img src="{{asset('upload/'.$product->thumb)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            @foreach ($product->products_images as $product_images )
            <div class="swiper-slide">
              <img src="{{asset('upload/'.$product_images->url)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            @endforeach
          </div>
        </div>
        <div thumbsSlider="" class="swiper mySwiperProductDetailGallery">
          <div class="swiper-wrapper">
            @foreach ($product->products_images as $product_images )
            <div class="swiper-slide">
              <img src="{{asset('upload/'.$product_images->url)}}" alt=""
                onerror="this.src='{{asset('upload/error.jpg')}}'" />
            </div>
            @endforeach
          </div>
        </div>
        {{-- <img
          src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80"
          alt="" class=""> --}}
        {{-- <img
          src="https://images.unsplash.com/photo-1587132137056-bfbf0166836e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=580&q=80"
          alt="" class="product-detail--img swiper-slide"> --}}
      </div>
      <div class="product-detail--info">
        <div class="product-detail--info__status">Tình trạng:
          <span>{{$product->quantity_output>=$product->quantity_input?"Cháy hàng":"Còn hàng"}}</span> | Thương hiệu:
          <span>Green Food</span></div>
        <div class="product-detail--info__prices">
          @if ($product->discount>0)
          <div class="product-detail--info__price-new">
            {{number_format(($product->price_current-($product->price_current*$product->discount/100)))}}<span>
              vnđ</span></div>
          <div class="product-detail--info__price-old">{{number_format($product->price_current)}}<span> vnđ</span></div>
          @else
          <div class="product-detail--info__price-old">{{$product->price_current}}<span> vnđ</span></div>
          @endif
        </div>
        <form id="form-add" method="post" action={{route('clientadd-to-cart')}}>
          @csrf
          <input type="text" hidden name="productId" value={{$product->id}}>
          <div class="form-group">
            <label for="">Số Lượng</label>
            <div class="form-amount">
              <div class="btn btn-amount desc"><i class='bx bx-minus'></i></div>
              <input class="input-amount" type="number" name="amount" value=1>
              <div class="btn btn-amount add"><i class='bx bx-plus'></i></div>
            </div>
          </div>
          <div class="product-detail--info__cta">
            @if ($product->quantity_input>$product->quantity_output)
            <button class="btn btn-1" id="btn_add_to_card">Thêm vào giỏ hàng</button>
            <button class="btn btn-2" id="btn_buy_now">Mua ngay</button>
            @else
            <button class="btn btn-success py-1 d-flex gap-2 align-items-center justify-content-center w-auto"
              disabled><i class="bi bi-cart4 fs-5"></i> <span>Cháy hàng</span></button>
            @endif

          </div>
        </form>
        <div class="linehot_pro alert alert-warning mt-3 mb-3 d-flex align-items-center">
          <img class="mr-3 lazy loaded" alt="1900 123 321"
            src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/customer-service.png?1676652183181"
            data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/customer-service.png?1676652183181">
          <div class="b_cont font-weight-bold ml-3">
            <span class="d-block">
              Gọi ngay <a href="tel:1900123321" title="1900688688">1900 688 688</a> để được tư vấn tốt nhất!
            </span>
          </div>
        </div>
        <div class="btn-shopee">
          <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/shopee_buy.png?1676652183181" alt="">
        </div>
      </div>
    </div>
    <div class="mt-4">
      @if (count(json_decode($coupons))>=1)
      <x-AppCouponCard :list="$coupons" />
      @endif
    </div>
    <div class="product-detail--other mt-4">
      <h3 class="title underline">Thông tin chi tiết</h3>
      <div>{!!$product->content!=""?$product->content:'Đang cập nhật'!!}</div>
    </div>
  </div>
  <div class="related-products d-sm-block d-none">
    <h2 class="title mb-3 text-uppercase font-weight-bold position-relative ">
      <a href="">Sản phẩm liên quan</a>
      <div class="position-relative">
        <span class="swiper-button-prev mre_prev "></span>
        <span class="swiper-button-next mre_next "></span>
      </div>
    </h2>
    <div class="sidebar">
      <div class="products-row">
        <div class="swiper mySwiperRelatedProducts">
          <div class="swiper-wrapper">
            @foreach ($product_relate as $item )
            @php
            $price1=0;
            $price2=$item->price_current;
            if($item->discount>0){
            $price1=$item->price_current;
            $price2=$item->price_current-($item->price_current*$item->discount/100);

            }
            @endphp
            <div class="swiper-slide">
              <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->slug])}}" isRow={{true}}
                name="{{$item->name}}" thumb="{{$item->thumb}}" priceOld="{{number_format($price1)}}"
                priceCurrent="{{number_format($price2)}}" discount="{{$item->discount}}" />
            </div>
            @endforeach
          </div>
          {{-- <div class="swiper-button-next"></div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-pagination"></div> --}}
        </div>
      </div>

      <img
        src="https://scontent.fsgn2-7.fna.fbcdn.net/v/t39.30808-6/219284243_343850734042591_481454821461992375_n.jpg?stp=dst-jpg_p843x403&_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_ohc=Vb6Lj4eKW_UAX-LO1Y0&_nc_ht=scontent.fsgn2-7.fna&oh=00_AfA9Wfgfk21Tv5KIwq09B_fa0r05CmM1OeLxpomr6zw9EQ&oe=63F885EA"
        alt="" class="banner">
    </div>
  </div>
</section>
<section class="container" style="margin-top: 20px">

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
      grid:{
             rows:4
           }
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

  //  PHẦN CSS CHO THÊM SỐ LƯỢNG SẢN PHẨM
  const formAdd = document.querySelector('#form-add')
    const productId = document.querySelector('[name=productId]').value
    const amount = formAdd.querySelector('.input-amount')
    const btnAdd = formAdd.querySelector('.btn-amount.add')
    const btnDesc = formAdd.querySelector('.btn-amount.desc')
    const btn_add_to_card=$('#btn_add_to_card')
    const btn_buy_now=$('#btn_buy_now')

    btn_buy_now.click((e)=>{
      e.preventDefault();
      formAdd.action='http://127.0.0.1:8000/buy-now';
      formAdd.submit()
      console.log(formAdd.acction)
    })
    btn_add_to_card.click((e)=>{
      formAdd.action='http://127.0.0.1:8000/add-to-cart';
      e.preventDefault();
      formAdd.submit()

    })
    const btnOrderNow = formAdd.querySelector('.btnOrder-now')
    btnAdd.onclick = () => {
        amount.value++
    }
    btnDesc.onclick = () => {
      if (amount.value > 1) {
          amount.value--
        }
    }
  
</script>
@endsection