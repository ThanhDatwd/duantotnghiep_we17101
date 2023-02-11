<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class category extends Model
{
    use HasFactory;
    protected $table="categories";
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function products()
    {
       return $this->hasMany(product::class,"category_id","id");
    }
    
    public function category_images()
    {
        return $this->hasMany(category_images::class,'category_id','id');
    }
    public function category_group()
    {
        return $this->belongsTo(category_group::class,"category_group_id","id");
    }
}
