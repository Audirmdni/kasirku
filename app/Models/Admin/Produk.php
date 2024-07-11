<?php

namespace App\Models\Admin;

<<<<<<< HEAD
=======
<<<<<<< HEAD
<<<<<<< HEAD

>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Milon\Barcode\DNS1D;
<<<<<<< HEAD
=======
use App\Models\Model;
use App\Models\Admin\Kategori;
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> parent of a7ad9c9 (update admin baru)
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> parent of a7ad9c9 (update admin baru)
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d

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
<<<<<<< HEAD
<<<<<<< HEAD
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
<<<<<<< HEAD
=======
        'id_kategori', 'nama_produk', 'stok', 'harga_dasar', 'harga_jual', 'diskon',
=======
=======
>>>>>>> parent of a7ad9c9 (update admin baru)
    ];
>>>>>>> parent of a7ad9c9 (update admin baru)

>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
    ];

    public function kategori()
    {
<<<<<<< HEAD
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->timezone('Asia/Jakarta')->format('d-m-Y H:i:s');
    }

    public function generateBarcode()
    {
        return DNS1D::getBarcodePNGPath($this->kode_produk, 'C39', 3, 33, [1, 1, 1], true);
=======
<<<<<<< HEAD
        return $this->belongsTo(Kategori::class, 'id_kategori');
=======
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
>>>>>>> parent of a7ad9c9 (update admin baru)
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
    }
}
