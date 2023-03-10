<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user');

        if(request()->status){
            $orders = $orders->where('status', request()->status);
        }

        if(request()->payment_method){
            $orders = $orders->where('payment_method', request()->payment_method);
        }

        if(request()->order_date){
            $orders = $orders->whereDate('created_at', request()->order_date);
        }

        $orders = $orders->latest()->paginate(10);

        request()->flash();

        return view('dashboard.orders.index', compact('orders'));
    }
}
