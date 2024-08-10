<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function LoginProses()
    {
        if (auth()->guard('admin')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect('admin')->with('success', 'Login Berhasil');
        }else if (auth()->guard('kasir')->attempt(['username' => request('username'), 'password' => request('password')])) {
            return redirect('kasir/beranda')->with('success', 'Berhasil Login');
        }else{
            return back()->withErrors([
                'login gagal, silahkan coba lagi',
        ]);

        }
      
    }

    public function logout(Request $request)
    {

        auth()->guard('admin')->logout();

        return redirect('/login');
    }
}
