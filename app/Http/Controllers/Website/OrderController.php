<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use Illuminate\Http\Request;
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
            $productTotal = $product->price * $product->pivot->quantity;
            $subtotal += $productTotal;

            $products[$product->id] = [
                'quantity' => $product->pivot->quantity,
                'price' => $product->price,
                'total' => $productTotal,
            ];
        }
        $vat = $subtotal * 15 / 100;
        $total = $subtotal + $vat;

        $newOrder = Order::create([
            'payment_method' => request()->payment_method,
            'address' => request()->address,
            'notes' => request()->notes,
            'subtotal' => $subtotal,
            'vat' => $vat,
            'total' => $total,
            'user_id' => auth()->id(),
        ]);

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
}
