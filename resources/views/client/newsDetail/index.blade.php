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
                        </article>
                        <article class="d-flex blog-item border-bottom pt-2 pd-2">
                            <img class="col-4" src="https://images.unsplash.com/photo-1476224203421-9ac39bcb3327?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                            <p class="col-8">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</p>
                        </article>

                    </div>
                </div>
            </div>
            <article class="col-lg-9 col-xs-12">
                <h1 class="article-name font-weight-bold">Hướng dẫn 5 cách làm món cá hồi sốt vừa ngon, vừa nhiều dinh dưỡng cho gia đình</h1>
                <div class="entry-date">
                    <p>Đăng bởi: <b>Admin - 06/09/2023</b></p>
                </div>
                <div class="table-of-contents">
                    <h2>Nội dung chính</h2>
                    <ol>
                        <li>
                            <a href="">Lợi ích</a>
                        </li>
                        <li>
                            <a href="">Lợi ích 2</a>
                            <ol>
                                <li>
                                    <a href="">69</a>
                                </li>
                                <li>
                                    <a href="">hihi</a>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
                <div class="entry-content text-justify">
                    <h2>Lợi ích của cá hồi</h2>
                    <p>So với nhiều mặt hàng thực phẩm tươi sống khác hiện nay, cá hồi có giá thành phải chăng, không quá đắt đỏ. Thịt cá hồi có giá trị dinh dưỡng rất cao, các nghiên cứu khoa học đã chứng minh ăn cá hồi hàng ngày, đặc biệt là cá hồi sốt sẽ giúp bạn:</p>
                    <ul>
                        <li>Bổ sung axit béo Omega-3 giúp giảm viêm, hạ huyết áp và hạn chế nhiều bệnh nguy hiểm khác.</li>
                        <li>Omega3, vitamin D, selen trong thịt cá hồi cũng hỗ trợ cơ thể kiểm soát lượng insulin, hạ thấp mức đường huyết và hấp thu đường hiệu quả.</li>
                        <li>Rất nhiều vitamin, khoáng chất thiết yếu nhu canxi, photpho, sắt… tạo điều kiện thuận lợi cho việc chuyển hóa trong cơ thể.</li>
                        <li>Tăng cường khả năng ghi nhớ và hoạt động của não, chống trầm cảm, căng thẳng và stress.</li>
                        <li>Ngăn ngừa thoái hóa điểm vàng, hạn chế tình trạng khô võng mạc, mỏi mắt, cải thiện thị lực tốt hơn.</li>
                        <li>Ngăn ngừa tình trạng loãng xương, chống viêm tự nhiên, giúp xương chắc khỏe.</li>
                        <li>Cải thiện tình trạng da lão hóa, hạn chế các gốc tự do giúp da sáng hồng, rạng rỡ.</li>
                        <li>Ngoài ra, ăn các món&nbsp;cá hồi sốt&nbsp;thường xuyên còn giúp bạn ngăn ngừa ung thư, cung cấp kali, hỗ trợ giảm cân và đảm bảo tâm trạng thoải mái mỗi ngày.</li>
                    </ul>

                    <h2>Cách chế biến</h2>
                    <p>Một món ăn mãi thì có thể ngán nhưng 5 món đổi bữa thường xuyên thì chẳng bao giờ, thậm chí còn mong mỏi được ăn mỗi ngày.</p>
                    <h3>1. Cá hồi sốt bơ tỏi</h3>
                    <p>Cá hồi sốt bơ tỏi với vị thơm, ngọt đặc trưng sẽ khiến gia đình bạn rất “hao cơm” đó. Cách thực hiện cho món cá hồi sốt bơ tỏi như sau:</p>
                    <ul>
                        <li><strong>Bước 1:</strong>&nbsp;Chuẩn bị 500 gram thịt cá hồi phi lê đã cắt miếng, 100 gram bơ, 1 trái chanh, 50 gram tiêu, tỏi, rượu trắng, muối…</li>
                        <li><strong>Bước 2:</strong>&nbsp;Ngâm tẩm cá hồi trong rượu trắng, muối, tiêu và ½ trái chanh đã vắt nước khoảng từ 10 – 15 phút.</li>
                        <li><strong>Bước 3:</strong>&nbsp;Đổ dầu vào chảo, chiên cá hồi chín vàng tất cả các góc từ ngoài vào trong.</li>
                        <li><strong>Bước 3:</strong>&nbsp;Đun nóng bơ rồi dập tỏi và vắt nốt nước cốt ½ quả chanh đổ vào khuấy đều.</li>
                        <li><strong>Bước 4:</strong>&nbsp;Bày thành quả ra đĩa lúc còn nóng rồi thêm nước sốt bơ tỏi vừa chế biến lên trên đều khắp tất cả các miếng cá hồi và thưởng thức.</li>
                    </ul>
                    <h3>2. Cá hồi sốt bơ tỏi</h3>
                    <p>Cá hồi sốt bơ tỏi với vị thơm, ngọt đặc trưng sẽ khiến gia đình bạn rất “hao cơm” đó. Cách thực hiện cho món cá hồi sốt bơ tỏi như sau:</p>
                    <ul>
                        <li><strong>Bước 1:</strong>&nbsp;Chuẩn bị 500 gram thịt cá hồi phi lê đã cắt miếng, 100 gram bơ, 1 trái chanh, 50 gram tiêu, tỏi, rượu trắng, muối…</li>
                        <li><strong>Bước 2:</strong>&nbsp;Ngâm tẩm cá hồi trong rượu trắng, muối, tiêu và ½ trái chanh đã vắt nước khoảng từ 10 – 15 phút.</li>
                        <li><strong>Bước 3:</strong>&nbsp;Đổ dầu vào chảo, chiên cá hồi chín vàng tất cả các góc từ ngoài vào trong.</li>
                        <li><strong>Bước 3:</strong>&nbsp;Đun nóng bơ rồi dập tỏi và vắt nốt nước cốt ½ quả chanh đổ vào khuấy đều.</li>
                        <li><strong>Bước 4:</strong>&nbsp;Bày thành quả ra đĩa lúc còn nóng rồi thêm nước sốt bơ tỏi vừa chế biến lên trên đều khắp tất cả các miếng cá hồi và thưởng thức.</li>
                    </ul>
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
                                <a>Admin</a>
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
					{{-- <div class="row comment-form">
						<div class="col-12 form-group">
							<input type="text" class="form-control" placeholder="Tên *" title="Tên" name="name" value="">
						</div>
						<div class="col-12 form-group">
							<input class="form-control" title="E-mail" type="email" placeholder="E-mail *" name="email" value="">
						</div>
					</div> --}}
					<div class="field aw-blog-comment-area form-group">
						<textarea rows="6" cols="50" class="form-control" title="Nội dung *" placeholder="Nội dung*" name="content"></textarea>
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
