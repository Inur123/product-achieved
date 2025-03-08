<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['code_product', 'image', 'name', 'description', 'category_id', 'harga', 'status', 'slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function promotions()
    {
        return $this->hasOne(Promotion::class);
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class)
            ->withPivot('quantity', 'price') // Include additional columns from pivot table
            ->withTimestamps();
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->name);
        });

        static::deleting(function ($product) {
            // Hapus semua promosi terkait sebelum produk dihapus
            $product->promotions()->delete();
        });
    }

    public function coupons()
{
    return $this->belongsToMany(Coupon::class, 'coupon_product');
}
}
