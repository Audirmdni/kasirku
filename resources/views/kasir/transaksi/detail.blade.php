<x-kasir>
    <div class="card">
        <div class="card-header">
            <div class="card-title col-md-12">Data Transaksi
              
            </div>
        </div>
        <div class="card-body">
            <form action="">
                @csrf
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th width="160px" scope="col"><center>no</center></th>
                            <th scope="col"><center>Barang</center></th>
                            <th scope="col"><center>Harga</center></th>
                            <th scope="col"><center>Qty</center></th>
                            <th scope="col"><center>Sub Total</center></th>
                            <th scope="col"><center>Aksi</center></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"><center>1</center></th>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>lorem</td>
                            <td>
                                <center>
                                    <a href="" class="btn btn-danger"><i class="fa fa-trash"></i> </a>
                                </center>
                            </td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                        <tr>
                            <td>Diskon</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                        <tr>
                            <td>Seluruh Total</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                        <tr>
                            <td>Total bayar</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                        <tr>
                            <td>Uang Pembeli</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                        <tr>
                            <td>Uang Kembalian</td>
                            <td colspan="3"></td>
                            <td colspan="2">lorem</td>
                        </tr>
                    </tbody>
                </table>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#printReceiptModal">
                        Cetak Struk
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="printReceiptModal" tabindex="-1" role="dialog" aria-labelledby="printReceiptModalLabel" aria-hidden="true">
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
                        <p><strong>No Transaksi:</strong> 1</p>
                        <p><strong>Tanggal:</strong> lorem</p>
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
                            <tbody>
                                <tr>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                    <td>lorem</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <p><strong>Total:</strong> lorem</p>
                        <p><strong>Diskon:</strong> lorem</p>
                        <p><strong>Seluruh Total:</strong> lorem</p>
                        <p><strong>Total bayar:</strong> lorem</p>
                        <p><strong>Uang Pembeli:</strong> lorem</p>
                        <p><strong>Uang Kembalian:</strong> lorem</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="printReceipt()">Print</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printReceipt() {
            var printContents = document.querySelector('.modal-body .receipt').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
</x-kasir>
