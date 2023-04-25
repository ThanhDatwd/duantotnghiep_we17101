<link rel="stylesheet" href="{{asset('css/client/component/navbarMobile.css')}}">
<div class="navbar__mobile">
    <a href="{{route('client')}}" class="item">
        <i class='bx bx-home'></i>
        <span>Trang chủ</span>
    </a>
    <div class="item" onclick="handelDisplayDashboardMobile()">
        <i class='bx bx-menu-alt-right bx-rotate-180'></i>
        <span>Menu</span>
    </div>
    <div class="item">
        <box-icon name='phone-call'></box-icon>
        <span>Liên hệ</span>
        <div class="contact">
            <div class="contact-item">
                <a href="tel:19006750" title="Gọi ngay"
                    class="phone-box m-auto ml-lg-1 mr-lg-1 d-flex align-items-center justify-content-center">
                    <img class="d-lg-block lazy play0 loaded"
                        src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/telephone.png?1669280565026"
                        data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/telephone.png?1669280565026"
                        alt="Mew Yummy" width="25" height="25">
                </a>
            </div>
            <div class="contact-item">
                <a href="https://m.me/mewtheme" title="Chat Facebook" target="_blank"
                    class="fb-box d-flex m-auto ml-lg-1 mr-lg-1 align-items-center justify-content-center rounded-circle">
                    <img class="dd-lg-block lazy loaded"
                        src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/messenger.png?1669280565026"
                        data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/messenger.png?1669280565026"
                        alt="Mew Yummy" width="25" height="25">
                </a>
            </div>
            <div class="contact-item">
                <a href="https://zalo.me/+18001231234" title="Chat Zalo" target="_blank"
                    class="zalo-box m-auto ml-lg-1 mr-lg-1 d-flex align-items-center justify-content-center">
                    <img class="d-lg-block lazy loaded"
                        src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/zalo_des.png?1669280565026"
                        data-src="//bizweb.dktcdn.net/100/434/011/themes/845632/assets/zalo_des.png?1669280565026"
                        alt="Mew Yummy" width="25" height="25">
                </a>
            </div>
        </div>
    </div>
    <a href="{{route('clientaccount')}}" class="item">
        <i class='bx bx-user'></i>
        <span>Tài khoản</span>
    </a>
    <a href="{{route('clientcart')}}" class="item">
        <div class="cart position-relative">
            <i class='bx bx-basket'></i>
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                
            </span>
        </div>
        <span>Giỏ hàng</span>
    </a>

</div>
<div class="dashboard-area ">
    <div class="layer" onclick="handelDisplayNoneDashboardMobile()"></div>
    <div class="dashboard-menu">
        <div class="dashboard-navbar">
            <a href="{{route('client')}}">
                <div class="dashboard-navbar__item">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_1.png?1669280565026"
                            alt="">
                    </div>
                    <span>Trang chủ</span>
                </div>
            </a>
            <a href="">
                <div class="dashboard-navbar__item">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_2.png?1669280565026"
                            alt="">
                    </div>
                    <span>Giới thiệu</span>
                </div>
            </a>
            <a href="{{route('clientcategory-group-all')}}">
                <div class="dashboard-navbar__item active">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_3.png?1669280565026"
                            alt="">
                    </div>
                    <span>Sản phẩm</span>
                </div>
            </a>
            <a href="">
                <div class="dashboard-navbar__item">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_4.png?1669280565026"
                            alt="">
                    </div>
                    <span>Tin tức </span>
                </div>
            </a>
            <a href="">
                <div class="dashboard-navbar__item">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_5.png?1669280565026"
                            alt="">
                    </div>
                    <span>Tuyển dụng</span>
                </div>
            </a>
            <a href="">
                <div class="dashboard-navbar__item">
                    <div class="img"> <img
                            src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/icon_menu_5.png?1669280565026"
                            alt="">
                    </div>
                    <span>Liên hệ</span>
                </div>
            </a>
            
        </div>
        <div class="list-categories">
           <ul class="level1">
            @foreach ($category_group as $group )
            <li>
                <a href="" class="d-flex">{{$group->name}}</a>
                <ul class="level2">
                    @foreach ($group->categories as $item)
                        <li>
                            <div class="dot"></div>
                            <a href="{{route('clientcategory',["slug"=>$item->slug])}}" class="d-flex" >{{$item->category_name}} </a>
                        </li>
                        
                    @endforeach
                </ul>
              </li>
            @endforeach
              
           </ul>
        </div>
    </div>
</div>
<script src="{{asset('js/client/component/navbarMobile.js')}}"></script>