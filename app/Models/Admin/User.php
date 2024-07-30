<?php

namespace App\Models\Admin;

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;


class User extends Authenticatable
{

    protected $table = "user";


    public function setPasswordAttribute($value)
    {

        $this->attributes['password'] = bcrypt($value);
    }

    function handleUploadPoto()
    {
        $this->handleDeletePoto();
        if (request()->hasFile('foto')) {
            $foto = request()->file('foto');
            $destination = "user";
            $randomStr = Str::random(5);
            $filename = time() . "-"  . $randomStr . "."  . $foto->extension();
            $url = $foto->storeAs($destination, $filename);
            $this->foto = "app/" . $url;
            $this->save();
        }
    }

    function handleDeletePoto()
    {
        $foto = $this->foto;
        if ($foto) {
            $path = public_path($foto);
            if (file_exists($path)) {
                unlink($path);
            }
            return true;
        }
    }
}
