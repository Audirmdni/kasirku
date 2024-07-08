<?php

namespace App\Models\Admin;


use Illuminate\Support\Carbon;
use Milon\Barcode\DNS1D;
use App\Models\Model;
use App\Models\Admin\Kategori;

class Produk extends Model
{
    protected $table = 'produk';

    protected $fillable = [

        'kode_produk',
        'nama_produk',
        'id_kategori',
        'harga_beli',
        'harga_jual',
        'stok',
        'diskon',
        'created_at',
        'updated_at',
    ];

    public static $rules = [
        'kode_produk' => 'required|unique:produk,kode_produk',
        'nama_produk' => 'required',
        'id_kategori' => 'required',
        'harga_beli' => 'required|numeric',
        'harga_jual' => 'required|numeric',
        'diskon' => 'nullable|numeric',
        'stok' => 'required|numeric',
    ];

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
        'id_kategori', 'nama_produk', 'stok', 'harga_dasar', 'harga_jual', 'diskon',

    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');
    }

    public function generateBarcode()
    {
        return DNS1D::getBarcodePNGPath($this->kode_produk, 'C39', 3, 33, array(1, 1, 1), true);
    }
}
