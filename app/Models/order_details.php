<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;


class order_details extends Model
{   
    protected $table="order_details";
    use HasFactory;

    public function order()
    {
        return $this->belongsTo(order::class,"order_id","id");
    }
   
}
