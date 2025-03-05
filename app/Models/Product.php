<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code_product', 'image', 'name', 'description', 'category_id', 'harga', 'status'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
