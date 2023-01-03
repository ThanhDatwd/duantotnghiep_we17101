<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class products20 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $thit='Thịt';
        $tenthit=['gà Đông Tảo', 'cá hồi', 'nai','cá'];
       

        for($i=0;$i<5;$i++){
            $name=$thit.' '.$tenthit[random_int(0,3)];
           
         
            
            $thumb=random_int(1,5).'.jpg';
            DB::table('products')->insert([
                "name"=>$name,
                "thumb"=>"https://loremflickr.com/320/240/food?random=".$thumb,
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
                "slug"=>'food-'.random_int(1,1000)
            ]);
        }






    }
}
