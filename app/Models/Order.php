<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'payment_status',
        'payment_method',
        'address',
        'notes',
        'subtotal',
        'vat',
        'total',
        'user_id',
    ];

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot(['quantity', 'price', 'total']);
    }
}
