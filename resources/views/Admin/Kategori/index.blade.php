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
                                <button type="button" class="btn btn-md btn-primary" data-toggle="modal" data-target="#tambahkategoriModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <!-- Tampilkan Data dan Pencarian-->
                        <div class="card-body">

                            <!-- Tabel Data Kategori -->
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-striped">
                                    <thead style="color: black; font-size: 14px;">
                                        <tr>
                                            <th width="1Opx" style="text-align: center;">NO.</th>
                                            <th width="1Opx" style="text-align: center;">AKSI</th>
                                            <th>KATEGORI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Isi data kategori -->
                                        @foreach($kategori as $kat)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatkategoriModal{{$kat->id_kategori}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editkategoriModal{{$kat->id_kategori}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('admin/kategori', $kat->id_kategori) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td>{{ $kat->nama_kategori }}</td>

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
                    <form action="{{ url('admin/kategori') }}" method="post">
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
                    <form action="{{ url('admin/kategori', $kat->id_kategori) }}" method="post">
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

    <!-- Lihat Kategori Modal -->
    @foreach($kategori as $kat)
    <div class="modal fade" id="lihatkategoriModal{{$kat->id_kategori}}" tabindex="-1" role="dialog" aria-labelledby="lihatkategoriModalLabel{{$kat->id_kategori}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatkategoriModalLabel{{$kat->id_kategori}}" style="font-weight: bold;">Detail Kategori</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Kode kategori</th>
                                <td><span class="badge badge-success">{{ $kat->id_kategori }}</span></td>
                            </tr>
                            <tr>
                                <th>Nama kategori</th>
                                <td>{{ $kat->nama_kategori }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-admin>