<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function showDashboard()
    {
        return view('Admin.Dashboard.index');
    }

    public function index()
    {
        return view('admin.dashboard');
    }
}
