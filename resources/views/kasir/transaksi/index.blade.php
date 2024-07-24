<x-kasir>
    <div class="card">
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
                        <th scope="col">Tanggal Transaksi</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($penjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->invoice_number }}</td>
                            <td>Rp {{ number_format($item->total_amount, 0, ',', '.') }}</td>
                            <td>{{ $item->sale_date }}</td>
                            <td>
                                <a href="{{ url('kasir/transaksi/detail', $item->id) }}"
                                    class="btn btn-sm btn-secondary">Detail</a>
                                <button class="btn btn-sm btn-info print-button"
                                    data-id="{{ $item->id }}">Print</button>
                                <button class="btn btn-sm btn-danger delete-button"
                                    data-id="{{ $item->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
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
                        <h5>Struk Pembayaran</h5>
                        <hr>
                        <p><strong>No Nota:</strong> <span id="no_nota"></span></p>
                        <p><strong>Tanggal:</strong> <span id="tanggal"></span></p>
                        <hr>
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Sub Total</th>
                                </tr>
                            </thead>
                            <tbody id="receiptItems">
                                <!-- Items will be populated by JavaScript -->
                            </tbody>
                        </table>
                        <hr>
                        <p><strong>Total Pembayaran :</strong> <span id="total_harga"></span></p>
                        <p><strong>Diskon:</strong> <span id="diskon"></span></p>

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
                            console.log(data);
                            $('#no_nota').text(data.invoice_number);
                            $('#tanggal').text(data.sale_date);
                            $('#total_harga').text(new Intl.NumberFormat('id-ID', {
                                style: 'currency',
                                currency: 'IDR'
                            }).format(data.total_amount));
                            let diskon = parseFloat(data.diskon) || 0;

                          
                            if (diskon > 1) {
                                diskon = diskon / 100;
                            }

                            
                            $('#diskon').text(new Intl.NumberFormat('id-ID', {
                                style: 'percent',
                                maximumFractionDigits: 2
                            }).format(diskon));


                            var items = '';
                            data.details.forEach(function(detail) {
                                items += '<tr>' +
                                    '<td>' + detail.produk.nama_produk + '</td>' +
                                    '<td>' + new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR'
                                    }).format(detail.price) + '</td>' +
                                    '<td>' + detail.quantity + '</td>' +
                                    '<td>' + new Intl.NumberFormat('id-ID', {
                                        style: 'currency',
                                        currency: 'IDR'
                                    }).format(detail.price * detail.quantity) + '</td>' +
                                    '</tr>';
                            });
                            $('#receiptItems').html(items);

                            $('#printReceiptModal').modal('show');
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });


                $('.delete-button').click(function() {
                    var id = $(this).data('id');
                    if (confirm('Apakah Anda yakin ingin menghapus penjualan ini?')) {
                        $.ajax({
                            url: `/kasir/transaksi/${id}`,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(result) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }
                });
            });
        </script>


    @endpush
</x-kasir>
