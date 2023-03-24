<?php

namespace App\Http\Controllers\client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $vechungtoi = 'CÔNG TY CỔ PHẦN THỰC PHẨM QUỐC TẾ MEW YUMMY';
        $tamnhin ='- Tầm nhìn mang đến cư dân toàn cầu những sản phẩm thực phẩm độc đáo dinh dưỡng, đậm bản sắc dân tộc, chất lượng vượt trội, tiện lợi và đẳng cấp.';
        $sumenh = 'Sứ mệnh mong muốn được phục vụ và giúp đỡ Khách hàng, Nhân viên, Đối tác có được sức khỏe tốt hơn, kiến tạo chất lượng cuộc sống thành công và hạnh phúc hơn';
        return view('client.aboutus.index',compact('vechungtoi','tamnhin','sumenh'));
    }
    
}
