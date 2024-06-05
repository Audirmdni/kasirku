<?php

namespace App\Models\Admin;

use App\Models\Admin\Produk as AdminProduk;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    public function produks()
    {
        return $this->hasMany(AdminProduk::class, 'kategori_id');
    }
}
