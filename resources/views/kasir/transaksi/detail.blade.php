<x-kasir>
  <div class="card">
      <div class="card-header">
          <div class="card-title"><strong>Detail Penjualan</strong></div>
          <a href="{{ url('kasir/transaksi') }}" class="btn btn-secondary float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
      </div>

      <div class="card-body">
          <h1><strong>Penjualan Details</strong></h1>

          <div class="row">
            <div class="col-md-6">
              <p><strong>No Nota:</strong> {{ $penjualan->no_nota }}</p>
              <p><strong>Total Pembayaran:</strong> Rp {{ number_format($penjualan->total_harga, 0, ',', '.') }}</p>
              <p><strong>Uang Bayar:</strong> Rp {{ number_format($penjualan->uang_bayar, 0, ',', '.') }}</p>
              <p><strong>Uang Kembalian:</strong> Rp {{ number_format($penjualan->kembalian, 0, ',', '.') }}</p>
              <p><strong>Tanggal Transaksi:</strong> {{ $penjualan->tanggal_penjualan }}</p>
            </div>
          </div>
      
          <h2>Produk</h2>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama produk</th>
                <th>Total Item</th>
                <th>Diskon</th>
                <th>Harga</th>
                <th>Subtotal</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($penjualan->detailPenjualan as $detail)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $detail->produk->nama_produk }}</td>
                  <td>{{ $detail->total_item }}</td>
                  <td>{{ $detail->produk->diskon }}%</td>
                  <td>Rp {{ number_format($detail->harga, 0, ',', '.') }}</td>
                  <td>Rp {{ number_format($detail->total_item * $detail->harga * (1 - ($detail->produk->diskon / 100)), 0, ',', '.') }}</td> <!-- Menghitung subtotal setelah diskon -->
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
  </div>
</x-kasir>