<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use App\Models\Coupon;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('website.checkout');
    }

    public function store()
    {
        $cart = auth()->user()->cart->products;

        $subtotal = 0;
        $products = [];
        foreach($cart as $product){
            $product->increment('sales');

            $productTotal = $product->price * $product->pivot->quantity;
            $subtotal += $productTotal;

            $products[$product->id] = [
                'quantity' => $product->pivot->quantity,
                'price' => $product->price,
                'total' => $productTotal,
            ];
        }

        // Check coupon
        if(session('coupon')){
            $coupon = Coupon::where('code', session('coupon'))->first();

            if($coupon->type == Coupon::TYPE_PERCENT){
                $discount = $subtotal * $coupon->discount / 100;
            }else{
                $discount = $coupon->discount;
            }

            $subtotal -= $discount;
        }

        $vat = $subtotal * 15 / 100;
        $total = $subtotal + $vat;

        $orderData = [
            'payment_method' => request()->payment_method,
            'address' => request()->address,
            'notes' => request()->notes,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $total,
            'user_id' => auth()->id(),
        ];

        if(isset($coupon)){
            $orderData['coupon_id'] = $coupon->id;
        }

        $newOrder = Order::create($orderData);

        if($newOrder){
            $newOrder->products()->sync($products);
            auth()->user()->cart->products()->detach();
        }

        return redirect('/complete-order');
    }

    public function completeOrder()
    {
        return view('website.complete_order');
    }

    public function applyCoupon()
    {
        $coupon = Coupon::where('code', request()->code)->first();

        if(! $coupon->active){
            return back()->with('coupon_error', 'Coupon is expired!');
        }

        if($coupon->type == Coupon::TYPE_PERCENT){
            $discount = request()->total * $coupon->discount / 100;
        }else{
            $discount = $coupon->discount;
        }

        session()->put('coupon', request()->code);

        return redirect('cart?code='. request()->code .'&discount='.$discount);
    }
}
