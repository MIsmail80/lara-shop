<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $products = auth()->user()->cart->products;

        return view('website.cart', compact('products'));
    }

    public function addToCart(Request $request)
    {
        $exists = false;

        $product = auth()->user()
        ->cart
        ->products()
        ->where('id', $request->product_id)
        ->first();

        if($product){
            $exists = true;
            $currentQuantity = $product->pivot->quantity;
            $newQuantity = $currentQuantity + $request->quantity;

            auth()->user()
            ->cart
            ->products()
            ->updateExistingPivot($request->product_id, [
                'quantity' => $newQuantity,
            ]);
        }else{
            auth()->user()
            ->cart
            ->products()
            ->attach(
                $request->product_id,
                ['quantity' => $request->quantity]
            );
        }

        $resp = [
            'exists' => $exists,
            'msg' => 'Product has been added successfully.',
        ];

        return response()->json($resp);
    }

    public function removeFromCart($productId)
    {
        auth()->user()
        ->cart
        ->products()
        ->detach($productId);

        return 'Product has been deleted successfully.';
    }

    public function update(Request $request)
    {
        $newQuantities = [];

        foreach($request->quantity as $pid => $q){
            $newQuantities[$pid] = ['quantity' => $q];
        }

        auth()->user()
        ->cart
        ->products()
        ->sync($newQuantities);

        return back();

    }
}
