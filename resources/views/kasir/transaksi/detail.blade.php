<x-kasir>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Detail Penjualan</div>
            <a href="{{ url('kasir/transaksi') }}" class="btn btn-secondary float-right"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>

        <div class="card-body">
            <h1>penjualan Details</h1>

            <div class="row">
              <div class="col-md-6">
                <p><strong>No Nota:</strong> {{ $penjualan->invoice_number }}</p>
                <p><strong>Total Pembayaran:</strong> Rp {{ number_format($penjualan->total_amount, 0, ',', '.') }}</p>
                <p><strong>Tanggal Transaksi:</strong> {{ $penjualan->sale_date }}</p>
              </div>
            </div>
        
            <h2>Produk</h2>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama produk</th>
                  <th>Quantity</th>
                  <th>Harga </th>
                  <th>Subtotal</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($penjualan->details as $detail)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $detail->produk->nama_produk }}</td>
                    <td>{{ $detail->quantity }}</td>
                    <td>Rp {{ number_format($detail->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            </table>
        </div>
    </div>
</x-kasir>