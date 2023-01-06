@extends('client.appLayout.index')
@section('main-content')
   <div class="container" >
   {{-- <x-CouponCard data={{$products}}/> --}}
   <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;">
   
      <x-NewsCard
        isRow={{false}}
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
   <div >
      @php
         $a=1;
      @endphp
      @foreach ($cate as $item)
      @php
         $a+=1
      @endphp
      @if ($a==3)
         <h2>Quảng cáo</h2>
         <h1>{{$item->name}}</h1>
       <div style="display: grid;grid-template-columns:repeat(5,1fr);gap :10px;"> 
         @foreach ($item->products as $pro )
         <x-ProductCard name="{{$pro->name}}" 
           thumb="{{$pro->thumb}}"
           priceOld="{{$pro->price_format}}"
           priceCurrent="{{$pro->price_current_format}}"
           discount="{{$pro->discount}}"
           isProgress={{true}}
           progressValue={{40}}
           progressTxt="Sắp cháy hàng"
           />
         @endforeach

       </div>
      @else
      <h1>{{$item->name}}</h1>
      <div style="display: grid;grid-template-columns:repeat(5,1fr);gap :10px;"> 
        @foreach ($item->products as $pro )
        <x-ProductCard name="{{$pro->name}}" 
          thumb="{{$pro->thumb}}"
          priceOld="{{$pro->price_format}}"
          priceCurrent="{{$pro->price_current_format}}"
          discount="{{$pro->discount}}"
          isProgress={{true}}
          progressValue={{40}}
          progressTxt="Sắp cháy hàng"
          />
        @endforeach

      </div>
      @endif
      
       
   @endforeach
   </div>
   </div>
@endsection
