<!DOCTYPE html>
<html>

<head>

    <title>Business Report</title>

    <style>
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 10px;
        }
    </style>

</head>

<body>

    <h1>
        Bhagyraj Tea
    </h1>

    <h2>
        Business Report
    </h2>

    <h3>
        Total Sales:
        Rs. {{ number_format($totalSalesAmount, 2) }}
    </h3>

    <h3>
        Total Payments:
        Rs. {{ number_format($totalPayments, 2) }}
    </h3>

    <h3>
        Total Profit:
        Rs. {{ number_format($totalProfit, 2) }}
    </h3>

    <br>

    <h2>
        Sales Report
    </h2>

    <table>

        <thead>

            <tr>

                <th>
                    Invoice
                </th>

                <th>
                    Dealer
                </th>

                <th>
                    Total
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($sales as $sale)

                <tr>

                    <td>
                        {{ $sale->invoice_number }}
                    </td>

                    <td>
                        {{ $sale->dealer->name }}
                    </td>

                    <td>
                        Rs. {{ number_format($sale->total_amount, 2) }}
                    </td>

                </tr>

            @endforeach

        </tbody>

    </table>

</body>

</html>