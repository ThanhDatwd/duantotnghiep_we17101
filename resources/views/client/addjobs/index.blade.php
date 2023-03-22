@extends('client.appLayout.index')
@section('css')
<link rel="stylesheet" href="{{asset('css/client/contact.css')}}">

<!-- LINK CSS -->
@endsection
@section('main-content')
    <div class="addjobs container ">
        <nav aria-label="breadcrumb  " @style("border-bottom:1px solid #eae8e8; ")>
            <ol class="breadcrumb p-3" @style("margin:0;padding-left:0px")>
              <li class="breadcrumb-item"><a href="{{route('client')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tuyển dụng</li>
            </ol>
          </nav>
        <div class="mt-2">
            <div class="jobs">
                <div class="col-main page-title">
                    <h1>Tuyển Dụng</h1>
                    <div class="rte m-auto bg-white d-block">
                        <p>- Quản lý danh mục hàng hóa, thường xuyên tìm kiếm các sản phẩm mới, nhà cung cấp mới để ngày
                            càng đa dạng hàng hóa và tăng cơ hội nâng cao doanh thu bán hàng và làm đánh giá hiệu quả
                            định kỳ với những sản phẩm đang kinh doanh để có kế hoạch đóng/ mở mã hàng phù hợp.
                        </p>
                        <p>+ Đặt hàng số lượng, đơn giá theo danh mục (xuất sứ, nhà sản xuất đảm bảo trong TOP5 về uy
                            tín, chất lượng cả TG, vùng, VN).
                        </p>
                        <p>
                            + Nhập hàng: kiểm tra số lượng, chất lượng hàng hóa theo đơn đặt hàng (đảm bảo tiêu chuẩn về
                            cảm quan, hạn sử dụng).
                        </p>
                        <p>
                            + Nhận hàng hóa có chất lượng tốt, sơ chế, cân hàng, đóng gói, dán nhãn tem mác và xác định
                            giá bán hàng hóa.
                        </p>
                        <p>
                            + Tư vấn về hàng hóa, nguồn gốc xuất sứ, hạn sử dụng, công dụng, cách chế biến hàng hóa để
                            tư vấn cho khách hàng.
                        </p>
                        <p>
                            + Kiểm tra hàng tồn cuối ngày để lập kế hoạch đặt hàng, thông báo hàng hết, số lượng hàng
                            phải đặt.
                        </p>
                        <p>
                            + Hiểu về cách sử dụng, điều khiển các thiết bị, tủ đông, tủ mát và sử dụng đúng mục đích
                        </p>
                        <p>
                            + Báo cáo các nội dung công việc trong ngày: Hàng hóa còn thiếu, các yêu cầu của KH, góp ý
                            của KH, hàng vỡ hỏng, tem nhãn hàng hóa còn thiếu, các bất thường khác…
                        </p>
                        <p>
                            <b> Thời gian hợp đồng:</b> 36 tháng
                        </p>
                        <p>
                            <b> Thời hạn xin việc:</b> 30/11/2021
                        </p>
                        <p>
                            <b>
                                Ngày Bắt đầu Dự kiến:</b> 30/11/2021
                        </p>
                        <p>
                            <b>
                                Loại hình công việc:</b> Toàn thời gian, Hợp đồng
                        </p>
                        <p>
                            <b> Lương:</b> 12.000.000₫ - 15.000.000₫ một tháng
                        </p>
                        <p><b> Các cân nhắc do COVID-19:</b>
                            Đeo khẩu trang khi gặp!
                        </p>
                        <p>
                            <b>
                                Kinh nghiệm làm việc:</b>

                            Thu mua cho Siêu thị: 2 năm (Ưu tiên)
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection