<x-kasir>
    <div class="card">
        <div class="card-header">
            <div class="card-title">Tambah Penjualan</div>
        </div>

        <div class="card-body">
            <form action="{{ url('kasir/transaksi/store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="invoice_number" class="form-label">No Nota:</label>
                    <input type="text" name="invoice_number" id="invoice_number" class="form-control @error('invoice_number') is-invalid @enderror" required>
                    @error('invoice_number')
                    <p class="alert alert-danger  mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="produk" class="form-label">Produk:</label>
                    <div id="product-list">
                        <div class="product-item row">
                            <div class="col-md-6">
                                <select name="produk[0][id]" class="form-control" required>
                                    <option value="">--pilih--</option>
                                    @foreach ($produk as $product)
                                        <option value="{{ $product->id_produk }}">{{ $product->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" name="produk[0][quantity]" class="form-control" placeholder="Quantity" required>
                            </div>
                            <div class="col-md-3">
                                <!-- Initial button setup -->
                                <button type="button" class="btn btn-primary add-product">Tambah Produk</button>
                                <button type="button" class="btn btn-danger d-none remove-product">Hapus Produk</button>
                            </div>
                        </div>
                    </div>
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
                $newItem.find('input').attr('name', `produk[${newIndex}][quantity]`).val('');

                // Hide "Tambah Produk" button and show "Hapus Produk" button for previous items
                $productList.find('.add-product').addClass('d-none');
                $productList.find('.remove-product').removeClass('d-none');

                // Show "Tambah Produk" button only for the new last item
                $newItem.find('.add-product').removeClass('d-none');
                $newItem.find('.remove-product').addClass('d-none');

                // Append new item
                $productList.append($newItem);
            });

            // Handle Remove Product button click
            $('#product-list').on('click', '.remove-product', function() {
                $(this).closest('.product-item').remove();

                // Ensure the last item has the "Tambah Produk" button and hides "Hapus Produk"
                var $remainingItems = $('#product-list').find('.product-item');
                if ($remainingItems.length > 0) {
                    var $lastItem = $remainingItems.last();
                    $lastItem.find('.add-product').removeClass('d-none');
                    $lastItem.find('.remove-product').addClass('d-none');
                }
            });

            // Initial setup on page load
            (function initializeProductList() {
                var $productList = $('#product-list');
                var $items = $productList.find('.product-item');
                if ($items.length > 1) {
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
            })();
        });
    </script>
    @endpush
</x-kasir>
