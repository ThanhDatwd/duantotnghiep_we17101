<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class news extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;
    
    protected $table = "news";
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function category_news()
    {
        return $this->belongsTo(news::class,"category_new_id","id");
    }
    public function comments()
    {
        return $this->hasMany(comment::class,"news_id","id");
    }
}
