<x-admin>
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card-tittle" style="font-size: 20px;">
            Data Produk
        </div>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="card-tools-left">
                        <a href="{{ url('Produk/create') }}" class="btn btn-dark btn-sm">
                            <i class="fa fa-plus"></i> Tambah Produk
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kode Produk</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga Dasar</th>
                                <th>Harga Jual</th>
                                <th>Stok</th>
                                <th>Diskon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($list_produk as $produk)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td></td>
                                <td>{{ $produk->nama_produk}}</td>
                                <td>{{ $produk->id_kategori}}</td>
                                <td>{{ $produk->harga_dasar}}</td>
                                <td>{{ $produk->harga_jual}}</td>
                                <td>{{ $produk->stok}}</td>
                                <td>{{ $produk->diskon}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary btn-sm">
                                        <i class="fas fa-edit"></i> </a>
                                    <a href="#" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash"></i> </a>
                                    </a>
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </section>
</x-admin>