<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Supplier;

class SupplierController extends Controller
{
    public function index()
    {
        $data['supplier'] = Supplier::all();
        return view('Admin.supplier.index', $data);
    }

    public function store(Request $request)
    {
        $supplier = new Supplier();
        $supplier->nama_supplier = $request->nama_supplier;
        $supplier->alamat_supplier = $request->alamat_supplier;
        $supplier->telepon = $request->telepon;
        $supplier->save();

        return redirect('admin/supplier')->with('success', 'Data Berhasil Ditambahkan');
    }
    public function edit($id)
    {
        $data['supplier'] = Supplier::find($id);
        return view('Admin.Supplier.edit', $data);
    }

    public function update($supplier)
    {
        $supplier = Supplier::find($supplier);
        $supplier->nama_supplier = request('nama_supplier');
        $supplier->alamat_supplier = request('alamat_supplier');
        $supplier->telepon = request('telepon');
        $supplier->save();

        return redirect('admin/supplier')->with('success', 'Data Berhasil Diperbaharui');
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
