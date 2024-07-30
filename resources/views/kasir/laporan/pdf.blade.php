<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Laporan Penjualan</h1>
    <p><strong>Periode:</strong> {{ $startDate }} sampai {{ $endDate }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Nota</th>
                <th>Total Pembayaran</th>
                <th>Tanggal Transaksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sales as $sale)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $sale->invoice_number }}</td>
                    <td>Rp {{ number_format($sale->total_amount, 0, ',', '.') }}</td>
                    <td>{{ $sale->sale_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
