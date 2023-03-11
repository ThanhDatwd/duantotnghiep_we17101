@extends('client.appLayout.index')
@section("css")
<link rel="stylesheet" href="{{asset('css/client/newsDetail.css')}}">

@endsection


@section('main-content')

    <div class="container text-color">
        <div class="row border-bottom">
            <div class="col-3">
                <div class="aside-content">
                    <h2 class="title-head">
                        Danh mục tin
                    </h2>
                    <nav class="nav-category navbar-toggleable-md pb-3">
                        <ul class="nav flex-column">
                            <li class="nav-item position-relative p-8">
                                <a href="nav-link">Mẹo ăn ngon</a>
                            </li>
                            <li class="nav-item position-relative p-8">
                                <a href="nav-link">Mẹo ăn ngon</a>
                            </li>
                            <li class="nav-item position-relative p-8">
                                <a href="nav-link">Mẹo ăn ngon</a>
                            </li>
                            <li class="nav-item position-relative p-8">
                                <a href="nav-link">Mẹo ăn ngon</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="aside-content">
                    <h2 class="title-head">
                        Có thể bạn quan tâm
                    </h2>
                    <div class="list-blogs">
                        <article class="d-flex blog-item border-bottom pt-2 pd-2">
                            <x-NewsCard isRow="true" title="tiêu đề bài viết" 
                            thumb="https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif"
                            summary=" Lợi ích của cá hồi trong bữa cơm gia đình hàng ngày So với nhiều mặt hàng thực phẩm tươi " />
                        </article>
                        {{-- <article class="d-flex blog-item border-bottom pt-2 pd-2">
                            <img class="col-4" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            <p class="col-8">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</p>
                        </article>
                        <article class="d-flex blog-item border-bottom pt-2 pd-2">
                            <img class="col-4" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            <p class="col-8">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</p>
                        </article>
                        <article class="d-flex blog-item border-bottom pt-2 pd-2">
                            <img class="col-4" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            <p class="col-8">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</p>
                        </article> --}}

                    </div>
                </div>
            </div>
            <article class="col-9">
                <h1 class="article-name font-weight-bold">{{$news->title}}</h1>
                <div class="entry-date">
                    <p>Đăng bởi: <b>{{$news->created_by}} - {{$news->created_at}}</b></p>
                </div>
                <div class="table-of-contents rounded">
                    <h2 class="title">Nội dung chính</h2>
                    <div id="toc-display">
                        {{-- table of contents --}}
                    </div>
                </div>
                <div class="entry-content text-justify">
                    {!! $news->content !!}
                </div>
                <div class="tag-product clearfix mt-2 pt-2 mb-2 pb-2 border-top border-bottom">
                    <label class="m-0">Tags: </label>
                    <a href="item_tags">Admin</a>
                    <a href="item_tags">Mẹo hay</a>
                </div>
                <div class="author-info">
                    <div class="row">
                        <div class="col-3 pt-2">
                            <div class="avata m-auto">
                                <a href="" class=" ">
                                    <img src="https://gaveinjaz.com/wp-content/uploads/2019/12/opulent-profile-square-07.jpg" alt="">
                                </a>
                            </div>
                            <div class="name text-center ">
                                <a>{{$news->created_by}}</a>
                                <p>Tác giả</p>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="cont">
                                <p>Sinh viên</p>
                                <button>Chi tiết</button>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <div class="row mb-5">
            <div class="col-6 ">
                <h3 class="title">Viết bình luận</h3>
                <form method="post" id="article_comments" accept-charset="UTF-8" class="comment-form">
					<div class="row comment-form">
						<div class="col-12 form-group">
							<input type="text" class="form-control" placeholder="Tên *" title="Tên" name="Author" value="">
						</div>
						<div class="col-12 form-group">
							<input class="form-control" title="E-mail" type="email" placeholder="E-mail *" name="Email" value="">
						</div>
					</div>
					<div class="field aw-blog-comment-area form-group">
						<textarea rows="6" cols="50" class="form-control" title="Nội dung *" placeholder="Nội dung*" name="Body"></textarea>
					</div>
					<div style="width:96%" class="button-set">
						<button type="submit" class="book-submit btn btn-primary text-center d-flex align-items-center font-weight-boldt font-weight-bold">Gửi bình luận</button>
					</div>
                </form>
            </div>
            <div class="col-6">
                <h3 class="title">Bình luận</h3>
                <p class="alert alert-warning">
                    Hiện tại chưa có bình luận.
                </p>
            </div>
        </div>
        <div class="row">
            <h3 class="title">Bài viết liên quan</h3>
        </div>
    </div>
@endsection

@section("js")
    <script>
        var toc = document.querySelectorAll('.toc');
        
        for (i = 0; i < toc.length; i++) {
            var tocDisplay = document.getElementById('toc-display');
            console.log(toc[i]);
            tocDisplay.innerHTML += toc[i].outerHTML;
        }
    </script>
@endsection