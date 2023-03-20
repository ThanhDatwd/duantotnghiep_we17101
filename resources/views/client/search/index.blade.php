@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/search.css')}}">
@endsection
@section('main-content')
<div class="container search-page mt-4">
  <h3>Tìm thấy <strong></strong> {{count($products)}} kết quả cho <strong>" {{$q}} "</strong></h3>
  <div class="row mt-4">
    @foreach ($products as $item)
    @php
    $price1="";
    $price2=number_format($item->price_current);
    if($item->discount>0){
    $price1=number_format($item->price_current)."vnđ";
    $price2=number_format($item->price_current-($item->price_current*$item->discount/100));
    }
    @endphp
    <div class="col-3">
      <x-ProductCard link="{{route('clientproduct-detail',['slug'=>$item->slug])}}" name="{{$item->name}}"
        thumb="{{$item->thumb}}" priceOld="{{$price1}}" priceCurrent="{{$price2}}đ" discount="{{$item->discount}}" />
    </div>

    @endforeach
  </div>
</div>
@endsection