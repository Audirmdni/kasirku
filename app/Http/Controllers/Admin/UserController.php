<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data['list_user'] = User::all();

        return view('Admin.User.index', $data);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $user = new User();
        $user->nama = request('nama');
        $user->username = request('username');
        $user->password = request('password');
        $user->handleUploadPoto();

        $user->save();

        return redirect('admin/user')->with('success', 'Data Berhasil Ditambahkan');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update($user)
    {
        $user = User::find($user);
        $user->nama = request('nama');
        $user->username = request('username');
        if (request('password')) $user->password = request('password');
        $user->handleUploadPoto();

        $user->save();

        return redirect('admin/user')->with('success', 'Data Berhasil Diedit');
    }


    public function destroy($user)
    {
        $user = User::find($user);
        $user->delete();

        return back()->with('success', 'Data berhasil dihapus');
    }
}
