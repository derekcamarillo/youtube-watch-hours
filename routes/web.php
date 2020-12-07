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

Route::get('/', "HomeController@view_home")->name('home');

Route::get('/lottery/test', "HomeController@test_award");

Route::get('/admin', "AdminController@view_dashboard")->name('admin.dashboard');
Route::get('/admin/users', "AdminController@view_users")->name('admin.users');
Route::get('/admin/orders', "AdminController@view_orders")->name('admin.orders');
Route::get('/admin/tickets', "AdminController@view_tickets")->name('admin.tickets');
Route::post('/admin/tickets', "AdminController@do_read_tickets")->name('admin.tickets.read');

Route::get('how-it-works', "HomeController@view_howitworks")->name('how-it-works');
Route::get('faq', "HomeController@view_faq")->name('faq');
//Route::get('shop', "HomeController@view_shop")->name('shop');
Route::get('contact-us', "HomeController@view_contactus")->name('contact-us');
Route::post('contact-us', "HomeController@do_contactus")->name('contact-us');
Route::get('terms', "HomeController@view_terms")->name('terms');

//Route::get('payment/success', "OrderController@payment_success")->name('payment.success');
//Route::get('payment/cancel', "OrderController@payment_cancel")->name('payment.cancel');

Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('dashboard', "DashboardController@view_dashboard")->name('dashboard');

    //Route::get('promote-video', "DashboardController@view_promote_video")->name('promote-video');
    //Route::get('my-video', "DashboardController@view_my_video")->name('my-video');
    Route::get('watch', "DashboardController@view_watch_list")->name('watch.list');
    Route::get('watch/{order}', "DashboardController@view_watch")->name('watch');
    Route::post('watch/finish/{order}', "OrderController@do_finish_watch")->name('watch.finish');
    Route::get('referral', "DashboardController@view_referral")->name('referral');
    Route::get('withdraw', "DashboardController@view_withdraw")->name('withdraw');
    Route::post('withdraw', "DashboardController@do_withdraw")->name('withdraw');
    //Route::get('wheel', "DashboardController@view_wheel")->name('wheel');
    //Route::post('wheel/prize', "DashboardController@do_prize")->name('wheel.prize');
    Route::get('lottery', "DashboardController@view_lottery")->name('lottery');
    Route::post('lottery', "DashboardController@do_buy_ticket")->name('lottery');

    //Route::post('/order', "OrderController@create")->name('order.create');
    //Route::get('/order/{order}', "OrderController@show")->name('order.show');
    //Route::post('/order/watch', "OrderController@watch")->name('order.watch');
});