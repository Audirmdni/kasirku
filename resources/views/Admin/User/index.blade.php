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
                            <h3 class="card-title" style="font-weight: bold; font-size: 18px;">DAFTAR USER</h3>
                            <div class="card-tools">

                                <button type="button" class="btn btn-md btn-success" data-toggle="modal" data-target="#tambahprodukModal">
                                    <i class="fa fa-plus"></i> <span class="font-weight-bold">Tambah</span>
                                </button>
                            </div>
                        </div>
                        <!-- Tampilkan Data dan Pencarian-->
                        <div class="card-body">

                            <!-- Tabel Data Produk -->
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center" style="width: 3%;">No.</th>
                                            <th class="text-center">Aksi</th>
                                            <th class="text-center">Nama User</th>
                                            <th class="text-center">Poto</th>

                                    </thead>
                                    <tbody>
                                        <!-- Isi data produk -->
                                        @foreach($list_user as $user)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration}}</td>

                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#lihatprodukModal{{$user->id}}">
                                                        <i class="fa fa-info-circle"></i>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editprodukModal{{$user->id}}">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                    <form action="{{ url('admin/user', $user->id) }}" method="post" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$user->nama}}</td>
                                            <td class="text-center">
                                                <img src="{{ url('public') }}/{{ $user->foto }}" style="width:30%; height:30%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
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
                    <h5 class="modal-title w-100 text-center" id="tambahprodukModalLabel" style="font-weight: bold;">Tambah Data user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/user') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kode_produk">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama user" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="Masukkan Username" required>
                        </div>

                        3
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
    @foreach($list_user as $user)
    <div class="modal fade" id="editprodukModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editprodukModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="editprodukModalLabel{{$user->id}}">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('admin/user', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode_produk">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" value="{{$user->nama}}">
                        </div>
                        <div class="form-group">
                            <label for="nama_produk">Username</label>
                            <input type="text" class="form-control" name="username" value="{{$user->username}}">
                        </div>


                        <div class="form-group">
                            <label for="stok">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Poto</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ url("public/$user->poto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
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
    @foreach($list_user as $user)
    <div class="modal fade" id="lihatprodukModal{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="lihatprodukModalLabel{{$user->id}}" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="padding: 15px;">
                    <h5 class="modal-title w-100 text-center" id="lihatprodukModalLabel{{$user->id}}" style="font-weight: bold;">Detail user</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Tutup">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr class="text-center">
                                <center>

                                    <img src="{{ url("public/$user->poto") }}" style="width:50%;" onerror="this.src='https://bootdey.com/img/Content/avatar/avatar7.png';">
                                </center>
                            </tr>
                            <tr>
                                <th>Nama user</th>
                                <td>{{ $user->nama }}</td>
                            </tr>

                            <tr>
                                <th>Username Kasri</th>
                                <td>{{ $user->username }}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach

</x-admin>