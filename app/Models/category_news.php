<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_news extends Model
{
    use HasFactory;
    protected $table="categories_news";
    public function news()
    {
       return $this->hasMany(news::class,"category_new_id","id");
    }
}
