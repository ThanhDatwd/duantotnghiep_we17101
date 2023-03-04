<style>
    .section-policy {
        padding-top: 20px;
        width: 100%;
    }
    .row {
    margin-right: -15px;
    margin-left: -15px;
    }
    .section_policy .owl-policy-mobile {
    background-color: #fff;
    overflow: hidden;
    }
    .owl-carousel .owl-stage-outer {
        position: relative;
        overflow: hidden;
        /* -webkit-transform: translate3d(0,0,0); */
    }
    .owl-stage {
        display: flex;
    }
    .item {
        width: 100%;
    }
    .section-policy-content {
        display: flex;
        position: relative;
    }

    .section-policy-content img {
        width: 40px;
        float: left;
        margin-right: 10px;
    }

    .section-policy-content {
        padding: 5px;
        padding-top: 25px;
    }

    .section-policy-padding h3 {
        font-size: 14px;
        font-weight: 500;
        margin: 0;
    }

    .section-policy-title {
        font-size: 12px;
        color: #888;
    }
    .footer ul.links {
    padding: 0;
    list-style: none;
    }
    footer .footer-left .footer-title {
    font-size: 20px;
    }

    .font-weight-bold {
        font-weight: 700 !important;
    }


    footer ul.links {
        padding: 0;
        list-style: none;
    }
    footer ul.links li {
    margin: 4px 0;
    }
    .align-items-stretch {
        display: flex;
    justify-content: space-evenly;
    }
    .footer-widget img {
        position: relative;
        left: 50%;
        transform: translate(-50%);
        padding: 20px 0px;
    }
    .onut a img {
        width: 32px;
        height: 32px;
        border-radius: 20px;
    }
    .payment-accept img {
        max-height: 30px;
    }
    footer .store img {
    max-height: 120px;
    }
    footer .store .tit {
    transition: 0.3s all ease;
    font-size: 18px;
    padding: 5px 15px;
    border-radius: 10px;
    color: var(--mainColor);
    border: 1px solid var(--mainColor);
    }

    .pb-2{
    padding-bottom: 0.5rem !important;
    }
    .align-items-center {
    -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
    }

    .border-top {
    border-top: 1px solid #888 !important;
    z-index: 100;
    background-color: #f8f9fa;
    }
    .foo_bot {
        width: 100%;
        position: absolute;
        left: 0%;
        right: 100%;
    }
    footer {
        width: 100%;
        position: absolute;
        left: 0%;
        right: 100%;
        background-color: #f8f9fa;
    }
    .img-nen {
        width: 100%;
        height: 200px;
        position: relative;
        bottom: -1.5rem;
    }

    @media all and (max-width: 844px) {
    .align-items-stretch {
        display: flex;
        justify-content: space-evenly;
        flex-direction: column;
    }
    .img-nen {
        width: 100%;
        height: 100%;
        position: relative;
        bottom: -1.5rem;
    }

    .owl-stage {
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
    }

    .footer-widget img {
        width: 15em;
    }

    footer .footer-left .footer-title {
        font-size: 25px;
    }
    .onut {
        display: flex;
        justify-content: space-evenly;
    }
    .footer-column-1 {
        margin: 20px;
    }
    .payment-accept {
        display: flex;
        justify-content: space-around;
    }
    footer .store img {
        position: relative;
    }
    .ap {
        padding-left: 25%;
    }
    }
</style>
<link rel="stylesheet" href="{{asset('css/client/footer.css')}}">

<!-- <link rel="stylesheet" href="{{asset('css/client/home.css')}}"> -->
<img class="img-nen" src="{{asset('img/vien-removebg.png')}}" alt="">

<footer class="mt-4">

