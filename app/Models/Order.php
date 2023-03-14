<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    const STATUS_NEW = 1;
    const STATUS_IN_PROGREE = 2;
    const STATUS_SHIPPED = 3;
    const STATUS_PAID = 4;
    const STATUS_CANCELED = 5;

    const PAYMENT_CASH_ON_DELVIRY = 1;
    const PAYMENT_PAYPAL = 2;

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
        'coupon_id',
    ];

    protected $appends = ['status_text', 'payment_method_text'];

    protected function statusText(): Attribute
    {
        return new Attribute(
            get: function () {
                switch($this->status){
                    case self::STATUS_NEW:
                        return 'New Order';
                    case self::STATUS_IN_PROGREE:
                        return 'Preparing Order';
                    case self::STATUS_SHIPPED:
                        return 'Order Shipped';
                }
            },
        );
    }

    protected function paymentMethodText(): Attribute
    {
        return new Attribute(
            get: function () {
                switch($this->payment_method){
                    case self::PAYMENT_CASH_ON_DELVIRY:
                        return 'Cash on delviry';
                    case self::PAYMENT_PAYPAL:
                        return 'PayPal';
                }
            },
        );
    }

    // Relations

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class)
                    ->withPivot(['quantity', 'price', 'total']);
    }
}
