<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'discount_type',
        'discount_value',
        'start_date',
        'end_date',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function updateStatus()
    {
        $now = Carbon::now();

        // Update status based on the current date
        if ($now->between($this->start_date, $this->end_date)) {
            $this->status = 'active';
        } else {
            $this->status = 'expired';
        }

        $this->save();
    }

}
