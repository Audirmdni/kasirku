<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailPenjualan;

class Sale extends Model
{
    use HasFactory;

    

    protected $fillable = [
        'invoice_number',
        'total_amount',
        'sale_date',
    ];

    public function details()
    {
        return $this->hasMany(DetailPenjualan::class, 'id_penjualan');
    }
}