<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory,SoftDeletes;
    use Sluggable;
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function category()
    {
       return $this->belongsTo(category::class,"category_id","id");
    }
    public function products_images()
    {
        return $this->hasMany(product_images::class,"product_id","id");
    }
    public function history()
    {
        return $this->hasMany(importHistory::class,"product_id","id");
    }
}

