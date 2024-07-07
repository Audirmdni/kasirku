<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    function showAdmin()
    {
        return view('welcome');
    }
}
