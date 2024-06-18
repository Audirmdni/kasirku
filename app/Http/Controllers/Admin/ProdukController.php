<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Kategori;
use Illuminate\Http\Request;
use App\Models\Admin\Produk;
use App\Models\MOdels\Produk as MOdelsProduk;

class ProdukController extends Controller
{
    function index()
    {
        $data['list_produk'] = Produk::all();
        return view('Admin.Produk.index', $data);
    }
    function create()
    {
        $kategoris = Kategori::all();
        return view('Admin.Produk.create', compact('kategoris'));
    }
    function store(Request $request)
    {
        $produk = new Produk();
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->kategori;
        $produk->harga_dasar = $request->harga_dasar;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->save();

        return redirect('Produk')->with('success', 'Data Berhasil Ditambahkan');
    }
}
