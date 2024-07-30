<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kasir;
use Illuminate\Http\Request;

class KasirController extends Controller
{

    public function index()
    {
        $data['list_kasir'] = Kasir::all();

        return view('Admin.Kasir.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $kasir = new Kasir();
        $kasir->nama = request('nama');
        $kasir->username = request('username');
        $kasir->password = request('password');
        $kasir->handleUploadPoto();

        $kasir->save();

        return redirect('admin/kasir')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update($kasir)
    {
        $kasir = Kasir::find($kasir);
        $kasir->nama = request('nama');
        $kasir->username = request('username');
        if (request('password')) $kasir->password = request('password');
        $kasir->handleUploadPoto();

        $kasir->save();

        return redirect('admin/kasir')->with('success', 'Data Berhasil Diedit');
    }


    public function destroy($kasir)
    {
        $kasir = Kasir::find($kasir);
        $kasir->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
