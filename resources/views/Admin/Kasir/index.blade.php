<x-admin>
    <style>
        .pagination .page-link {
            color: #526D82;
        }

        .pagination .page-link:hover {
            color: #ffffff;
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
                            <h3 class="card-title" style="font-weight: bold; font-size: 18px;">DAFTAR KASIR</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahkasirModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <!-- Data Display and Search -->
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%;">No.</th>
                                            <th class="text-center">Aksi</th>
                                            <th class="text-center">Nama Kasir</th>
                                            <th class="text-center">Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($list_kasir as $kasir)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatkasirModal{{$kasir->id}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editkasirModal{{$kasir->id}}">
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
                                            <td class="text-center">{{ $kasir->nama }}</td>
                                            <td class="text-center">
                                                <img src="{{ url('public') }}/{{ $kasir->foto }}" style="width:30%; height:30%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                            </td>
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

    <!-- Tambah Kasir Modal -->
    <div class="modal fade" id="tambahkasirModal" tabindex="-1" role="dialog" aria-labelledby="tambahkasirModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="tambahkasirModalLabel" style="font-weight: bold;">Tambah Data Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/kasir') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Kasir" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Masukkan Password" required>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control" name="foto" accept=".jpg, .jpeg, .png" required>
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

    <!-- Edit Kasir Modal -->
    @foreach($list_kasir as $kasir)
    <div class="modal fade" id="editkasirModal{{$kasir->id}}" tabindex="-1" role="dialog" aria-labelledby="editkasirModalLabel{{$kasir->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editkasirModalLabel{{$kasir->id}}">Edit Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/kasir', $kasir->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="{{ $kasir->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $kasir->username }}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Foto</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url("public/$kasir->foto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
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

    <!-- Lihat Kasir Modal -->
    @foreach($list_kasir as $kasir)
    <div class="modal fade" id="lihatkasirModal{{$kasir->id}}" tabindex="-1" role="dialog" aria-labelledby="lihatkasirModalLabel{{$kasir->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="lihatkasirModalLabel{{$kasir->id}}" style="font-weight: bold;">Detail Kasir</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <td colspan="2">
                                    <img src="{{ url("public/$kasir->foto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                </td>
                            </tr>
                            <tr>
                                <th>Nama Kasir</th>
                                <td>{{ $kasir->nama }}</td>
                            </tr>
                            <tr>
                                <th>Username Kasir</th>
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