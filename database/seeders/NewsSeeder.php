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
            $news->summary = "Cá bò nướng có thể nướng các kiểu như: Cá bò nướng muối ớt, cá bò nướng tiêu, cá bò nướng than, cá bò nướng giấy bạc, nướng lá chuối,…  Bên cạnh các món nướng là món lẩu cá bò, canh chua cá bò,…Là một loại cá ngon nên bất kỳ món ăn nào với loại cá này cũng đều thơm ngon khó cưỡng.";
            $news->content = "<h2>05 c&aacute;ch chế biến c&aacute; b&ograve; ngon nhất</h2>

            <p>Trước khi&nbsp;<strong>chế biến c&aacute; b&ograve;</strong>, bạn cần sơ chế c&aacute;. C&aacute; b&ograve; da nguy&ecirc;n con, l&agrave;m sạch (lột bỏ da, bỏ ruột) khi cần ăn c&oacute; thể lấy ra r&atilde; đ&ocirc;ng d&ugrave;ng ngay. T&ugrave;y sở th&iacute;ch v&agrave; khẩu vị m&agrave;&nbsp; mỗi gia đ&igrave;nh c&oacute; c&aacute;ch chế biến kh&aacute;c nhau nhưng ngon v&agrave; thơm nhất vẫn l&agrave; m&oacute;n nướng. C&aacute; b&ograve; nướng c&oacute; vị ngọt đậm đ&agrave;, hấp dẫn.</p>";
            $news->thumb = "thumb-$i.png";
            $news->category_news_id = 1;
            $news->save();
        }
    }
}
