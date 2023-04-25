<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang danh cho admin</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/admin/lib/owlcarousel/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/admin/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{asset('css/admin/bootstrap.min.css')}}">
    <!-- Template Stylesheet -->
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.5.11/standard/ckeditor.js"></script>

    @yield("css")
    <link rel="stylesheet" href="{{asset('css/admin/style.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
</head>




<body>

    <div class=" position-relative bg-white d-flex p-0" style="width:100%">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Sidebar Start -->

        <div class="sidebar pe-4 pb-3 scroll">
            <nav class="navbar navbar-light">
                <a href="/admin" class="navbar-brand" style="margin:0 auto">

                    <img src="{{asset(" img/logo.png")}}"
                        style="width:150px;margin:0 auto;border-radius:50%;padding-bottom:20px ;" alt="">

                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle"
                            src="https://haycafe.vn/wp-content/uploads/2022/02/Avatar-trang-cho-nu.jpg" alt=""
                            style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3" style="color:#fff">
                        <h6 class="mb-0">
                            {{
                            Auth::guard('admin')->user()->full_name??""
                            }}
                        </h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/admin" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Trang chủ</a>
                    <a href="{{url('admin/order')}}" class="nav-link dropdown-toggle">
                        <i class="fa-solid fa-cart-shopping"></i>
                            Đơn Hàng
                    </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa-brands fa-shopify"></i></i>Sản Phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/admin/product" class="dropdown-item">Danh sách </a>
                            <a href="/admin/product/trashed" class="dropdown-item">Thùng rác </a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa-solid fa-list"></i>Loại Sản Phẩm</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="/admin/category_group" class="dropdown-item">Quản lý nhóm loại </a>
                            <a href="/admin/product_category" class="dropdown-item">Danh sách </a>
                            <a href="/admin/product_category/trashed" class="dropdown-item">Thùng rác</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa-regular fa-newspaper"></i>Tin Tức</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=" {{url('admin/categories_news')}}" class="dropdown-item">Quản lý loại tin</a>
                            <a href="{{url('admin/news')}}" class="dropdown-item">Quản lý tin tức</a>
                            <a href="{{route('siteshow-comment')}}" class="dropdown-item">Quản lý bình luận</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa-brands fa-bandcamp"></i>Hàng hóa</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('siteshow-purchase')}}" class="dropdown-item">Nhập hàng</a>
                            <a href="{{route('siteshow-purchase-history')}}" class="dropdown-item">Lịch sử nhập hàng</a>

                        </div>

                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="fa-brands fa-bandcamp"></i>Đối tác</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('admin/brand')}}" class="dropdown-item">Danh sách</a>
                            <a href="{{url('admin/brand/trashed')}}" class="dropdown-item">Thùng rác</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ticket"></i>
                            Mã Giảm Giá</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('admin/coupon')}}" class="dropdown-item">Danh sách</a>
                            <a href="{{url('admin/coupon/trashed')}}" class="dropdown-item">Thùng rác</a>

                        </div>
                    </div>
                    <a href="{{route('siteshow-contact')}}" class="nav-link dropdown-toggle" >
                        <i class="fa-sharp fa-solid fa-envelope"></i>
                        Liên hệ
                    </a>
                    <a href="{{route('siteshow-banner')}}" class="nav-link dropdown-toggle" >
                        <i class="fa-solid fa-image"></i>
                        Banner
                    </a>
                    <a href="{{url('admin/admin_users')}}" class="nav-link dropdown-toggle">
                        <i class="fa-regular fa-user"></i>Tài Khoản
                    </a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Spinner End -->
        <div class="content">

            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0">
                        <img src="{{asset(" img/logo.png")}}" alt="" style="width: 40px; height: 40px;">
                    </h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" name="key" type="search" placeholder="Tìm kiếm">
                    {{-- <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button> --}}
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Tin nhắn</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg"
                                        onerror="this.src='{{asset('upload/error.jpg')}}" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Bạn nhận được một tin nhắn </h6>
                                        <small>15 phút trước</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Bạn nhận được một tin nhắn nữa</h6>
                                        <small>35 phút trước</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt=""
                                        style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">Xem tất cả tin nhắn</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Thông báo</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2"
                                src="https://haycafe.vn/wp-content/uploads/2022/02/Avatar-trang-cho-nu.jpg" alt=""
                                style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">

                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('siteadmin-profile') }}" class="dropdown-item">Hồ sơ của tôi</a>
                            <a href="#" class="dropdown-item">Cài đặt</a>


                            <a href="{{ route('siteadmin-logout') }}" class="dropdown-item">Đăng xuất</a>
                        </div>
                    </div>
                </div>
            </nav>
            @yield('content')
        </div>


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
    <script src="{{asset('lib/tempusdominus/js/moment.min.js')}}"></script>
    <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('lib/chart/chart.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.2.1/chart.min.js"
        integrity="sha512-v3ygConQmvH0QehvQa6gSvTE2VdBZ6wkLOlmK7Mcy2mZ0ZF9saNbbk19QeaoTHdWIEiTlWmrwAL4hS8ElnGFbA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Javascript -->

    <script src="{{asset('js/admin/main.js')}}"></script>

    @yield("js")
</body>

</html>