<link rel="stylesheet" href="{{asset('css/client/component/productCard.css')}}">
<a href="{{$link}}" class="products-card {{$isRow==true?'isRow':''}}">
    <div class="thumb">
        <img src={{asset('upload/'.$thumb)}} alt="">
        <i class='bx bx-basket bx-tada'></i>
        <div class="discount {{$discount>0?'isActive':''}}" >{{$discount}}%</div>
    </div>
    <div class="content">
        <div class="progress progress__area {{$isProgress==true?'isActive':''}}" >
               <div class="title">{{$progressTxt}}</div>
                <img  class="icon" src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/hot-sale.png?1669280565026" alt="">
               <div class="progress-bar progess_status" style="width:{{$progressValue."%"}}" role="progressbar"  aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <h3 class="title">{{$name??null}}</h3>
        <div class="price">
            <span class="price_new">{{$priceCurrent}} vnđ</span>
            <del class="price_old">{{$priceOld}} {{$priceOld==null?'':'vnđ'}}</del>
        </div>
    </div>
</a>
