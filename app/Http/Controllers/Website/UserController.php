<?php

namespace App\Http\Controllers\Website;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getProfile()
    {
        return view('website.user.profile');
    }

    public function postProfile()
    {
        request()->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore(auth()->id()),
            ],
        ]);

        $user = auth()->user()->update(request()->all());

        if($user){
            return back()->with('success', 'Profile has been updated successfully.');
        }

        return back()->with('error', 'Error happened, please try again.');
    }

    public function getChangePassword()
    {
        return view('website.user.change_password');
    }

    public function postChangePassword()
    {
        request()->validate([
            'password' => 'required|confirmed',
        ]);

        $user = auth()->user()->update(request()->all());

        if($user){
            return back()->with('success', 'Password has been updated successfully.');
        }

        return back()->with('error', 'Error happened, please try again.');
    }

    public function getOrders()
    {
        $orders = auth()->user()->orders;

        $orders->load('products');

        return view('website.user.orders', compact('orders'));
    }

}
