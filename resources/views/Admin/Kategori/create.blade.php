<x-admin>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong style="font-size: 16px;">Tambah Kategori</strong>
                            <button class="btn btn-outline-secondary btn-sm" onclick="window.location.href='{{ url('Admin/Kategori'">
                                <i class="fa fa-times" style="color: black;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ url('produk') }}">
                                <!-- Input Kategori -->
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="kategori" class="control-label" style="font-size: 16px;">Kategori</label>
                                            <select class="form-control" id="kategori" name="kategori" style="font-size: 14px;">
                                                <option value="">Pilih Kategori</option>
                                                <option value="makanan">Makanan</option>
                                                <option value="minuman">Minuman</option>
                                                <option value="snack">Snack</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Tombol Simpan -->
                                <div class="row justify-content-end mt-4">
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