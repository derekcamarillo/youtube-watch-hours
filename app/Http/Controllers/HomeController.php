<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lottery;
use Illuminate\Validation\ValidationException;

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

    public function do_contactus(Request $request) {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'email|required',
                'message' => 'required'
            ]);

            Ticket::create($request->all());

            return back()->with([
                'success' => "We received your ticket"
            ]);
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function view_terms() {
        return view('terms');
    }

    public function test_award() {
        $count = Lottery::count();
        Lottery::orderByRaw("RAND()")->limit($count / 4)->update(['winner' => true]);
        Lottery::destroy(Lottery::all()->pluck('id'));
    }
}
