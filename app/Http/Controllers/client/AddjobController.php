<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class AddjobController extends Controller
{
    
    public function index()
    {
        $job = '36 tháng';
        $time = '30/11/2022';
        $loaihinh = 'Toàn thời gian, Hợp đồng';
        $luong = ' 12.000.000₫ - 15.000.000₫ một tháng';
        $uutien = '2 năm (Ưu tiên)';
        $ql = '- Quản lý danh mục hàng hóa, thường xuyên tìm kiếm các sản phẩm mới, nhà cung cấp mới để ngày
        càng đa dạng hàng hóa và tăng cơ hội nâng cao doanh thu bán hàng và làm đánh giá hiệu quả
        định kỳ với những sản phẩm đang kinh doanh để có kế hoạch đóng/ mở mã hàng phù hợp.';
        $dathang ='+ Đặt hàng số lượng, đơn giá theo danh mục (xuất sứ, nhà sản xuất đảm bảo trong TOP5 về uy
        tín, chất lượng cả TG, vùng, VN).';
        $nhaphang ='+ Nhập hàng: kiểm tra số lượng, chất lượng hàng hóa theo đơn đặt hàng (đảm bảo tiêu chuẩn về
        cảm quan, hạn sử dụng).';
        $nhanhang ='+ Nhận hàng hóa có chất lượng tốt, sơ chế, cân hàng, đóng gói, dán nhãn tem mác và xác định
        giá bán hàng hóa.';
        $tuvan = '+ Tư vấn về hàng hóa, nguồn gốc xuất sứ, hạn sử dụng, công dụng, cách chế biến hàng hóa để
        tư vấn cho khách hàng.';
        $kiemtra ='+ Kiểm tra hàng tồn cuối ngày để lập kế hoạch đặt hàng, thông báo hàng hết, số lượng hàng
        phải đặt.';
        $mucdich ='+ Hiểu về cách sử dụng, điều khiển các thiết bị, tủ đông, tủ mát và sử dụng đúng mục đích';
        $baocao = '+ Báo cáo các nội dung công việc trong ngày: Hàng hóa còn thiếu, các yêu cầu của KH, góp ý
        của KH, hàng vỡ hỏng, tem nhãn hàng hóa còn thiếu, các bất thường khác...';
        return view('client.addjobs.index',compact('job','time','loaihinh','luong','uutien','ql','dathang','nhaphang','nhanhang','tuvan','kiemtra','mucdich','baocao'));

        //         Route::get('/addjobs',function(){
        //             return View('index',['time' => '<p>
        //             <b> Thời gian hợp đồng:</b> 36 tháng
        //         </p>
        //         <p>
        //             <b> Thời hạn xin việc:</b> 30/11/2021
        //         </p>
        //         <p>
        //             <b>
        //                 Ngày Bắt đầu Dự kiến:</b> 30/11/2021
        //         </p>
        //         <p>
        //             <b>
        //                 Loại hình công việc:</b> Toàn thời gian, Hợp đồng
        //         </p>
        //         <p>
        //             <b> Lương:</b> 12.000.000₫ - 15.000.000₫ một tháng
        //         </p>','cannhac' => '
        //         <p><b> Các cân nhắc do COVID-19:</b>
        //             Đeo khẩu trang khi gặp!
        //         </p>
        //         <p>
        //             <b>
        //                 Kinh nghiệm làm việc:</b>
        //             Thu mua cho Siêu thị: 2 năm (Ưu tiên)
        //         </p>']
        //     );
        // });
    }
    // public function check() {

    // }
}
