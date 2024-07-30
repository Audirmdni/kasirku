<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirLaporanController extends Controller
{
    function index(){
        return view('kasir.laporan.index');
    }
}
