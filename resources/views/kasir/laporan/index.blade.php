<x-kasir>
  <div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">Laporan Penjualan</div>
            <a href="{{ route('reports.export', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-primary float-right"><i class="fa fa-download"></i> Export to PDF</a>
        </div>

        <div class="card-body">
            <form action="{{ route('reports.index') }}" method="GET" class="mb-4">
                <div class="row">
                    <div class="col-md-3">
                        <label for="start_date" class="form-label">Tanggal Mulai:</label>
                        <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $startDate }}">
                    </div>
                    <div class="col-md-3">
                        <label for="end_date" class="form-label">Tanggal Akhir:</label>
                        <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $endDate }}">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-success mt-4">Filter</button>
                    </div>
                </div>
            </form>

            <h2>Laporan Penjualan</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Nota</th>
                        <th>Total Pembayaran</th>
                        <th>Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($penjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_nota }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                            <td>{{ $item->tanggal_penjualan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Tidk ada data Penjualan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
  </div>
</x-kasir>
