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
                            <h3 class="card-title" style="font-weight: bold; margin-bottom: 0; font-size: 18px;">DAFTAR SUPPLIER</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahsupplierModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Tampilkan Data dan Pencarian-->
                            <div class="card-body">

                                <!-- Tabel Data Supplier -->
                                <div class="table-responsive">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th width="10px" style="text-align: center;">NO.</th>
                                                <th width="10px" style="text-align: center;">AKSI</th>
                                                <th style="width: 20%;">NAMA SUPPLIER</th>
                                                <th style="width: 25%;">ALAMAT</th>
                                                <th style="width: 20%;">TELEPON</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Isi data supplier -->
                                            @foreach($supplier as $index => $supp)
                                            <tr style="font-size: 14px;">
                                                <td class="text-center">{{ $index + 1 }}</td>
                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatsupplierModal{{$supp->id_supplier}}">
                                                            <i class="fa fa-info-circle"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editsupplierModal{{$supp->id_supplier}}">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <form action="{{ url('admin/supplier', $supp->id_supplier) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus supplier ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                                <td>{{ $supp->nama_supplier }}</td>
                                                <td>{{ $supp->alamat_supplier }}</td>
                                                <td>{{ $supp->telepon }}</td>

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

    <!-- Tambah Supplier Modal -->
    <div class="modal fade" id="tambahsupplierModal" tabindex="-1" role="dialog" aria-labelledby="tambahsupplierModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 10px;">
                    <h5 class="modal-title w-100 text-center" id="tambahsupplierModalLabel" style="font-size: 17px; font-weight: bold;">Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true" style="color: white;">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/supplier') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="nama_supplier">Nama Supplier</label>
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Masukkan Nama Supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_supplier">Alamat Supplier</label>
                            <textarea class="form-control" id="alamat_supplier" name="alamat_supplier" placeholder="Masukkan Alamat Supplier" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Masukkan Nomor Telepon" required>
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

    <!-- Edit Supplier Modal -->
    @foreach($supplier as $supp)
    <div class="modal fade" id="editsupplierModal{{$supp->id_supplier}}" tabindex="-1" role="dialog" aria-labelledby="editsupplierModalLabel{{$supp->id_supplier}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editsupplierModalLabel{{$supp->id_supplier}}">Edit Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/supplier', $supp->id_supplier) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="edit_nama_supplier{{$supp->id_supplier}}">Nama Supplier</label>
                            <input type="text" class="form-control" id="edit_nama_supplier{{$supp->id_supplier}}" name="nama_supplier" value="{{ $supp->nama_supplier }}">
                        </div>
                        <div class="form-group">
                            <label for="edit_alamat_supplier{{$supp->id_supplier}}">Alamat Supplier</label>
                            <textarea class="form-control" id="edit_alamat_supplier{{$supp->id_supplier}}" name="alamat_supplier">{{ $supp->alamat_supplier }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit_telepon{{$supp->id_supplier}}">Telepon</label>
                            <input type="text" class="form-control" id="edit_telepon{{$supp->id_supplier}}" name="telepon" value="{{ $supp->telepon }}">
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

    <!-- Lihat Supplier Modal -->
    @foreach($supplier as $supp)
    <div class="modal fade" id="lihatsupplierModal{{$supp->id_supplier}}" tabindex="-1" role="dialog" aria-labelledby="lihatsupplierModalLabel{{$supp->id_supplier}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatsupplierModalLabel{{$supp->id_supplier}}" style="font-weight: bold;">Detail supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kode supplier</th>
                                <td><span class="badge badge-success">{{ $supp->id_supplier }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama supplier</th>
                                <td>{{ $supp->nama_supplier }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-admin>