<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected $appends = ['featured_photo'];

    protected function featuredPhoto(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->photos()->first()
                    ? asset($this->photos()->first()->path)
                    : asset('uploads/products/image-placeholder-base.png');
            },
        );
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
        );
    }

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

    public function cart()
    {
        return $this->belongsToMany(Cart::class);
    }

    public function comments()
    {
        return $this->belongsToMany(User::class)->withPivot(['rating', 'comment']);
    }

    public function deals()
    {
        return $this->hasMany(Deal::class);
    }
}
