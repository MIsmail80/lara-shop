<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends Model
{
    use HasFactory;

    const TYPE_PERCENT = 1;
    const TYPE_FIXED = 2;

    protected $fillable = [
        'code',
        'type',
        'discount',
        'active',
        'redeems',
    ];
}
