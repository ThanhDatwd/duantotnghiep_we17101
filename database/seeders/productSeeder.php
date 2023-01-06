<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\product;
class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   
    public function run()
    {
        // for($i=0;$i<5;$i++){
        // }
        product::create([
               "name"=>"Thịt bò cobe",
               "thumb"=>"https://static-images.vnncdn.net/files/publish/2022/12/2/bo-kobe-1052.gif",
               "summary"=>"Đây là đoạn giới thiệu tóm tắt sản phẩm",
               "content"=>"Nội dung chính giới  thiệu về sản phẩm ",
               "price"=>100000,
               "price_format"=>"100.000 đ",
               "price_current"=>100000,
               "price_current_format"=>"100.000 đ",
               "quantity_input"=>100,
               "quantity_output"=>10,
               "discount"=>5,
               "brand"=>"Đà Lạt",
               "unit"=>"kg",
               "color"=>'',
               "slug"=>'thit-bo-kobe'
               
            
        ]);
    }
}
