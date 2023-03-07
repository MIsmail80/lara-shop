<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        $customers = User::with('orders')->where('type', 1)->paginate(10);

        return view('dashboard.customers.index', compact('customers'));
    }
}
