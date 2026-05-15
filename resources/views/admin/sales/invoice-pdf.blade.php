<!DOCTYPE html>
<html>

<head>

    <title>Invoice PDF</title>

    <style>
        body {
            font-family: sans-serif;
        }

        .title {
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }
    </style>

</head>

<body>

    <div class="title">
        Bhagyraj Tea Invoice
    </div>

    <table>

        <tr>
            <th>Invoice</th>
            <td>{{ $sale->invoice_number }}</td>
        </tr>

        <tr>
            <th>Dealer</th>
            <td>{{ $sale->dealer->name }}</td>
        </tr>

        <tr>
            <th>Tea</th>
            <td>{{ $sale->stock->tea_name }}</td>
        </tr>

        <tr>
            <th>Quantity</th>
            <td>{{ $sale->quantity }} KG</td>
        </tr>

        <tr>
            <th>Price/KG</th>
            <td>₹ {{ number_format($sale->price_per_kg, 2) }}</td>
        </tr>

        <tr>
            <th>Total</th>
            <td>₹ {{ number_format($sale->total_amount, 2) }}</td>
        </tr>

    </table>

</body>

</html>