@extends('client.appLayout.index')
@section('main-content')
   <section class="product-section pt-3 pb-3">
       <div class="container">
         <h2 class="title pt-3 pb-3 mb-0"><a href="">Flash Sale</a></h2>
         <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($products as $item)
            <div class="swiper-slide">
                <x-ProductCard name="{{$item->name}}" 
                  thumb="{{$item->thumb}}"
                  priceOld="{{$item->price_format}}"
                  priceCurrent="{{$item->price_current_format}}"
                  discount="{{$item->discount}}"
                  
                  />

            </div>
             
         @endforeach
        
          </div>
          <div class="swiper-pagination"></div>
        </div>
       </div>
   </section>
@endsection
@section("js")
<script>
   var swiper = new Swiper(".mySwiper", {
     slidesPerView: 4,
     spaceBetween: 20,
   });
 </script>
@endsection
