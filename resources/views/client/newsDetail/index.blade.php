@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/newsDetail.css')}}">
@endsection
@section('main-content')
<div class="container mt-4 text-color">
    <div class="row border-bottom">
        <div class="col-lg-3 col-xs-12">
            <div class="aside-content">
                <h2 class="title-head">
                    Danh mục tin
                </h2>
                <nav class="nav-category navbar-toggleable-md pb-3">
                    <ul class="nav flex-column">
                        @foreach ($category_news as $item )
                        <li class="nav-item position-relative p-8">
                            <a href="">{{$item->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="aside-content">
                <h2 class="title-head">
                    Có thể bạn quan tâm
                </h2>
                <div class="list-blogs ">
                    @foreach ($newsRelate as $item )
                    <x-NewsCard isRow={{true}} link="{{route('clientnews-detail',['slug'=>$item->slug])}}"
                        title="{{$item->title}}" thumb="{{$item->thumb}}" summary="{{$item->summary}}"/>
                    @endforeach
                </div>
            </div>
        </div>
        <article class="col-lg-9 col-xs-12">
            <h1 class="article-name font-weight-bold">{{$post->title}}</h1>
            <div class="entry-date">
                <p>Đăng bởi: <b>{{$post->created_by}} - {{$post->created_at->format('d/m/Y')}}</b></p>
            </div>
            <div class="table-of-contents">
                {!!$post->content!!}
            </div>
        </article>
    </div>
    <div class="row mb-5">
        <div class="col-6 ">
            <h3 class="title">Viết bình luận</h3>
            <form method="POST" action="{{route('clientcomment')}}" id="article_comments" accept-charset="UTF-8" class="comment-form">
                @csrf
                @if (Auth::guard('web')->check()==false)
                <p class="alert alert-warning">
                    Vui lòng đăng nhập để thực hiện chức năng bình luận
                </p>
                @endif
                <input type="text" name="user_id" value="{{Auth::guard('web')->user()->id??null}}" hidden>
                <input type="text" name="news_id" value="{{$post->id}}" hidden>
                {{-- <div class="row comment-form">
                    <div class="col-12 form-group">
                        <input type="text" class="form-control" placeholder="Tên *" title="Tên" name="name" value="">
                    </div>
                    <div class="col-12 form-group">
                        <input class="form-control" title="E-mail" type="email" placeholder="E-mail *" name="email"
                            value="">
                    </div>
                </div> --}}
                <div class="field aw-blog-comment-area form-group">
                    <textarea rows="6" cols="50" class="form-control" title="Nội dung *" placeholder="Nội dung*"
                        name="content"></textarea>
                    <span class="text-danger">@error('content')
                        {{$message}}
                        @enderror</span>
                </div>
                <div style="width:96%" class="button-set">
                    <button type="submit"
                        class="book-submit btn btn-primary text-center d-flex align-items-center font-weight-boldt font-weight-bold"
                        @disabled(Auth::guard('web')->check()==true?false:true) >Gửi
                        bình luận
                    </button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <h3 class="title">Bình luận</h3>
            @if (count($comments)>0)
            @foreach ($comments as $item )
            <div class="comment-container">
                <div class="comment-header">
                    <img src="https://via.placeholder.com/40x40" alt="Avatar">
                    <h4>{{$item->author->username}}</h4>
                </div>
                <div class="comment-body">
                    <p>{{$item->content}}</p>
                </div>
                <div class="comment-footer">
                    <span>Thích</span>
                    <span>Trả lời</span>
                    <span>{{ $item->created_at->format('d/m/Y') }}</span>
                    <a href="#">Xóa</a>
                </div>
            </div>
            @endforeach
            @else
            <p class="alert alert-warning">
                Hiện tại chưa có bình luận.
            </p>
            @endif
        </div>
    </div>
    <div class="row">
        <h3 class="title">Bài viết liên quan</h3>
        <div class="col-12">
            <div style="display: grid;grid-template-columns:repeat(4,1fr);gap :10px;margin-top: 20px;">
  
              @foreach ($newsRelate as $item )
              <x-NewsCard isRow={{false}} link="{{route('clientnews-detail',['slug'=>$item->slug])}}"
                title="{{$item->title}}"
                thumb="{{$item->thumb}}"
                summary="{{$item->summary}}"
                day="{{$item->created_at->format('d')}}"
                month="{{$item->created_at->format('m/Y')}}"
                />
                @endforeach
            </div>
    </div>
</div>

@endsection