<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', "HomeController@dashboard")->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/order/{order}', "OrderController@show")->name('order.show');
Route::middleware(['auth:sanctum', 'verified'])->post('/order/watch', "OrderController@watch")->name('order.watch');