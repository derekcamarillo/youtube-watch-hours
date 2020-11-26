<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 24.11.20
 * Time: 20:37
 */

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function view_dashboard() {
        return view('dashboard');
    }

    public function view_promote_video() {
        return view('promote-video');
    }

    public function view_watch() {
        $orders = Order::whereDoesntHave('users', function ($query) {
            $query->where('user_id', Auth::id());
        })->orderByRaw("RAND()")->limit(12)->get();

        return view('watch', compact('orders'));
    }

    public function view_withdraw() {
        return view('withdraw');
    }

    public function view_referral() {
        return view('referral');
    }

    public function view_wheel() {
        return view('wheel');
    }

    public function view_lottery() {
        return view('lottery');
    }
}