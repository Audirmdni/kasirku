<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirHomeController extends Controller
{
    function index(){
        return view('kasir.dashboard.index');
    }
}
