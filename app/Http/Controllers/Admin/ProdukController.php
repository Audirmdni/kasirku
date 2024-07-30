<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Produk;
use App\Models\Admin\Kategori;

class ProdukController extends Controller
{
    public function index()
    {
        $data['produk'] = Produk::all();
        $data['list_produk'] = Produk::all();
        $data['kategori'] = Kategori::all();
        return view('Admin.Produk.index', $data);
    }


    // Method untuk pencarian produk
    public function search(Request $request){
        
    }

    public function create()

    {
        $kategoris = Kategori::all();
        return view('Admin.Produk.create', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'diskon' => 'required',
        ]);

        $produk = new Produk();
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->save();

        return redirect('admin/produk')->with('success', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data['produk'] = Produk::find($id);
        if (!$data['produk']) {
            return redirect('admin/produk')->with('error', 'Produk tidak ditemukan');
        }
        $data['kategoris'] = Kategori::all();
        return view('Admin.Produk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'id_kategori' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'diskon' => 'required',
        ]);

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect('admin/produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->save();

        return redirect('admin/produk')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect('admin/produk')->with('error', 'Produk tidak ditemukan');
        }
        $produk->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
