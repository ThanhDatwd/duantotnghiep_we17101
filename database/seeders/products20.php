<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\category_group;
use App\Models\category_product;
use App\Models\product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class products20 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $group_category = ['Thịt Trưngs', 'Hải sản', 'Rau củ', 'Trái cây', 'Đồ khô', 'Gia vị'];
        $categories = [
            ['Thịt heo', 'Thịt Bò', 'Gà Vịt ...', 'Trứng các loại'],
            ['Cua', 'Tôm', 'Cá Các loại', 'Hải sản các loại'],
            ['Rau xanh các loại', 'củ quả tươi', 'Nấm các loại', 'Rau thơm'],
            ['Trái cây tươi', 'Trái cây khô', 'Trái cây đông lạnh'],
            ['Ngũ cốc 4 mùa', 'Hạt dinh dưỡng', 'Hoa quả sấy'],
            ['Muối Tiêu', 'Mắm các loại', 'Bơ, đường sữa', 'Hạt nêm, mì chính']
        ];
        
        $a=['Nho Mỹ nhập khẩu', 'Xoài Campuchia', 'Cóc Thái Lan'];

        $productsss = [
            [
                ['Ba chỉ heo', 'Thăn Heo', 'Tai Heo', 'Sườn non Heo'],
                ['Thăn lưng bò mỹ', 'sườn non bò mỹ', 'Lõi nạc vai bò mỹ', 'Bẹ vai bò mỹ', 'Ba chỉ bò'],
                ['Đùi Gà một Phần tư', 'Ức gà', 'Chân gà', 'Canh gà', 'Lòng gà'],
                ['Trứng gà', 'Trứng vịt', 'Trứng cút', 'Trứng vịt lộn', 'Trứng cút lộn'],
            ],
            [
                ['Cua Hoàn đế', 'Ghẹ Xanh sống', 'Cua Gạch cà mau'],
                ['Tôm hùm', 'Tôm Càng xanh', 'Tôm tích', 'Tôm xú'],
                ['Cá Tầm', 'Cá hú', 'Cá basa', 'Cá lóc', 'Cá trắm'],
                ['Ngao hai cồi sống', 'Bào ngư hàn quốc', 'Ốc hương', 'Cồi sò điệp'],
            ],
            [
                ['Rau xà lách', 'Rau mồng tơi', 'Rau cải thảo', 'Rau ngót', 'Rau muống'],
                ['Ớt chuông', 'Hành Tây', 'Bí', 'Bầu'],
                ['Nấm đùi gà', 'Nấm Hương', 'Nấm đông cô'],
                ['Rau mùi', 'Hành lá ', 'Rau ngò gai',]
            ],
            [
                ['Chanh vàng không hạt', 'Cam Hà Lan', 'Táo Mỹ Tho', 'Nho Ninh Thuận', 'Vú sữa Miền tây'],
                ['Hạt Óc chó', 'Hạt điều'],
                ['Nho Mỹ nhập khẩu', 'Xoài Campuchia', 'Cóc Thái Lan']
            ]

        ];
        $indexC = 0;
        $indexP = 0;
        $indexPC = 0;
        $indexCheck = 0;


        foreach ($a  as $p) {
            $thumb = random_int(1, 100) . '.jpg';
            product::create(
                [
                    "name" => $p,
                    "thumb" => "https://loremflickr.com/320/240/food?random=" . $thumb,
                    "summary" => "Đây là đoạn giới thiệu tóm tắt sản phẩm",
                    "content" => "Nội dung chính giới  thiệu về sản phẩm ",
                    "price" => rand(50000, 1000000),
                    "price_current" => 100000,
                    "quantity_input" => 100,
                    "quantity_output" => 10,
                    "discount" => random_int(0, 100),
                    "brand" => "Đà Lạt",
                    "unit" => "kg",
                    "color" => '',
                    "slug" => Str::slug($p),
                    "category_id" => 15,

                ]
            );
            $indexPC += 1;
        }


    //     // foreach ($group_category as $grC) {
    //     //     category_group::create([
    //     //         "name" => $grC,
    //     //         "thumb" => "https://loremflickr.com/320/240/food?random=1.jpg",
    //     //         "stt" => 1,
    //     //         "slug" => Str::slug($grC)
    //     //     ]);
    //     //     if ($indexC < (count($categories[$indexC]))) {
    //     //         foreach ($categories[$indexC] as $category) {
    //     //             category::create(
    //     //                 [
    //     //                     "category_name" => $category,
    //     //                     "thumb" => "https://loremflickr.com/320/240/food?random=1.jpg",
    //     //                     "stt" => 1,
    //     //                     "type" => 1,
    //     //                     "category_group_id" => ($indexC + 1),
    //     //                     "slug" => Str::slug($category)
    //     //                 ]
    //     //             );
                   
    //     //            if($indexP<(count($productsss[$indexC][$indexP])-1)){
    //     //              foreach ($productsss[$indexC][$indexP]  as $p) {
    //     //                 $thumb = random_int(1, 100) . '.jpg';
    //     //                 product::create(
    //     //                     [
    //     //                         "name" => $p,
    //     //                         "thumb" => "https://loremflickr.com/320/240/food?random=" . $thumb,
    //     //                         "summary" => "Đây là đoạn giới thiệu tóm tắt sản phẩm",
    //     //                         "content" => "Nội dung chính giới  thiệu về sản phẩm ",
    //     //                         "price" => rand(50000, 1000000),
    //     //                         "price_current" => 100000,
    //     //                         "quantity_input" => 100,
    //     //                         "quantity_output" => 10,
    //     //                         "discount" => random_int(0, 100),
    //     //                         "brand" => "Đà Lạt",
    //     //                         "unit" => "kg",
    //     //                         "color" => '',
    //     //                         "slug" => Str::slug($p),
    //     //                         "category_id" => ($indexP + 1),
    
    //     //                     ]
    //     //                 );
    //     //                 $indexPC += 1;
    //     //             }
    //     //             $indexP += 1;
    //     //         }
    //     //     }
    //     //     $indexP = 0;
    //     //     $indexC += 1;
    //     // }
    //     // foreach ($productsss[$indexC][$indexP]  as $p) {
    //     //     $thumb = random_int(1, 100) . '.jpg';
    //     //     product::create(
    //     //         [
    //     //             "name" => $p,
    //     //             "thumb" => "https://loremflickr.com/320/240/food?random=" . $thumb,
    //     //             "summary" => "Đây là đoạn giới thiệu tóm tắt sản phẩm",
    //     //             "content" => "Nội dung chính giới  thiệu về sản phẩm ",
    //     //             "price" => rand(50000, 1000000),
    //     //             "price_current" => 100000,
    //     //             "quantity_input" => 100,
    //     //             "quantity_output" => 10,
    //     //             "discount" => random_int(0, 100),
    //     //             "brand" => "Đà Lạt",
    //     //             "unit" => "kg",
    //     //             "color" => '',
    //     //             "slug" => Str::slug($p),
    //     //             "category_id" => ($indexP + 1),

    //     //         ]
    //     //     );
    //     //     $indexPC += 1;
    //     // }
    // }
}
}

