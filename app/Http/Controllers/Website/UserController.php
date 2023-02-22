<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function getProfile()
    {
        return view('website.user.profile');
    }

    public function getOrders()
    {
        return view('website.user.orders');
    }
}
