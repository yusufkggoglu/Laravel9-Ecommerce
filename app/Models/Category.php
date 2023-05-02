<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'keywords', 'description','image','status'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    #One To Many Iverse
    public function parent(){
        return $this->belongsTo(\App\Models\Category::class,'parent_id');
    }
    #One To Many
    public function children(){
        return $this->hasMany(\App\Models\Category::class,'parent_id');
    }
}
