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
                            <h3 class="card-title" style="font-weight: bold; margin-bottom: 0; font-size: 18px;">PENGELUARAN</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahPengeluaranModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
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
                                        <form action="{{ url('Admin/Pengeluaran/search') }}" method="GET">
                                            <div class="input-group">
                                                <input type="text" class="form-control form-control-sm" style="font-size: 14px; padding: 15px; width: 100%;" placeholder="Cari..." name="keyword">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- Tabel Data Pengeluaran -->
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover text-left">
                                        <thead style="background-color: #d3d3d3; color: black; font-size: 14px;">
                                            <tr>
                                                <th class="text-center" style="width:  3%;">NO.</th>
                                                <th style="width: 35%;">DESKRIPSI</th>
                                                <th style="width: 20%;">NOMINAL</th>
                                                <th style="width: 20%;">TANGGAL PEMBAYARAN</th>
                                                <th style="width: 7%;">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($pengeluarans as $index => $p)
                                            <tr style="font-size: 14px;">
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td>{{ $p->deskripsi }}</td>
                                                <td>Rp {{ number_format($p->nominal, 0, ',', '.') }}</td>
                                                <td>{{ $p->created_at}}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editPengeluaranModal{{ $p->id_pengeluaran }}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form action="{{ url('Admin/Pengeluaran', $p->id_pengeluaran) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengeluaran ini?');">
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
                                        <div class="dataTables_info">Menampilkan 1 sampai 10 dari {{ $pengeluarans->count() }} entri</div>
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

    <!-- Tambah Pengeluaran Modal -->
    <div class="modal fade" id="tambahPengeluaranModal" tabindex="-1" role="dialog" aria-labelledby="tambahPengeluaranModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 10px;">
                    <h5 class="modal-title w-100 text-center" id="tambahPengeluaranModalLabel" style="font-size: 17px; font-weight: bold;">Tambah Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Admin/Pengeluaran') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Masukkan Deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label for="nominal">Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="nominal" name="nominal" placeholder="Masukkan Nominal" required>
                            </div>
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

    <!-- Edit Pengeluaran Modal -->
    @foreach($pengeluarans as $p)
    <div class="modal fade" id="editPengeluaranModal{{ $p->id_pengeluaran }}" tabindex="-1" role="dialog" aria-labelledby="editPengeluaranModalLabel{{ $p->id_pengeluaran }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editPengeluaranModalLabel{{ $p->id_pengeluaran }}">Edit Pengeluaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('Admin/Pengeluaran', $p->id_pengeluaran) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_deskripsi{{ $p->id_pengeluaran }}">Deskripsi</label>
                            <input type="text" class="form-control" id="edit_deskripsi{{ $p->id_pengeluaran }}" name="deskripsi" value="{{ $p->deskripsi }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_nominal{{ $p->id_pengeluaran }}">Nominal</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="edit_nominal{{ $p->id_pengeluaran }}" name="nominal" value="{{ $p->nominal }}">
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
</x-admin>