<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class category_group extends Model
{
    use HasFactory;
    use Sluggable;
    protected $table="category_group";
    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function categories()
    {
        return $this->hasMany(category::class,"category_group_id","id");
    }
    public function products()
    {
        return $this->hasManyThrough(product::class, category::class);
    }
}
