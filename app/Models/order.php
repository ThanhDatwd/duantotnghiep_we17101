<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class order extends Model
{   
    protected $table="orders";
    use HasFactory;
    
    public function order_details()
    {
        return $this->hasMany(order_details::class,"order_id","id");
    }
    public function user()
    {
       return $this->belongsTo(user::class,"user_id","id");
    }
}
