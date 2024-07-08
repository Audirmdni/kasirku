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


    // Method untuk pencarian produk
    public function search(Request $request)
    {
        $search = $request->get('search');

        $data['produk'] = Produk::where('nama_produk', 'like', '%' . $search . '%')
            ->orWhere('kode_produk', 'like', '%' . $search . '%')
            ->with('kategori')
            ->paginate(10);

        $data['kategori'] = Kategori::all();
        $data['search'] = $search;

        return view('Admin.Produk.index', $data);
    }
    public function store(Request $request)
    {
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk,NULL,id_produk',
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'diskon' => 'required|numeric|min:0|max:100',
        ]);
    }

    public function create()
    {
        $kategoris = Kategori::all();
        return view('Admin.Produk.create', compact('kategoris'));
    }
    public function store(Request $request)
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
    public function edit()
    {
        $data['produk'] = Produk::find($id);
        if (!$data['produk']) {
            return redirect('Admin/Produk')->with('error', 'Produk tidak ditemukan');
        }
        $data['kategoris'] = Kategori::all();
        return view('Admin.Produk.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_produk' => 'required|unique:produk,kode_produk,' . $id . ',id_produk',
            'nama_produk' => 'required|string|max:255',
            'id_kategori' => 'required|exists:kategori,id_kategori',
            'harga_beli' => 'required|numeric|min:0',
            'harga_jual' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'diskon' => 'required|numeric|min:0|max:100',
        ]);

        $produk = Produk::find($id);
        if (!$produk) {
            return redirect('Admin/Produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->id_kategori = $request->id_kategori;
        $produk->harga_beli = $request->harga_beli;
        $produk->harga_jual = $request->harga_jual;
        $produk->stok = $request->stok;
        $produk->diskon = $request->diskon;
        $produk->save();

        return redirect('Admin/Produk')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if (!$produk) {
            return redirect('Admin/Produk')->with('error', 'Produk tidak ditemukan');
        }
        $produk->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
