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
                            <h3 class="card-title" style="font-weight: bold; font-size: 18px;">DAFTAR PRODUK</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-success" onclick="printBarcodes()">
                                    <i class="fa fa-print"></i> <span class="font-weight-bold">Cetak Barcode</span>
                                </button>

                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahprodukModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <!-- Tampilkan Data dan Pencarian-->
                        <div class="card-body">
                            <div class="row mb-3 justify-content-between">
                                <div class="col-md-4">
                                    <div class="form-row align-items-center">
                                        <div class="col-auto">
                                            <span class="mr-2">Tampilkan:</span>
                                        </div>
                                        <div class="col-auto">
                                            <select class="form-control form-control-sm">
                                                <option>10</option>
                                                <option>25</option>
                                                <option>50</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                        <div class="col-auto">
                                            Data
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('admin.produk.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder="Cari produk..." name="search" value="{{ isset($search) ? $search : '' }}">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Cari</button>
                                                @if(isset($search))
                                                <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-danger">Reset</a>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Tabel Data Produk -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-left">
                                    <thead style="background-color: #d3d3d3; color: black; font-size: 14px;">
                                        <tr>
                                            <th class="text-center" style="width: 3%;">NO.</th>
                                            <th style="width: 10%;">KODE PRODUK</th>
                                            <th style="width: 15%;">NAMA PRODUK</th>
                                            <th style="width: 12%;">KATEGORI</th>
                                            <th style="width: 10%;">HARGA BELI</th>
                                            <th style="width: 10%;">HARGA JUAL</th>
                                            <th style="width: 5%;">DISKON</th>
                                            <th style="width: 5%;">STOK</th>
                                            <th style="width: 15%;">TANGGAL INPUT</th>
                                            <th class="text-center" style="width: 10%;">AKSI</th>
                                    </thead>
                                    <tbody>
                                        <!-- Isi data produk -->
                                        @foreach($produk as $index => $prod)
                                        <tr style="font-size: 14px;">
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td><span class="badge badge-success custom-badge">{{ $prod->kode_produk }}</span></td>
                                            <td>{{ $prod->nama_produk }}</td>
                                            <td>{{ $prod->kategori->nama_kategori }}</td>
                                            <td>Rp {{ number_format($prod->harga_beli, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($prod->harga_jual * (100 - $prod->diskon) / 100, 0, ',', '.') }}</td>
                                            <td>{{ $prod->diskon }}%</td>
                                            <td class="text-center">{{ $prod->stok }}</td>
                                            <td>{{ $prod->created_at}}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatprodukModal{{$prod->id_produk}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editprodukModal{{$prod->id_produk}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('Admin/Produk', $prod->id_produk) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="dataTables_info">Menampilkan 1 sampai 10 dari {{ $produk->count() }} entri</div>
                                </div>
                                <div class="col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers">
                                        <ul class="pagination justify-content-end">
                                            <li class="paginate_button page-item previous disabled"><a href="#" class="page-link">&lt;</a></li>
                                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                                            <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                                            <li class="paginate_button page-item next"><a href="#" class="page-link">&gt;</a></li>
                                        </ul>
                                    </div>
                                </div>
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
                    <form action="{{ url('Admin/Produk') }}" method="post">
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
    <div class="modal fade" id="editprodukModal{{$prod->id_produk}}" tabindex="-1" role="dialog" aria-labelledby="editprodukModalLabel{{$prod->id_produk}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editprodukModalLabel{{$prod->id_produk}}">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Admin/Produk', $prod->id_produk) }}" method="post">
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
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="edit_harga_beli{{$prod->id_produk}}">Harga Beli</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="edit_harga_beli{{$prod->id_produk}}" name="harga_beli" value="{{ $prod->harga_beli }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="edit_harga_jual{{$prod->id_produk}}">Harga Jual</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="edit_harga_jual{{$prod->id_produk}}" name="harga_jual" value="{{ $prod->harga_jual }}">
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="edit_diskon{{$prod->id_produk}}">Diskon (%)</label>
                                <input type="text" class="form-control" id="edit_diskon{{$prod->id_produk}}" name="diskon" value="{{ $prod->diskon }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="edit_stok{{$prod->id_produk}}">Stok</label>
                            <input type="text" class="form-control" id="edit_stok{{$prod->id_produk}}" name="stok" value="{{ $prod->stok }}">
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

    @push('scripts')
    <script>
        function printBarcodes() {
            alert('Mencetak barcodes...');
        }
    </script>
    @endpush
</x-admin>