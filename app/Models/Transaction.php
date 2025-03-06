<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone', 'address', 'status', 'total_price', 'transaction_code', 'proof_of_payment'
    ];

    // Define many-to-many relationship with products
    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot('quantity', 'price') // Include additional columns from pivot table
                    ->withTimestamps();
    }
}
