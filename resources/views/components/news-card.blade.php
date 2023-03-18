<link rel="stylesheet" href="{{asset('css/client/component/newsCard.css')}}">
<a href="{{$link}}" class="news-card {{$isRow==true?'isRow':''}}">
    <div class="thumb">
        <img src={{asset('upload/'.$thumb)}} alt="">
        <div class="thumb-layer">
            <img class="thumb-layer-img" src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/favicon.png?1667206835361" alt="">
        </div>
        <div class="date">
            <div>
                <div class="day">{{$day}}</div>
                <div class="month">{{$month}}</div>
            </div>
        </div>
    </div>
    <div class="content">
        <h3 class="title">{{$title??null}}</h3>
         <div class="summary">
            {{$summary??null}}
        </div>
    </div>
</a>




