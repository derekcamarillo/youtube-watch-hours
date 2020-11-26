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

Route::get('how-it-works', "HomeController@view_howitworks")->name('how-it-works');
Route::get('faq', "HomeController@view_faq")->name('faq');
Route::get('shop', "HomeController@view_shop")->name('shop');
Route::get('contact-us', "HomeController@view_contactus")->name('contact-us');
Route::get('terms', "HomeController@view_terms")->name('terms');

Route::group([
    'middleware' => ['auth:sanctum', 'verified']
], function () {
    Route::get('dashboard', "DashboardController@view_dashboard")->name('dashboard');

    Route::get('promote-video', "DashboardController@view_promote_video")->name('promote-video');
    Route::get('watch', "DashboardController@view_watch")->name('watch');
    Route::get('referral', "DashboardController@view_referral")->name('referral');
    Route::get('withdraw', "DashboardController@view_withdraw")->name('withdraw');
    Route::get('wheel', "DashboardController@view_wheel")->name('wheel');
    Route::get('lottery', "DashboardController@view_lottery")->name('lottery');

    Route::get('/order/{order}', "OrderController@show")->name('order.show');
    Route::post('/order/watch', "OrderController@watch")->name('order.watch');
});