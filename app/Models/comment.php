<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $table="comments";

    public function author()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function news()
    {
        return $this->belongsTo(news::class,"news_id","id");
    }

}
