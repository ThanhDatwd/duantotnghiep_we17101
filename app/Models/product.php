<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class product extends Model
{
    use HasFactory;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function categories()
    {
       return $this->belongsToMany(category::class,"category_product","product_id","category_id","id","id");
    }
    public function products_images()
    {
        return $this->hasMany(product_images::class,"product_id","id");
    }
}

