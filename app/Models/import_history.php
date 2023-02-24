<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class importHistory extends Model
{
    use HasFactory;
    public function product()
    {
       return $this->belongsTo(category::class,"product_id","id");
    }
    public function createdBy()
    {
       return $this->belongsTo(administrators::class,"created_by","id");
    }
    public function updatedBy()
    {
       return $this->belongsTo(administrators::class,"updated_by","id");
    }
}