<div class="section-policy">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="owl-policy-mobile owl-carousel not-dqowl owl-loaded owl-drag">
                    <div class="owl-stage-outer">
                        <div class="owl-stage">
                                <!-- Like chất lượng -->
                            <div class="owl-item active">
                                <div class="item">
                                    <div class="section-policy-content">
                                        <img src="https://bizweb.dktcdn.net/100/327/252/themes/678932/assets/policy_image_1.svg?1617240142061" alt="Đảo bảo chất lượng">
                                        <div class="section-policy-padding">
                                            <h3>Đảm Bảo Chất Lượng</h3>
                                            <div class="section-policy-title">
                                                Sản Phẩm Đảm Bảo Chất Lượng
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                            
                             <!-- Miễn Phí Giao Hàng -->
                            <div class="owl-item active">
                                <div class="item">
                                    <div class="section-policy-content">
                                        <img src="https://bizweb.dktcdn.net/100/327/252/themes/678932/assets/policy_image_2.svg?1617240142061" alt="Giao hàng miễn phí">
                                        <div class="section-policy-padding">
                                            <h3>Giao Hàng Miễn Phí</h3>
                                            <div class="section-policy-title">
                                                Giao hàng nhanh chóng và miễn phí 64 tỉnh thành.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                             <!-- Hỗ Trợ Miễn Phí -->
                             <div class="owl-item active">
                                <div class="item">
                                    <div class="section-policy-content">
                                        <img src="//bizweb.dktcdn.net/100/327/252/themes/678932/assets/policy_image_3.svg?1617240142061" alt="Hỗ trợ khách hàng">
                                        <div class="section-policy-padding">
                                            <h3>Hỗ trợ khách hàng 24/7</h3>
                                            <div class="section-policy-title">
                                                Mọi thông tin cần hỗ trợ liên hệ qua hotline: 0937.782.305.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Hàng Hoàn Trả -->
                            <div class="owl-item active">
                                <div class="item">
                                    <div class="section-policy-content">
                                        <img src="https://bizweb.dktcdn.net/100/327/252/themes/678932/assets/policy_image_4.svg?1617240142061" alt="Hoàn Trả Hàng">
                                        <div class="section-policy-padding">
                                            <h3>Hoàn Trả Hàng</h3>
                                            <div class="section-policy-title">
                                            Hoàn trả hàng trong vòng 7 ngày nếu xảy ra lỗi.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="container">
        <div class="footer-inner padding-bootom-10 padding-top-50">
            <div class="row">
                <div class="footer-widget">
                    <a href="#"><img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/logo.png?1669280565026" alt="LOGO"></a>
                </div>
                <div class="align-items">
                    <div class="align-items-stretch">
                        <!-- GIỚI THIỆU -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left mb-2">
                                <div class="footer-title mb-2 position-relative font-weight-bold">
                                    Giới Thiệu
                                </div>
                                <ul class="links">
                                        <li>    
                                            <a href="" title="Về Food Yummy">Về Chúng Tôi</a>
                                        </li>
                                        <li>
                                            <a href="" title="Tuyển Dụng">Tuyển Dụng Nhân Sự</a>
                                        </li>
                                        <li>
                                            <a href="" title="Gía Trị">Giá Trị Cốt Lõi</a>
                                        </li>
                                        <li>
                                            <a href="" title="Nguồn Gốc">Nguồn Gốc Thực Phẩm</a>
                                        </li>
                                        <li>
                                            <a href="" title="Liên Hệ">Liên Hệ</a>
                                        </li>
                                </ul>
                            </div>

                        <!-- Chính Sách -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left mb-2">
                                <div class="footer-title mb-2 position-relative font-weight-bold">
                                    Chính Sách
                                </div>
                                <ul class="links">
                                        <li>    
                                            <a href="/chinh-sach" title="Chính sách bảo mật">Chính sách bảo mật</a>
                                        </li>
                                        <li>
                                            <a href="/chinh-sach" title="vận chuyển">Chính sách vận chuyển</a>
                                        </li>
                                        <li>
                                            <a href="/chinh-sach" title="đổi trả">Chính sách đổi trả</a>
                                        </li>
                                        <li>
                                            <a href="/chinh-sach" title="Chính sách mua bán">Chính sách mua bán</a>
                                        </li>
                                        <li>
                                            <a href="/chinh-sach" title="Liên Hệ">Liên Hệ</a>
                                        </li>
                                </ul>
                            </div>

                        <!-- Hướng Dẫn -->
                            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left mb-2">
                                <div class="footer-title mb-2 position-relative font-weight-bold">
                                    Hướng Dẫn
                                </div>
                                <ul class="links">
                                    <li>    
                                        <a href="/huong-dan" title="mua hàng">Hướng dẫn mua hàng</a>
                                    </li>
                                    <li>
                                        <a href="/huong-dan" title="đổi trả">Hướng dẫn đổi trả</a>
                                    </li>
                                    <li>
                                        <a href="/huong-dan" title="kiểm tra đơn hàng">Hướng dẫn kiểm tra đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="/huong-dan" title="Cộng tác">Hướng dẫn cộng tác</a>
                                    </li>
                                    <li>
                                        <a href="/huong-dan" title="Thanh toán">Hướng dẫn thanh toán</a>
                                    </li>
                                </ul>
                            </div>

                        <!-- Hỗ Trợ KH -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-xs-12 footer-left mb-2">
                                <div class="footer-title mb-2 position-relative font-weight-bold">
                                    Hỗ Trợ Khách Hàng
                                </div>
                                <ul class="links">
                                    <li>    
                                        <a href="/chuong-trinh-khuyen-mai-than-thiet" title="Khuyến Mãi Thân Thiết">Chương Trình KHTT</a>
                                    </li>
                                    <li>
                                        <a href="/yeu-cau-ho-tro" title="Yêu cầu hỗ trợ">Gửi yêu cầu hỗ trợ</a>
                                    </li>
                                    <li>
                                        <a href="/phuong-thuc-thanh-toan" title="Phương thức thanh toán">Phương Thức Thanh Toán</a>
                                    </li>
                                    <li>
                                        <a href="/goc-am-thuc" title="Góc ẩm thực">Góc Ẩm Thực</a>
                                    </li>
                                    <li>
                                        <a href="/he-thong-cua-hang" title="Hệ Thống Cửa Hàng">Hệ Thống Cửa Hàng</a>
                                    </li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foo-mid mb-4">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12 footer-left">
                    <h3 class="footer-title mb2 position-relative font-weight-bold">Thông tin liên hệ</h3>
                    <address class="vcard mb-4">
                        <p class="adr">
                            <b>Địa Chỉ: </b>
                            Ladeco Building, 266 Doi Can Street, Ba Dinh District, Hanoi.
                        </p>
                        <p class="email">
                            <b>Email:</b>
                            <a href="mailto:haidinh147039@gmail.com" title="haidinh147039@gmail.com">haidinh147039@gmail.com</a>
                        </p>
                        <p class="hotline">
                            <b>Hotline: </b>
                            <a href="tel:0937782305" title="0937.782.305">0937.782.305</a>
                        </p>
                        <p class="giayphep">
                        Giấy chứng nhận Đăng ký Kinh doanh số 0309532xxx do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 01/04/2002
                        </p>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 footer-left">
                    <div class="footer-title mb-2 position-relative font-weight-bold">
                        Kết Nối Với Chúng Tôi
                    </div>
                    <div class="social position-relative">
                        <div class="onut pb-2">
                            <!-- facebook -->
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block facebook mr-1" title="facebook">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/facebook.png?1676652183181" alt="facebook">
                            </a>

                            <!-- Twitter -->
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block twitter mr-1" title="twitter">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/twitter.png?1676652183181" alt="twitter">
                            </a>

                            <!-- insta -->
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block insta mr-1" title="insta">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/instagram.png?1676652183181" alt="insta">
                            </a>

                            <!-- YT -->
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block yt mr-1" title="yt">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/youtube.png?1676652183181" alt="yt">
                            </a>

                            <!-- Shopee -->
                            <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block shopee mr-1" title="shopee">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/shopee.png?1676652183181" alt="shopee">
                            </a>
                            
                                <!-- Lazada -->
                                <a href="#" target="_blank" class="position-relative iso sitdown modal-open d-inline-block lazada mr-1" title="lazada">
                                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/lazada.jpg?1676652183181" alt="lazada">
                                </a>
                            
                        </div>
                    </div>
                    <p class="mb-3 position-relative">Phương thức thanh toán</p>
                    <div class="footer-column-1">
                        <div class="payment-accept">
                            <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/payment-1.png?1676652183181" alt="" class="first lazy loaded">

                            <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/payment-3.png?1676652183181" alt="" class="lazy loaded">

                            <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/payment-2.png?1676652183181" alt="" class="lazy loaded">

                            <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/payment-4.png?1676652183181" alt="" class="lazy loaded">
                        </div>
                    </div>
                </div>
                <div class="ap acol-xl-3 col-lg-3 col-md-6 col-sm-12 col-xs-12 footer-left">
                    <a href="he-thong-cua-hang" class="store d-inline-block" title="Hệ thống cửa hàng">
						<img alt="Hệ thống cửa hàng" class="lazy d-block m-auto loaded" src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/mew_store.png?1676652183181" data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/mew_store.png?1676652183181">
						<span class="tit d-inline-block font-weight-bold mt-2">Hệ thống cửa hàng</span>
					</a>
                </div>
            </div>
        </div>
    </div>
    <div class="foo_bot pt-2 pb-2 border-top">
        <div class="container">
            <div class="row bgk align-items-center">
                <div class="col-12">
                    <div class="coppyright">
                        Bản quyền thuộc về
                        <a href="#" rel="nofollow noopener" title="NewYummy" target="_bla
                        "> New Yummy.</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer> 