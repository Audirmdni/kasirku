<x-admin>
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
                            <h3 class="card-title" style="font-weight: bold; margin-bottom: 0; font-size: 18px;">DAFTAR PRODUK</h3>
                            <div class="card-tools">
<<<<<<< HEAD
                                <button type="button" class="btn btn-md btn-success" onclick="printBarcodes()">
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
                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahprodukModal">
=======
                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahprodukModal">
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
<<<<<<< HEAD

                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">NO.</th>
                                            <th class="text-center">AKSI</th>
                                            <th width="15px" style="text-align: center;">KODE PRODUK</th>
                                            <th>NAMA PRODUK</th>
                                            <th>KATEGORI</th>
                                            <th>HARGA BELI</th>
                                            <th>HARGA JUAL</th>
                                            <th class="text-center">DISKON</th>
                                            <th>STOK</th>
=======
                            <!-- Pencarian -->
                            <div class="row mb-3 justify-content-end">
                                <div class="col-md-3">
                                    <form action="{{ url('Admin/Produk/search') }}" method="GET">
                                        <input type="text" class="form-control" style="font-size: 14px; padding: 5px;" placeholder="Pencarian..." name="keyword">
                                    </form>
                                </div>
                            </div>
                            <!-- Tabel Data Produk -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-left">
                                    <thead style="background-color: #008000; color: white; font-size: 14px;">
                                        <tr>
                                            <th style="width: 3%;">NO.</th>
                                            <th style="width: 10%;">KODE PRODUK</th>
                                            <th style="width: 20%;">NAMA PRODUK</th>
                                            <th style="width: 15%;">KATEGORI</th>
                                            <th style="width: 10%;">HARGA BELI</th>
                                            <th style="width: 10%;">HARGA JUAL</th>
                                            <th style="width: 5%;">DISKON</th>
                                            <th style="width: 5%;">STOK</th>
                                            <th style="width: 15%;">AKSI</th>
                                        </tr>
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
                                    </thead>
                                    <tbody>
                                        <!-- Isi data produk -->
                                        @foreach($produk as $index => $prod)
<<<<<<< HEAD
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="text-center">
=======
                                        <tr style="font-size: 14px;">
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $prod->kode_produk }}</td>
                                            <td>{{ $prod->nama_produk }}</td>
                                            <td>{{ $prod->kategori->nama_kategori }}</td>
                                            <td>{{ $prod->harga_beli }}</td>
                                            <td>{{ $prod->harga_jual }}</td>
                                            <td>{{ $prod->diskon }}%</td>
                                            <td>{{ $prod->stok }}</td>
                                            <td>
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editprodukModal{{$prod->id_produk}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
<<<<<<< HEAD
                                                    <form action="{{ url('admin/produk', $prod->id_produk) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
=======
                                                    <form action="{{ url('Admin/Produk', $prod->id_produk) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center"><span class="badge badge-success custom-badge">{{ $prod->kode_produk }}</span></td>
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
                <div class="modal-header" style="padding: 10px;">
                    <h5 class="modal-title w-100 text-center" id="tambahprodukModalLabel" style="font-size: 17px; font-weight: bold;">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true" style="color: white;">&times;</span>
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
                        <div class="form-group">
                            <label for="harga_beli">Harga Beli</label>
                            <input type="text" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_jual">Harga Jual</label>
                            <input type="text" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual" required>
                        </div>
                        <div class="form-group">
                            <label for="diskon">Diskon (%)</label>
                            <input type="text" class="form-control" id="diskon" name="diskon" placeholder="Masukkan Diskon Produk">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="text" class="form-control" id="stok" name="stok" placeholder="Masukkan Stok Produk" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-danger btn-xs" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success btn-xs">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Produk Modal -->
    @foreach($produk as $prod)
    <div class="modal fade" id="editprodukModal{{$prod->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="editprodukModalLabel{{$prod->id_produk}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editprodukModalLabel{{$prod->id_produk}}">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/produk', $prod->id_produk) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_produk">Kode Produk</label>
                            <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="{{ $prod->kode_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_nama_produk{{$prod->id_produk}}">Nama Produk</label>
                            <input type="text" class="form-control" id="edit_nama_produk{{$prod->id_produk}}" name="nama_produk" value="{{ $prod->nama_produk }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_id_kategori{{$prod->id_produk}}">Kategori</label>
                            <select class="form-control" id="edit_id_kategori{{$prod->id_produk}}" name="id_kategori">
                                @foreach($kategori as $kat)
                                <option value="{{ $kat->id_kategori }}" {{ $prod->id_kategori == $kat->id_kategori ? 'selected' : '' }}>{{ $kat->nama_kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit_harga_beli{{$prod->id_produk}}">Harga Beli</label>
                            <input type="text" class="form-control" id="edit_harga_beli{{$prod->id_produk}}" name="harga_beli" value="{{ $prod->harga_beli }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_harga_jual{{$prod->id_produk}}">Harga Jual</label>
                            <input type="text" class="form-control" id="edit_harga_jual{{$prod->id_produk}}" name="harga_jual" value="{{ $prod->harga_jual }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_diskon{{$prod->id_produk}}">Diskon (%)</label>
                            <input type="text" class="form-control" id="edit_diskon{{$prod->id_produk}}" name="diskon" value="{{ $prod->diskon }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_stok{{$prod->id_produk}}">Stok</label>
                            <input type="text" class="form-control" id="edit_stok{{$prod->id_produk}}" name="stok" value="{{ $prod->stok }}">
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<<<<<<< HEAD
<<<<<<< HEAD

    <!-- Lihat Produk Modal -->
    @foreach($produk as $prod)
    <div class="modal fade" id="lihatprodukModal{{$prod->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="lihatprodukModalLabel{{$prod->id_produk}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatprodukModalLabel{{$prod->id_produk}}" style="font-weight: bold;">Detail Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kode Produk</th>
                                <td><span class="badge badge-success">{{ $prod->kode_produk }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama Produk</th>
                                <td>{{ $prod->nama_produk }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $prod->kategori->nama_kategori }}</td>
                            </tr>
                            <tr>
                                <th>Harga Beli</th>
                                <td>Rp {{ number_format($prod->harga_beli, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Harga Jual</th>
                                <td>Rp {{ number_format($prod->harga_jual * (100 - $prod->diskon) / 100, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Diskon</th>
                                <td>{{ $prod->diskon }}%</td>
                            </tr>
                            <tr>
                                <th>Stok</th>
                                <td>{{ $prod->stok }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Input</th>
                                <td>{{ $prod->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Barcode</th>
                                <td class="text-center">
                                    <img src="data:image/png;base64,{{ DNS1D::getBarcodePNG($prod->kode_produk, 'C39') }}" alt="Barcode">
                                    <div>{{ $prod->kode_produk }}</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
<<<<<<< HEAD
=======

    @push('scripts')
    <script>
        function printBarcodes() {
            alert('Mencetak barcodes...');
        }
    </script>
    @endpush
=======
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
=======
>>>>>>> parent of a7ad9c9 (update admin baru)
=======
>>>>>>> parent of a7ad9c9 (update admin baru)
>>>>>>> ce999cdf3237bceaaf246b6adacd02f46923e14d
</x-admin>