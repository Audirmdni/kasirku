<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdukTable extends Migration
{
    public function up()
    {
        Schema::create('produk', function (Blueprint $table) {
            $table->char('id_produk', 36);
            $table->char('id_kategori', 36);
            $table->string('nama_produk', 255)->unique();
            $table->string('kode_produk', 255);
            $table->integer('stok');
            $table->integer('harga_beli');
            $table->integer('harga_jual');
            $table->integer('diskon')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('produk');
    }
}
