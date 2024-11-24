<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price', 'sale_price', 'image', 'category_id'];

    // A Product belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
