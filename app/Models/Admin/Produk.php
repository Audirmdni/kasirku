<?php

namespace App\Models\Admin;




use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\DNS1D;
use App\Models\DetailPenjualan;



class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

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

    protected $casts = [
        'created_at' => 'datetime:d-m-Y H:i:s',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

  
    function detailPenjualan(){
        return $this->hasMany(DetailPenjualan::class, 'id_produk', 'id_produk');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');
    }

    public function generateBarcode()
    {
        return DNS1D::getBarcodePNGPath($this->kode_produk, 'C39', 3, 33, [1, 1, 1], true);
    }
}
