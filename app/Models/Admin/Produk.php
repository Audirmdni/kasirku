<?php

namespace App\Models\Admin;

use App\Models\Model;
use App\Models\Admin\Kategori;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [
        'id_kategori', 'nama_produk', 'stok', 'harga_dasar', 'harga_jual', 'diskon',
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
