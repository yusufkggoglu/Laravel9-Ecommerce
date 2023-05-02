<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    # many to one
    public function sizes()
    {
        return $this->belongsTo(Size::class);
    }
    # many to one
    public function products()
    {
        return $this->belongsTo(Product::class);
    }
}
