<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class order_details extends Model
{   
    use HasFactory;
    public function order()
    {
        return $this->belongsToMany(order::class,"order_id","id");
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
    public function user()
    {
       return $this->belongsTo(user::class,"user_id","id");
    }
}
