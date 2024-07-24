<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Penjualan;
use App\Models\Admin\Produk;


class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'sale_details';

    protected $fillable = [
        'id_penjualan',
        'id_produk',
        'quantity', 
        'price',
    ];  

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'id_penjualan');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
