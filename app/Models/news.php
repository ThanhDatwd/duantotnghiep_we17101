<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;

    public function category_news()
    {
        return $this->belongsTo(news::class,"category_new_id","id");
    }
}
