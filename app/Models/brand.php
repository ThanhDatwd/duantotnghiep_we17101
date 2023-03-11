<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class brand extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table="brands";
    protected $fillable = [
        'id',
        'brands',
        'avatar',
        'phone',
        // 'importer',
        'address',
        'email',
        
    ];
}
