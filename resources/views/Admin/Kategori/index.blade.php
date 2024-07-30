<x-admin>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        <li class="breadcrumb-item active">Kategori</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title" style="font-weight: bold;">Daftar Kategori</h3>
                            <div class="card-tools">
                                <a href="{{ url('Kategori/create') }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-plus"></i> Tambah
                                </a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-6 text-right">
                                    <form action="/search" method="GET" class="form-inline">
                                        <div class="input-group input-group-sm ml-auto">
                                            <input class="form-control form-control-navbar" type="search" placeholder="Pencarian" aria-label="Pencarian" name="q">
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover text-center">
                                            <thead>
                                                <tr>
                                                    <th style="width: 5%;">No.</th>
                                                    <th style="width: 30%;">Kategori</th>
                                                    <th style="width: 10%;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Contoh Kategori</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>
                                                            <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                </div>
                                <div class="col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                                        <ul class="pagination justify-content-end">
                                            <li class="paginate_button page-item previous disabled" id="example1_previous">
                                                <a href="#" aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Sebelumnya</a>
                                            </li>
                                            <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                            <li class="paginate_button page-item"><a href="#" aria-controls="example1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                            <li class="paginate_button page-item"><a href="#" aria-controls="example1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                            <li class="paginate_button page-item next" id="example1_next">
                                                <a href="#" aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Selanjutnya</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-admin>