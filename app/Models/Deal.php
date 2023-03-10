<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'amount',
        'duration',
        'started_at',
        'end_at',
        'active',
        'product_id',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'end_at' => 'datetime',
    ];

    // Relations

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
