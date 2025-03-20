<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'status',
        'total_price',
        'transaction_code',
        'proof_of_payment',
        'discount', // Pastikan discount ada di fillable
        'coupon_id', // Pastikan coupon_id ada di fillable
    ];

    // Relasi many-to-many dengan model Product
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'price') // Sertakan kolom tambahan dari tabel pivot
                    ->withTimestamps();
    }

    // Relasi many-to-one dengan model Coupon
    public function coupon()
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }


}
