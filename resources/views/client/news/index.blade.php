@extends('client.appLayout.index')
@section('main-content')
<link rel="stylesheet" href="{{asset('css/client/news_index.css')}}">
<div class="container" style="margin-top: 20px;">
  <div class="path">
    <a href="">Trang chủ</a>
    <span></span>
    <a href="">Tin tức</a>

    <hr>
  </div>

  {{--
  <x-CouponCard data={{$products}} /> --}}
  <div class="main" style="display:flex;">
    <div class="main_content" style="width: 100%">
      <div class="row">
        <div class="col-9">
          <div class="navbar-container">
            <h2 class="change_title">
              Mẹo ăn ngon
            </h2>
            <ul>
              <li class="nav-link active-link">
                <a href="#">Mẹo ăn ngon
                </a>
                <div class="underline"></div>
              </li>
              <li class="nav-link">
                <a href="#">Vào bếp cùng Mew</a>
                <div class="underline"></div>
              </li>
              <li class="nav-link">
                <a href="#">Review ẩm thực</a>
                <div class="underline"></div>
              </li>
              <li class="nav-link">
                <a href="#">Khuyến mãi hot</a>
                <div class="underline"></div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-3">
          <div class="popular_news_title">
            <h4>Tin tức nổi bật</h4>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-9">
          <div style="display: grid;grid-template-columns:repeat(3,1fr);gap :10px;margin-top: 20px;">

            @foreach ($news as $item )
            <x-NewsCard isRow={{false}} link="{{route('clientnews-detail',[" slug"=>$item->slug])}}"
              title="{{$item->title}}"
              thumb="{{$item->thumb}}"
              summary="{{$item->summary}}"
              />
              @endforeach
          </div>
        </div>
        <div class="col-3 mt-3" >
          <div class="popular_news" style=" height: 100%;width: 90%;">
            <ul style="padding: 0">
              @foreach ($news as $item )
                 <li>
                  <x-NewsCard isRow={{false}} link="{{route('clientnews-detail',[" slug"=>$item->slug])}}"
                    title="{{$item->title}}"
                    thumb="{{$item->thumb}}"
                    summary="{{$item->summary}}"
                    />
                 </li>
                @endforeach
              
            </ul>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>

<script>
  $('.nav-link').on('click', function() {
	$('.active-link').removeClass('active-link');
	$(this).addClass('active-link');
});
</script>
<script>
  var title = document.getElementsByClassName("change_title");
            var nav_link = document.getElementsByClassName("nav-link");
            var underline = document.getElementsByClassName("underline");
            for (let i = 0; i < nav_link.length; i++) {
              nav_link[i].addEventListener("click", function () {
                for (let j = 0; j < nav_link.length; j++) {
                  nav_link[j].classList.remove("active-link");
                  underline[j].style.width = "0";
                }
                nav_link[i].classList.add("active-link");
                underline[i].style.width = "100%";
                title[0].innerHTML = nav_link[i].innerText;
              });
            }
</script>

@endsection