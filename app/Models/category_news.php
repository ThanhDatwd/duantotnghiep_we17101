<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
 

class category_news extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    
    protected $table="categories_news";
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function news()
    {
       return $this->hasMany(news::class,"category_new_id","id");
    }
}
