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
                ['brands' => 'Đà lạt'],
                ['brands' => 'Hà nội'],
                ['brands' => 'An giang'],
                ['brands' => 'Hà giang'],
                ['brands' => 'Vĩnh long']
                
            ]);
        
    }
}
