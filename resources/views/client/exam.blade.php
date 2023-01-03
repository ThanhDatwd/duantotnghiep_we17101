@extends('client.appLayout.index')
@section('main-content')
   <div class="container" >
   {{-- <x-CouponCard data={{$products}}/> --}}
   <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;">
   
      <x-NewsCard
        isRow={{true}}
         {{-- title="tiêu đề bài viết " --}}
         thumb="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif"
         summary=" Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi "
      />
   </div>
   <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;">
      <x-NewsCard
         title="tiêu đề bài viết "
         thumb="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif"
         summary=" Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi "
      />
   </div>
   <div style="display: grid;grid-template-columns:repeat(5,1fr);gap :10px;">
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
    <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px">
      @foreach ($products as $item)
    
    <x-ProductCard isRow={{true}}
                   name="{{$item->name}}" 
                   thumb="{{$item->thumb}}"
                   priceOld="{{$item->price_format}}"
                   priceCurrent="{{$item->price_current_format}}"
                   discount="{{$item->discount}}"
                   />
     
 @endforeach
    </div>
   </div>
@endsection
