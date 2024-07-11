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
                            <h3 class="card-title" style="font-weight: bold; font-size: 18px;">DAFTAR KASIR</h3>
                            <div class="card-tools">

                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahprodukModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <!-- Tampilkan Data dan Pencarian-->
                        <div class="card-body">

                            <!-- Tabel Data Produk -->
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%;">No.</th>
                                            <th class="text-center">Aksi</th>
                                            <th class="text-center">Nama Kasir</th>
                                            <th class="text-center">Poto</th>

                                    </thead>
                                    <tbody>
                                        <!-- Isi data produk -->
                                        @foreach($list_kasir as $kasir)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatprodukModal{{$kasir->id}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editprodukModal{{$kasir->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('admin/kasir', $kasir->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$kasir->nama}}</td>
                                            <td class="text-center">
                                                <img src="{{ url("public/$kasir->poto") }}" style="width:30%; height:30%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- Pagination -->

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
                    <h5 class="modal-title w-100 text-center" id="tambahprodukModalLabel" style="font-weight: bold;">Tambah Data Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/kasir') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_produk">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kasir" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                        </div>


                        <div class="form-group">
                            <label for="stok">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan" required>
                        </div>

                        <div class="form-group">
                            <label for="stok">Poto</label>
                            <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Batal</button>
                            <button class="btn btn-md btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Produk Modal -->
    @foreach($list_kasir as $kasir)
    <div class="modal fade" id="editprodukModal{{$kasir->id}}" tabindex="-1" role="dialog" aria-labelledby="editprodukModalLabel{{$kasir->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editprodukModalLabel{{$kasir->id}}">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/kasir', $kasir->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_produk">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="{{$kasir->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Username</label>
                            <input type="text" class="form-control" name="username" value="{{$kasir->username}}">
                        </div>


                        <div class="form-group">
                            <label for="stok">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>

                        <div class="form-group">
                            <label>Poto</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url("public/$kasir->poto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                </div>
                                <div class="col-md-6">

                                    <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
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
    @foreach($list_kasir as $kasir)
    <div class="modal fade" id="lihatprodukModal{{$kasir->id}}" tabindex="-1" role="dialog" aria-labelledby="lihatprodukModalLabel{{$kasir->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatprodukModalLabel{{$kasir->id}}" style="font-weight: bold;">Detail Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <center>

                                    <img src="{{ url("public/$kasir->poto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                </center>
                            </tr>
                            <tr>
                                <th>Nama Kasir</th>
                                <td>{{ $kasir->nama }}</td>
                            </tr>

                            <tr>
                                <th>Username Kasri</th>
                                <td>{{ $kasir->username }}</td>
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