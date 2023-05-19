<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Collection;
use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'keywords', 'description','image','status','price','detail','category_id'
    ];

    # many to one
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function collection()
    {
        return $this->belongsTo(Collection::class);
    }
    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }
}
