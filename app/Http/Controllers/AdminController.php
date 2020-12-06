<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 05.12.20
 * Time: 01:31
 */

namespace App\Http\Controllers;


class AdminController extends Controller
{
    public function view_dashboard() {
        return view('admin.dashboard');
    }
}