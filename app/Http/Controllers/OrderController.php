<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $response = array();
        try {
            $this->validate($request, [
                'link' => 'required|url',
                'quantity' => 'required|integer|min:1',
                'seconds' => 'required|integer|in:30,60,90',
                //'api-key' => 'required'
            ]);

            $order = new Order();
            $order->fill($request->all());
            $order->save();

            $response['status'] = true;
            $response['data'] = $order->id;
            return response()->json($response);
        } catch (ValidationException $e) {
            $response['status'] = false;
            $response['error'] = $e->errors();
            return response()->json($response, Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
        return view('order.show', compact('order'));
    }

    public function watch(Request $request) {
        try {
            $this->validate($request, [
                'uid' => 'required'
            ]);

            $order = Order::where('uid', $request->uid)->firstOrFail();
            $order->status = config('constant.status.in_progress');
            $order->save();

            $user = Auth::user();
            $order->users()->attach($user);
            $user->coins = $user->coin + $order->seconds;
            $user->save();

            return response()->json([
                'status' => true,
                'data' => $order->remains,
                'message' => "Successfully recorded your watching seconds"
            ]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'error' => $e->errors()
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
