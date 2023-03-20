<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Brands extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
            \DB::table('brands')->insert([
                ['brands' => 'Đà lạt','avatar'=>'ds','address'=>'Phạm văn chiêu','email'=>'Hoang@gmail.com','phone'=>'0253669958'],
                ['brands' => 'Hà nội','avatar'=>'ds','address'=>'Khu Văn an','email'=>'Chiu@gmail.com','phone'=>'0265666625'],
                ['brands' => 'An giang','avatar'=>'ds','address'=>'Nguyễn Quốc Toản','email'=>'Longssd@gmail.com','phone'=>'0236669665'],
                ['brands' => 'Hà giang','avatar'=>'ds','address'=>'Bùi Văn Nghủ','email'=>'Liiingn@gmail.com','phone'=>'0256866336'],
                ['brands' => 'Vĩnh long','avatar'=>'ds','address'=>'Trần Văn Bường','email'=>'Optdas@gmail.com','phone'=>'0115223669'],
                
            ]);
        
    }
}
