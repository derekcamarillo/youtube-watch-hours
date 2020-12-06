<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 24.11.20
 * Time: 20:37
 */

namespace App\Http\Controllers;

use App\Models\Lottery;
use App\Models\Order;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function view_dashboard() {
        return view('dashboard');
    }

    public function view_promote_video() {
        return view('promote-video');
    }

    public function view_my_video() {
        return view('my-video');
    }

    public function view_watch_list() {
        $orders = Order::whereDoesntHave('visitors', function ($query) {
                $query->where('user_id', Auth::id());
            })->orderByRaw("RAND()")->limit(12)->get();

        return view('watch-list', compact('orders'));
    }

    public function view_watch($order) {
        $order = Order::findOrFail($order);

        return view('watch', compact('order'));
    }

    public function view_withdraw() {
        return view('withdraw', [
            'withdrawals' => Auth::user()->withdrawals
        ]);
    }

    public function do_withdraw(Request $request) {
        try {
            $this->validate($request, [
                'amount' => 'required|integer|max:'.Auth::user()->coin,
                'payment' => 'required',
                'description' => 'required'
            ]);

            $withdraw = new Withdrawal();
            $withdraw->fill($request->all());
            $withdraw->user()->associate(Auth::user());
            if ($withdraw->save()) {
                Auth::user()->coin = Auth::user()->coin - $request->amount;
                Auth::user()->save();

                return back()->with([
                    'success' => "Withdrawal Request Received"
                ]);
            } else {
                return back()->withErrors([
                    'error' => "Something Went Wrong"
                ]);
            }
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors());
        }
    }

    public function view_referral() {
        return view('referral');
    }

    public function view_wheel() {
        return view('wheel');
    }

    public function do_prize(Request $request) {
        $prize = 0;
        if ($request->prize == "10Coin") {
            $prize = 10;
        } else if ($request->prize == "20Coin") {
            $prize = 20;
        } else if ($request->prize == "40Coin") {
            $prize = 40;
        } else if ($request->prize == "60Coin") {
            $prize = 60;
        }

        Auth::user()->coin = Auth::user()->coin + $prize - 40;
        Auth::user()->spin_at = now();
        Auth::user()->save();

        return response()->json([
            'status' => true,
            'data' => "Successfully added your prize"
        ]);
    }

    public function view_lottery() {
        $wins = Lottery::where('winner', true)->withTrashed()->get();
        return view('lottery', compact('wins'));
    }

    public function do_buy_ticket() {
        if (Auth::user()->coin >= 10) { // check if user has sufficient coins to buy a ticket
            $lottery = new Lottery();
            $lottery->ticket = Str::random('16');
            $lottery->user()->associate(Auth::id());
            $lottery->save();

            Auth::user()->coin = Auth::user()->coin - 10;
            Auth::user()->save();

            return back()->with([
                'success' => "Successfully Purchased",
                'data' => $lottery->ticket
            ]);
        } else {
            return back()->withErrors([
                'error' => "Insufficient Coins"
            ]);
        }
    }
}