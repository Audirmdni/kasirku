<x-admin>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mt-4">
                <div class=" card">
                    <div class="card-header text-center">
                        <strong style="font-size: 16px;">Tambah Data Produ</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('Produk/edit') }}">
                            @csrf
                            <!-- Input Kode Produk, Nama Produk dan Kategori -->
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_produk" class="control-label" style="font-size: 14px;">Kode Produk</label>
                                        <input type="text" class="form-control" id="kode_produk" name="kode_produk">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama_produk" class="control-label" style="font-size: 14px;">Nama Produk</label>
                                        <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kategori" class="control-label" style="font-size: 14px;">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori" style="font-size: 12px;">
                                            <option value="">Pilih Kategori</option>
                                            @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- Input Harga Dasar dan Harga Jual -->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_dasar" class="control-label" style="font-size: 14px;">Harga Dasar</label>
                                        <input type="text" class="form-control" id="harga_dasar" name="harga_dasar" step="0.01">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="harga_jual" class="control-label" style="font-size: 14px;">Harga Jual</label>
                                        <input type="text" class="form-control" id="harga_jual" name="harga_jual" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <!-- Input Stok dan Diskon -->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="stok" class="control-label" style="font-size: 14px;">Stok</label>
                                        <input type="number" class="form-control" id="stok" name="stok">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="diskon" class="control-label" style="font-size: 14px;">Diskon</label>
                                        <input type="text" class="form-control" id="diskon" name="diskon" step="0.01">
                                    </div>
                                </div>
                            </div>
                            <!-- Tombol Simpan dan Batal -->
                            <div class="row justify-content-end mt-3">
                                <div class="col-md-6 text-right">
                                    <button class="btn btn-danger mr-2 btn-sm">
                                        <i class="fa fa-times"></i> Batal
                                    </button>
                                    <button class="btn btn-success btn-sm">
                                        <i class="fa fa-save"></i> Simpan
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>