<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    function index()
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
