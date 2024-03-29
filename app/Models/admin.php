<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table= "administrators";
    public function historyCreateProduct()
    {
        return $this->hasMany(importHistory::class,"created_by","id");
    }
    public function historyUpdateProduct()
    {
        return $this->hasMany(importHistory::class,"updated_by","id");
    }
}
