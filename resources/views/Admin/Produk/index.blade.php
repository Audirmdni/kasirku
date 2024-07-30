<x-admin>
    <style>
        .btn-custom-color {
            background-color: #526D82;
            color: #FFFFFF;
        }

        .btn-custom-color:hover {
            background-color: #758694;
            color: #FFFFFF;
        }

        .pagination .page-link {
            color: #526D82;
        }

        .pagination .page-link:hover {
            color: #FFFFFF;
            background-color: #526D82;
        }

        .pagination .page-item.active .page-link {
            background-color: #526D82;
            border-color: #526D82;
        }
    </style>

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!-- Header content -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold; font-size: 18px;">DAFTAR PRODUK</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-custom-color" onclick="printBarcodes()">
                                    <i class="fa fa-print"></i> <span class="font-weight-bold">Cetak Barcode</span>
                                </button>

                                <!-- Cetak Barcode -->
                                <div id="barcodeArea" style="display: none;">
                                    <div style="text-align: center; display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                                        @foreach($produk as $prod)
                                        <div style="border-bottom: 2px solid #000; padding-bottom: 10px;">
                                            <h4>{{ $prod->nama_produk }}</h4>
                                            <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($prod->kode_produk, 'C39') }}" alt="Barcode">
                                            <p>{{ $prod->kode_produk }}</p>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahprodukModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>

                        <!-- Tampilkan Data dan Pencarian -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">AKSI</th>
                                            <th class="text-center">KODE PRODUK</th>
                                            <th>NAMA PRODUK</th>
                                            <th>KATEGORI</th>
                                            <th>HARGA BELI</th>
                                            <th>HARGA JUAL</th>
                                            <th class="text-center">DISKON</th>
                                            <th class="text-center">STOK</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($produk as $index => $prod)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatprodukModal{{$prod->id_produk}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editprodukModal{{$prod->id_produk}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('admin/produk', $prod->id_produk) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center"><span class="badge badge-success">{{ $prod->kode_produk }}</span></td>
                                            <td>{{ $prod->nama_produk }}</td>
                                            <td>{{ $prod->kategori->nama_kategori }}</td>
                                            <td>Rp {{ number_format($prod->harga_beli, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($prod->harga_jual * (100 - $prod->diskon) / 100, 0, ',', '.') }}</td>
                                            <td class="text-center">{{ $prod->diskon }}%</td>
                                            <td class="text-center">{{ $prod->stok }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Tambah Produk Modal -->
    <div class="modal fade" id="tambahprodukModal" tabindex="-1" role="dialog" aria-labelledby="tambahprodukModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="tambahprodukModalLabel" style="font-weight: bold;">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/produk') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk" placeholder="Masukkan Kode Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}">{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="harga_beli">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="harga_jual">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="diskon">Diskon (%)</label>
                                <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan Diskon Produk">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Produk" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-md btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Produk Modal -->
    @foreach($produk as $prod)
    <div class="modal fade" id="editprodukModal{{ $prod->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="editprodukModalLabel{{ $prod->id_produk }}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="editprodukModalLabel{{ $prod->id_produk }}" style="font-weight: bold;">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/produk', $prod->id_produk) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ $prod->kode_produk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Nama Produk</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ $prod->nama_produk }}" required>
                        </div>
                        <div class="form-group">
                            <label for="id_kategori">Kategori</label>
                            <select class="form-control" id="id_kategori" name="id_kategori" required>
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}" {{ $kat->id_kategori == $prod->id_kategori ? 'selected' : '' }}>
                                    {{ $kat->nama_kategori }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="harga_beli">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="{{ $prod->harga_beli }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="harga_jual">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="{{ $prod->harga_jual }}" required>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="diskon">Diskon (%)</label>
                                <input type="text" class="form-control" id="diskon" name="diskon" value="{{ $prod->diskon }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" value="{{ $prod->stok }}" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-md btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- Lihat Produk Modal -->
    @foreach($produk as $prod)
    <div class="modal fade" id="lihatprodukModal{{$prod->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="lihatprodukModalLabel{{$prod->id_produk}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatprodukModalLabel{{$prod->id_produk}}" style="font-weight: bold;">Lihat Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <dl class="row">
                        <dt class="col-sm-4">Kode Produk:</dt>
                        <dd class="col-sm-8">{{ $prod->kode_produk }}</dd>
                        <dt class="col-sm-4">Nama Produk:</dt>
                        <dd class="col-sm-8">{{ $prod->nama_produk }}</dd>
                        <dt class="col-sm-4">Kategori:</dt>
                        <dd class="col-sm-8">{{ $prod->kategori->nama_kategori }}</dd>
                        <dt class="col-sm-4">Harga Beli:</dt>
                        <dd class="col-sm-8">Rp {{ number_format($prod->harga_beli, 0, ',', '.') }}</dd>
                        <dt class="col-sm-4">Harga Jual:</dt>
                        <dd class="col-sm-8">Rp {{ number_format($prod->harga_jual * (100 - $prod->diskon) / 100, 0, ',', '.') }}</dd>
                        <dt class="col-sm-4">Diskon:</dt>
                        <dd class="col-sm-8">{{ $prod->diskon }}%</dd>
                        <dt class="col-sm-4">Stok:</dt>
                        <dd class="col-sm-8">{{ $prod->stok }}</dd>
                    </dl>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-admin>