<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;
    public function order()
    {
        return $this->belongsToMany(order::class,"order_id","id");
    }
}
