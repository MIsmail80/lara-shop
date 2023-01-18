<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'sku',
        'category_id',
    ];

    // Events
    protected static function booted()
    {
        static::created(function ($product) {
            $product->sku = rand(1000, 9999);
            $product->save();
        });
    }

    // Relations
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
