<x-kasir>
    {{-- <x-ui.notif-alert /> --}}
 <div class="container-fluid">
    <div class="card mt-5">
        <div class="card-header">
            <div class="card-title">Data Penjualan</div>
            <a href="{{ url('kasir/transaksi/create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                Tambah Data</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">No Nota</th>
                        <th scope="col">Total Pembayaran</th>
                        <th scope="col">Uang Bayar</th>
                        <th scope="col">Uang Kembalian</th>
                        <th scope="col" width="200px">Tanggal Transaksi</th>
                        <th scope="col" width="100px">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->no_nota }}</td>
                            <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>

                            <td>Rp {{ number_format($item->uang_bayar, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->kembalian, 0, ',', '.') }}</td>
                            <td>{{ $item->tanggal_penjualan }}</td>
                            <td>
                                <div class="d-flex justify-content-between px-4">
                                    <a href="{{ url('kasir/transaksi/detail', $item->id_penjualan) }}"
                                        class="btn btn-sm btn-secondary">Detail</a>
                                    <button class="btn btn-sm btn-info print-button"
                                        data-id="{{ $item->id_penjualan }}">Print</button>
                                    <form action="{{ url('kasir/transaksi', $item->id_penjualan) }}" method="POST"
                                        onsubmit="return confirmDeletion();">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
 </div>

    <!-- struk pembayaran -->
    <div class="modal fade" id="printReceiptModal" tabindex="-1" role="dialog"
        aria-labelledby="printReceiptModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="printReceiptModalLabel">Struk Pembayaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="receipt">
                        <p><strong>No Nota:</strong> <span id="no_nota"></span></p>
                        <p><strong>Tanggal:</strong> <span id="tanggal"></span></p>
                        <hr>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Diskon (%)</th> <!-- Ubah header menjadi Diskon (%) -->
                                    <th>Total Item</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="receiptItems">
                                <!-- Items will be populated by JavaScript -->
                            </tbody>
                        </table>
                        <hr>
                        <p><strong>Total Pembayaran :</strong> <span id="total_harga"></span></p>
                        <p><strong>Uang Bayar :</strong> <span id="uang_bayar"></span></p>
                        <p><strong>Uang Kembalian :</strong> <span id="kembalian"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt()">Print</button>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script>
            function printReceipt() {
                var printContents = document.querySelector('.modal-body .receipt').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                window.location.reload();
            }

            $(document).ready(function() {
                $('.print-button').click(function() {
                    var id = $(this).data('id');

                    $.ajax({
                        url: `/kasir/transaksi/getdata/${id}`,
                        type: 'GET',
                        success: function(data) {
                            console.log(data); // Log the response data to the console

                            if (data && data.detail_penjualan && data.detail_penjualan.length > 0) {
                                $('#no_nota').text(data.no_nota);
                                $('#tanggal').text(data.tanggal_penjualan);
                                $('#total_harga').text(new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(data.total_harga));

                                var items = '';
                                data.detail_penjualan.forEach(function(detail) {
                                    items += '<tr>' +
                                        '<td>' + detail.produk.nama_produk + '</td>' +
                                        '<td>' + new Intl.NumberFormat('id-ID', {
                                            style: 'currency',
                                            currency: 'IDR'
                                        }).format(detail.harga) + '</td>' +
                                        '<td>' + (detail.produk.diskon) +
                                        '%</td>' +
                                        '<td>' + detail.total_item + '</td>' +
                                        '<td>' + new Intl.NumberFormat('id-ID', {
                                            style: 'currency',
                                            currency: 'IDR'
                                        }).format(detail.harga * detail.total_item * (1 -
                                            detail.produk.diskon / 100)) + '</td>' +
                                       
                                        '</tr>';
                                });
                                $('#receiptItems').html(items);
                                $('#uang_bayar').text(new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(data.uang_bayar)); // Menampilkan uang bayar
                                $('#kembalian').text(new Intl.NumberFormat('id-ID', {
                                    style: 'currency',
                                    currency: 'IDR'
                                }).format(data.kembalian)); // Menampilkan uang kembalian
                                $('#printReceiptModal').modal('show');
                            } else {
                                console.error("detailPenjualan is undefined or empty");
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });
            });

            function confirmDeletion() {
                return confirm('Yakin ingin menghapus penjualan ini?');
            }
        </script>
    @endpush
</x-kasir>
