<?php

namespace App\Http\Controllers\Kasir;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KasirTransaksiController extends Controller
{
    function  index(){
        return view('kasir.transaksi.index');
    }


    function create(){
        return view('kasir.transaksi.create');
    }
    function detail(){
        return view('kasir.transaksi.detail' );
    }
}
