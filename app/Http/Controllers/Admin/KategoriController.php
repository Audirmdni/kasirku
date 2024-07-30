<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;


class KategoriController extends Controller
{
    public function index()
    {
        return view('Admin.Kategori.index');
    }
    function create()
    {
        return view('Admin.Kategori.create');
    }
    function store()
    {
        return view('Admin.Kategori.create');
    }
}
