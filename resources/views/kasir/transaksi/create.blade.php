<x-kasir>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Penjualan</div>
        </div>

        <div class="card-body">
            <form action="{{ url('kasir/transaksi/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="no_nota" class="form-label">No Nota:</label>
                    <input type="number" name="no_nota" id="no_nota"
                        class="form-control @error('no_nota') is-invalid @enderror" required>
                    @error('no_nota')
                        <p class="alert alert-danger  mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="produk" class="form-label">Produk:</label>
                    <div id="product-list">
                        <div class="product-item row">
                            <div class="col-md-5">
                                <select name="produk[0][id]" class="form-control" required>
                                    <option value="">--pilih--</option>
                                    @foreach ($produk as $product)
                                        <option value="{{ $product->id_produk }}"
                                            data-harga_jual="{{ $product->harga_jual }}"
                                            data-diskon="{{ $product->diskon }}">{{ $product->nama_produk }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="produk[0][quantity]" class="form-control"
                                    placeholder="jumlah pembelian" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" name="produk[0][diskon]" class="form-control"
                                    placeholder="Diskon (%)" readonly>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary add-product">Tambah Produk</button>
                                <button type="button" class="btn btn-danger d-none remove-product">Hapus
                                    Produk</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga:</label>
                    <input type="text" id="total_harga" class="form-control" readonly>
                </div>

                <div class="mb-3">
                    <label for="uang_bayar" class="form-label">Uang Bayar:</label>
                    <input type="number" name="uang_bayar" id="uang_bayar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kembalian" class="form-label">Kembalian:</label>
                    <input type="text" name="kembalian" id="kembalian" class="form-control" readonly>
                </div>

                <button type="submit" class="btn btn-success float-right">Simpan</button>
            </form>
        </div>
    </div>

    @push('script')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                // Handle Add Product button click
                $('#product-list').on('click', '.add-product', function() {
                    var $productList = $('#product-list');
                    var $lastItem = $productList.find('.product-item:last');
                    var $newItem = $lastItem.clone();
                    var newIndex = $productList.find('.product-item').length;

                    // Update the names of the inputs and clear their values
                    $newItem.find('select').attr('name', `produk[${newIndex}][id]`).val('');
                    $newItem.find('input[name*="[quantity]"]').attr('name', `produk[${newIndex}][quantity]`).val('');
                    $newItem.find('input[name*="[diskon]"]').val(''); // Clear diskon

                    // Append new item
                    $productList.append($newItem);

                    // Update visibility of buttons
                    updateButtonVisibility();
                });

                // Handle Remove Product button click
                $('#product-list').on('click', '.remove-product', function() {
                    $(this).closest('.product-item').remove();
                    updateButtonVisibility(); // Update button visibility after removing
                    updateTotalAndChange(); // Update total and change after removing
                });

                // Update diskon input when product is selected
                $('#product-list').on('change', 'select[name*="[id]"]', function() {
                    var selectedOption = $(this).find('option:selected');
                    var diskon = selectedOption.data('diskon') || 0; // Ambil diskon dari data produk
                    $(this).closest('.product-item').find('input[name*="[diskon]"]').val(diskon); // Set diskon
                    updateTotalAndChange(); // Update total harga setelah diskon diatur
                });

                function updateButtonVisibility() {
                    var $productList = $('#product-list');
                    var $items = $productList.find('.product-item');

                    $items.each(function(index, item) {
                        var $item = $(item);
                        if (index === $items.length - 1) {
                            $item.find('.add-product').removeClass('d-none');
                            $item.find('.remove-product').addClass('d-none');
                        } else {
                            $item.find('.add-product').addClass('d-none');
                            $item.find('.remove-product').removeClass('d-none');
                        }
                    });
                }

                function updateTotalAndChange() {
                    let total = 0;
                    $('#product-list .product-item').each(function() {
                        const quantity = $(this).find('input[name*="[quantity]"]').val();
                        const price = $(this).find('select[name*="[id]"] option:selected').data('harga_jual');
                        const discount = $(this).find('input[name*="[diskon]"]').val() || 0;

                        // Calculate total after discount
                        const discountedPrice = price * (1 - (discount / 100)); // Diskon dibagi 100 untuk mendapatkan nilai desimal
                        
                        total += (quantity * discountedPrice) || 0; // Ensure total is calculated correctly
                    });

                    $('#total_harga').val(total);

                    const uangBayar = parseFloat($('#uang_bayar').val()) || 0;
                    const kembalian = uangBayar - total;
                    $('#kembalian').val(kembalian >= 0 ? kembalian : 0);
                }

                // Handle input changes
                $('#product-list').on('change', 'input[name*="[quantity]"], select[name*="[id]"]', updateTotalAndChange);
                $('#uang_bayar').on('input', updateTotalAndChange);

                // Initialize product list on page load
                (function initializeProductList() {
                    updateButtonVisibility(); // Call to set initial button visibility
                })();
            });
        </script>
    @endpush
</x-kasir>