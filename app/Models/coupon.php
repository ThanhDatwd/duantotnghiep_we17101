<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class coupon extends Model
{   
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = "id";
    protected $table="coupon";
    protected $fillable = [
        'coupon_code',
        'coupon_type',
        'description',
        'discount',
        'min_condition',
        'user_used',
        'limit_used',
        'is_active',
        'start_date',
        'end_date'
    ];
    }
