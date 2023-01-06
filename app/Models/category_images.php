<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category_images extends Model
{
    use HasFactory;
    public function category()
    {
        $this->belongsTo(category::class,"category_id","id");
    }
}
