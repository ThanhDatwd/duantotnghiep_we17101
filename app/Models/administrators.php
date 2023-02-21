<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class administrators extends Model
{
    use HasFactory;
    public function historyCreateProduct()
    {
        return $this->hasMany(historyProduct::class,"created_by","id");
    }
    public function historyUpdateProduct()
    {
        return $this->hasMany(historyProduct::class,"updated_by","id");
    }
}
