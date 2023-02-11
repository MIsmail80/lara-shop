<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'price',
        'stock',
        'description',
        'category_id',
        'sku',
    ];

    //appends to retrieve the first photo form relation between product and photo
    protected $appends = [ 'featured_photo' ] ;

    protected function featuredPhoto(): Attribute
    {
        return new Attribute(
            get:function (){
                return   $this->photos->first()
                ? asset($this->photos->first()->path)
                : asset('uploads/placeholder.png') ;
            }
        );
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "SAP $value",
        );
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

}
