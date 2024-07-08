<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'supplier';
    protected $primaryKey = 'id_supplier';
    protected $fillable = [
        'nama_supplier', 'alamat_supplier', 'telepon',
    ];
}
