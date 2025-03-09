<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount_type',
        'discount_value',
        'status',
        'limit',
        'code',
        'used'
    ];

    // Relasi many-to-many dengan Product
    public function products()
    {
        return $this->belongsToMany(Product::class, 'coupon_product');
    }
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
