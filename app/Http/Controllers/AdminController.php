<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 05.12.20
 * Time: 01:31
 */

namespace App\Http\Controllers;


use App\Models\Order;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function view_dashboard() {
        return view('admin.dashboard');
    }

    public function view_users() {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function view_orders() {
        $orders = Order::all();
        return view('admin.orders', compact('orders'));
    }

    public function view_tickets() {
        $tickets = Ticket::all();
        return view('admin.tickets', compact('tickets'));
    }

    public function do_read_tickets(Request $request) {
        $ticket = Ticket::find($request->ticket);

        $ticket->status = "read";
        $ticket->save();

        return back();
    }

    public function view_withdrawals() {
        $withdrawals = Withdrawal::all();

        return view('admin.withdrawals', compact('withdrawals'));
    }

    public function do_process_withdrawal(Request $request) {
        $withdrawal = Withdrawal::find($request->withdrawal);

        $withdrawal->status = "completed";
        $withdrawal->save();

        return back();
    }
}