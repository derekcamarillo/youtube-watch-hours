<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function view_home() {
        return view('home');
    }

    public function view_howitworks() {
        return view('howitworks');
    }

    public function view_faq() {
        return view('faq');
    }

    public function view_shop() {
        return view('shop');
    }

    public function view_contactus() {
        return view('contactus');
    }

    public function view_terms() {
        return view('terms');
    }
}
