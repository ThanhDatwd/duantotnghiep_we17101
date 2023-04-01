<link rel="stylesheet" href="{{asset('css/client/component/couponCard.css')}}">
<div class="m_giftbox my-4">

    <fieldset class="free-gifts p-3 pb-4 pb-md-3 rounded position-relative">
        <legend class="d-inline-block pl-3 pr-3 mb-0">
            <img alt="Code Ưu Đãi"
                src="//bizweb.dktcdn.net/thumb/icon/100/434/011/themes/845632/assets/gift.gif?1676652183181"> Code Ưu
            Đãi
        </legend>
        <div class="row">
            @foreach ($list as $d )
            <div class="col-12 col-md-6 col-lg-4">
                <div class="item line_b pb-2 none_mb">
                    <span class="mb-2 d-block ">
                        {{$d->description}}
                        <div class="d-flex gx-1">
                            <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block btn-copy-coupon-code"
                                data-copy={{$d->coupon_code}}>
                                Sao chép
                                <input type="text" value={{$d->coupon_code}} hidden>
                            </button>
                            @if (isset($_COOKIE["couponCode"])&&$_COOKIE["couponCode"]==$d->coupon_code)
                                <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block btn-used">
                                    Đã sử dụng
                                    <i class='bx bx-check'></i>
                                </button>
                            @else
                            <form action="{{route('clientuse-coupon-code')}}" method="POST">
                                @csrf
                                <input type="text" value={{$d->coupon_code}} name="couponCode" hidden>
                                <button class="btn mt-1 btn-sm m_copy text-white font-weight-bold pl-2 pr-2 d-block">
                                    Sử dụng
                                </button>
                            </form>
                            @endif
                        </div>
                    </span>
                </div>
            </div>
            @endforeach
            <div class="position-absolute vmore_c w-100 d-md-none">
                <a href="javascript:;" class="d-block v_more_coupon text-center font-weight-bold">
                    <b class="t1">Xem thêm mã ưu đãi</b>
                    <b class="t1 d-none">Thu gọn</b>
                </a>
            </div>
        </div>
    </fieldset>
    <script>
        $(document).ready(function () {
            $(".btn-copy-coupon-code").click(function () { 
                $(this).find('input').select()
                // $(this).find('input').setSelectionRange(0, 99999)
                navigator.clipboard.writeText( $(this).find('input').val());

            });
        });
      
    </script>
</div>