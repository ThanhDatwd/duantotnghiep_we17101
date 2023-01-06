<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_group extends Model
{
    use HasFactory;
    protected $table="category_group";
    public function categories()
    {
        return $this->hasMany(category::class,"category_group_id","id");
    }
}
