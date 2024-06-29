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
                            <h3 class="card-title" style="font-weight: bold; margin-bottom: 0; font-size: 18px;">DAFTAR KATEGORI</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahkategoriModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Pencarian -->
                            <div class="row mb-3 justify-content-end">
                                <div class="col-md-3">
                                    <input type="text" class="form-control" style="font-size: 14px; padding: 5px;" placeholder="Pencarian...">
                                </div>
                            </div>
                            <!-- Tabel Data Kategori -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover text-left">
                                    <thead style="background-color: #008000; color: white; font-size: 14px;">
                                        <tr>
                                            <th style="width: 3%;">NO.</th>
                                            <th style="width: 40%;">KATEGORI</th>
                                            <th style="width: 13%;">AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi data kategori -->
                                        @foreach($kategori as $index => $kat)
                                        <tr style="font-size: 14px;">
                                            <td>{{ $index + 1 }}</td>
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
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                            <button type="button" class="btn btn-sm btn-danger btn-xs" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success btn-xs">Simpan</button>
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
                    <h5 class="modal-title" id="editkategoriModalLabel{{$kat->id_kategori}}">Edit Kategori</h5>
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
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-admin>