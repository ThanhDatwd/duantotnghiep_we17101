<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('products')->insert([
        //     "name"=>"Thịt Trứng",
        //     "thumb"=>"https://loremflickr.com/320/240/food?random=1.jpg",
        //     "summary"=>"Đây là đoạn giới thiệu tóm tắt sản phẩm",
        //     "content"=>"Nội dung chính giới  thiệu về sản phẩm ",
        //     "price"=>100000,
        //     "price_format"=>"100.000 đ",
        //     "price_current"=>100000,
        //     "price_current_format"=>"100.000 đ",
        //     "quantity_input"=>100,
        //     "quantity_output"=>10,
        //     "discount"=>5,
        //     "brand"=>"Đà Lạt",
        //     "unit"=>"kg",
        //     "color"=>'',
        //     "slug"=>'food-'.random_int(1,1000)
        // ]);
        category::create(
            [
              "name"=>"Thịt bò kobe",
              "thumb"=>"https://loremflickr.com/320/240/food?random=1.jpg",
              "stt"=>1,
              "type"=>"combo",
              "category_group_id"=>1,
              "slug"=>Str::slug("thịt trứng")
            ]
        );
    }
}
