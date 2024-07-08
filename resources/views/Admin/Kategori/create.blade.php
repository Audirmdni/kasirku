<x-admin>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-4">
                <div class="card">
                    <div class="card-header text-center">
                        <strong style="font-size: 14px;">Tambah Kategori</strong>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('produk') }}">
                            <!-- Input Kategori -->
                            <div class="row mb-2">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kategori" class="control-label" style="font-size: 14px;">Kategori</label>
                                        <select class="form-control" id="kategori" name="kategori" style="font-size: 12px;">
                                            <option value="">Pilih Kategori</option>
                                            <option value="makanan">Makanan</option>
                                            <option value="minuman">Minuman</option>
                                            <option value="snack">Snack</option>
                                        </select>
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