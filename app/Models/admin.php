<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table= "administrators";
    protected $fillable = [
        'id',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function historyCreateProduct()
    {
        return $this->hasMany(importHistory::class,"created_by","id");
    }
    public function historyUpdateProduct()
    {
        return $this->hasMany(importHistory::class,"updated_by","id");
    }
}
