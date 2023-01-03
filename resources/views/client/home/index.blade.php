@extends('client.appLayout.index')
@section('main-content')
   <section class="product-section pt-3 pb-3">
       <div class="container">
         <h2 class="title pt-3 pb-3 mb-0"><a href="">Flash Sale</a></h2>
         <div class="products-area " style="display: grid;grid-template-columns:repeat(5,1fr);gap :16px;">
            @foreach ($products as $item)
            <x-ProductCard name="{{$item->name}}" 
                           thumb="{{$item->thumb}}"
                           priceOld="{{$item->price_format}}"
                           priceCurrent="{{$item->price_current_format}}"
                           discount="{{$item->discount}}"
                           isProgress={{true}}
                           progressValue={{40}}
                           progressTxt="Sắp cháy hàng"
                           />
             
         @endforeach
         </div>
         <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <div class="swiper-slide">Slide 1</div>
              <div class="swiper-slide">Slide 2</div>
              <div class="swiper-slide">Slide 3</div>
              <div class="swiper-slide">Slide 4</div>
              <div class="swiper-slide">Slide 5</div>
              <div class="swiper-slide">Slide 6</div>
              <div class="swiper-slide">Slide 7</div>
              <div class="swiper-slide">Slide 8</div>
              <div class="swiper-slide">Slide 9</div>
            </div>
            <div class="swiper-pagination"></div>
          </div>
       </div>
   </section>
@endsection
@section("js")
<script>
   var swiper = new Swiper(".mySwiper", {
     slidesPerView: 3,
     spaceBetween: 30,
   });
 </script>
@endsection
