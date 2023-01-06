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
