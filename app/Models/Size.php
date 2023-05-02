<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
    ];

     # many to one
     public function stocks()
     {
         return $this->hasMany(Stock::class);
     }
}
