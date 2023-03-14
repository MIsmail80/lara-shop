<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slide extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'photo',
        'active',
        'product_id',
    ];

    // Relations

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
