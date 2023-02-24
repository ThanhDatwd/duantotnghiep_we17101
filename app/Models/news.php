<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class news extends Model
{
    use HasFactory;
    protected $table = "news";
    use SoftDeletes;
    

    public function category_news()
    {
        return $this->belongsTo(news::class,"category_new_id","id");
    }
}
