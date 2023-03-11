<link rel="stylesheet" href="{{asset('css/client/component/header.css')}}">
<div class="app__header">
        <div class="app__header__control">
           <div class="container">
            <div class="app__logo">
                <img src="https://bizweb.dktcdn.net/100/434/011/themes/845632/assets/logo.png?1669280565026" alt="">
            </div>
            <div class="action">
                 <div class="action-item search">
                    <input type="text" placeholder="Từ khóa ...">
                    <button><i class='bx bx-search'></i></button>
                 </div>
                 <div class="action-item hotline">
                    <i class='bx bx-phone-call bx-tada' ></i>
                    <div class="link">
                         <a href="tel:19008080">
                            <div>Hotline</div>
                            <div>19008080</div>
                         </a>
                    </div>
                 </div>
                 <div class="action-item auth">
                    <i class='bx bx-user'></i>
                    <div class="link">
                        <div><a href="">Đăng ký </a></div>
                        <div><a href="">Đăng nhập</a></div>
                    </div>
                 </div>
                 <div class="action-item cart position-relative">
                    <a  href="{{route('clientcart')}}">
                        <i class='bx bx-basket d-flex'></i>
                    </a>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill ">
                        {{count((array)cookie('cart'))}}
                      </span>
                 </div>
            </div>
           </div>
        </div>
        <div class="app__header__navigation">
            <div class="container">
                <ul class="menu">
                    <li><a href="{{route('clienthome')}}">
                        Trang chủ
                    </a></li>
                    <li><a href="">
                        Về chúng tôi
                    </a></li>
                    <li>
                        <a href="{{route('clientcategory-group-all')}}">
                           Sản phẩm 
                           <i class='bx bxs-down-arrow'></i>
                        </a>
                        <div class="categoryGroupList">
                            @foreach ($category_group as $item )
                            <div class="categoryGroupItem">
                                <div class="title">
                                    {{-- <a href="{{route('clientcategory-group',["slug"=>$item->slug])}}">
                                    </a> --}}
                                    {{$item->name}}
                                </div>
                                <div class="categoryList">
                                    @foreach ($item->categories as $category )
                                        <div>
                                           <a href="{{route('clientcategory',["slug"=>$category->slug])}}">
                                            {{$category->category_name}}
                                           </a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                            
                        </div>
                    </li>
                    <li><a href="{{route('clientnews')}}">
                        Tin tức 
                    </a></li>
                    <li><a href="{{route('clientaddjobs')}}">
                        Tuyển dụng 
                    </a></li>
                    <li><a href="{{route('clientcontact')}}">
                        Liên hệ
                    </a></li>
                    
                </ul>
            </div>
        </div>
</div>