<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         for ($i = 1; $i <= 20; $i++) {
            $news = new News();
            $news->title = "Tin tức số $i";
            $news->summary = "Nội dung tóm tắt tin tức số $i";
            $news->content = "Nội dung chi tiết tin tức số $i";
            $news->thumb = "thumb-$i.png";
            $news->category_news_id = 1;
            $news->save();
    }
}
}
