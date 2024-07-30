<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPenjualan;

class Penjualan extends Model
{
    use HasFactory;

    protected $table = 'penjualan';

    protected $primaryKey = 'id_penjualan';
    public $incrementing = true;

    protected $fillable = [
        'no_nota',
        'total_harga',
        'diskon',
        'bayar',
        'diterima',
        'id_user',
     
    ];

    public function detailPenjualan(){
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan', 'id_penjualan');
    }
}
