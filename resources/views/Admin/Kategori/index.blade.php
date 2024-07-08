<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
<<<<<<< HEAD
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold; margin-bottom: 0; font-size: 18px;">DAFTAR KATEGORI</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahkategoriModal">
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
                                    <form action="{{ url('Admin/Kategori/search') }}" method="GET">
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-sm" style="font-size: 14px; padding: 15px; width: 100%;" placeholder="Cari..." name="keyword">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Tabel Data Kategori -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-left">
                                    <thead style="background-color: #d3d3d3; color: black; font-size: 14px;">
                                        <tr>
                                            <th class="text-center" style="width: 3%;">NO.</th>
                                            <th style="width: 40%;">KATEGORI</th>
                                            <th style="width: 3%;">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi data kategori -->
                                        @foreach($kategori as $index => $kat)
                                        <tr style="font-size: 14px;">
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td>{{ $kat->nama_kategori }}</td>
                                            <td>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editkategoriModal{{$kat->id_kategori}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('Admin/Kategori', $kat->id_kategori) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
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
                                    <div class="dataTables_info">Menampilkan 1 sampai 10 dari {{ $kategori->count() }} entri</div>
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
=======
            <div class="card">
                <div class="card-header">
                    <div class="card-tittle" style="font-size: 20px;">
                        Data Kategori
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
                    </div>
                    <div class="card-tools">
                        <a href="{{ url('Kategori/create') }}" class="btn btn-dark btn-sm">
                            <i class="fa fa-plus"></i> Tambah Kategori
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Aksi</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
<<<<<<< HEAD

    <!-- Tambah Kategori Modal -->
    <div class="modal fade" id="tambahkategoriModal" tabindex="-1" role="dialog" aria-labelledby="tambahkategoriModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 10px;">
                    <h5 class="modal-title w-100 text-center" id="tambahkategoriModalLabel" style="font-size: 17px; font-weight: bold;">Tambah Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Admin/Kategori') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori" required>
                        </div>
                        <div class="text-right">
                            <button type="button" class="btn btn-md btn-danger btn-xs" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-md btn-success btn-xs">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Kategori Modal -->
    @foreach($kategori as $kat)
    <div class="modal fade" id="editkategoriModal{{$kat->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="editkategoriModalLabel{{$kat->id_kategori}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editkategoriModalLabel{{$kat->id_kategori}}">Edit Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Admin/Kategori', $kat->id_kategori) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_nama_kategori{{$kat->id_kategori}}">Nama Kategori</label>
                            <input type="text" class="form-control" id="edit_nama_kategori{{$kat->id_kategori}}" name="nama_kategori" value="{{ $kat->nama_kategori }}">
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
=======
>>>>>>> ebdf7e1cdc81dbd230fb7f70792df4ef2b8018df
</x-admin>