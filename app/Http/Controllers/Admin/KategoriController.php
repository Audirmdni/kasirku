<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;


class KategoriController extends Controller
{
    public function index()
    {
        $data['kategori'] = Kategori::all();
        return view('Admin.Kategori.index', $data);
    }

    public function store(Request $request)
    {
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->save();

        return redirect('admin/kategori')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function show($id)
    {
        $kategori = Kategori::find($id);

        return response()->json($kategori);
    }

    public function edit($id)
    {
        $data['kategori'] = Kategori::find($id);
        return view('Admin.Kategori.edit', $data);
    }

    public function update($kategori)
    {
        $kategori = Kategori::find($kategori);
        $kategori->nama_kategori = request('nama_kategori');
        $kategori->save();

        return redirect('admin/kategori')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
