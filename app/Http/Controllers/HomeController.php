<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    public function dashboard() {
        $orders = Order::whereDoesntHave('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->orderByRaw("RAND()")->limit(12)->get();

        return view('dashboard', compact('orders'));
    }
}
