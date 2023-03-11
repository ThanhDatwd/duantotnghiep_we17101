<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{   
    protected $table="orders";
    use HasFactory;
    public function order_details()
    {
        return $this->hasMany(order_details::class,"order_id","id");
    }
}
