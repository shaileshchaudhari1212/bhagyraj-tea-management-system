<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        Invoice
    </title>

    <style>
        body {

            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #222;
            margin: 20px;

        }

        .invoice-box {

            border: 1px solid #ddd;
            padding: 20px;

        }

        .header {

            width: 100%;
            margin-bottom: 20px;

        }

        .left {

            width: 70%;
            float: left;

        }

        .right {

            width: 30%;
            float: right;
            text-align: right;

        }

        .logo {

            width: 130px;
            margin-bottom: 8px;

        }

        .company-name {

            font-size: 28px;
            font-weight: bold;
            color: #d40000;

        }

        .small {

            font-size: 12px;
            color: #555;
            line-height: 18px;

        }

        .invoice-title {

            font-size: 30px;
            font-weight: bold;

        }

        .clear {

            clear: both;

        }

        .dealer-box {

            background: #f7f7f7;
            padding: 12px;
            border: 1px solid #ddd;
            margin-top: 20px;
            margin-bottom: 20px;

        }

        .dealer-box h3 {

            margin-bottom: 8px;

        }

        .dealer-box p {

            margin: 4px 0;

        }

        table {

            width: 100%;
            border-collapse: collapse;

        }

        table th {

            background: #111;
            color: white;
            padding: 10px;
            text-align: left;
            font-size: 13px;

        }

        table td {

            padding: 10px;
            border-bottom: 1px solid #ddd;

        }

        .total {

            text-align: right;
            margin-top: 20px;

        }

        .total h2 {

            color: green;
            font-size: 24px;

        }

        .footer {

            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 10px;

        }
    </style>

</head>

<body>

    <div class="invoice-box">

        <!-- HEADER -->

        <div class="header">

            <div class="left">

                <img src="{{ public_path('images/logo.png') }}" class="logo">

                <div class="company-name">

                    Bhagyraj Tea

                </div>

                <div class="small">

                    Premium Tea Supplier <br>

                    +91 9875858984 <br>

                    info@bhagyrajtea.com <br>

                    https://bhagyrajtea.com/

                </div>

            </div>

            <div class="right">

                <div class="invoice-title">

                    INVOICE

                </div>

                <br>

                <strong>
                    Invoice #{{ $sale->id }}
                </strong>

                <br><br>

                {{ date('d M Y', strtotime($sale->created_at)) }}

            </div>

            <div class="clear"></div>

        </div>

        <!-- DEALER -->

        <div class="dealer-box">

            <h3>
                Dealer Details
            </h3>

            <p>

                <strong>Name:</strong>
                {{ $sale->dealer->name }}

            </p>

            <p>

                <strong>Shop:</strong>
                {{ $sale->dealer->shop_name }}

            </p>

            <p>

                <strong>Mobile:</strong>
                {{ $sale->dealer->mobile }}

            </p>

            <p>

                <strong>Email:</strong>
                {{ $sale->dealer->email }}

            </p>

        </div>

        <!-- TABLE -->

        <table>

            <thead>

                <tr>

                    <th>
                        Tea
                    </th>

                    <th>
                        Quantity
                    </th>

                    <th>
                        Price/KG
                    </th>

                    <th>
                        Total
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr>

                    <td>

                        {{ $sale->stock->tea_name }}

                    </td>

                    <td>

                        {{ $sale->quantity }} KG

                    </td>

                    <td>

                        ₹ {{ number_format($sale->total_amount / $sale->quantity, 2) }}

                    </td>

                    <td>

                        ₹ {{ number_format($sale->total_amount, 2) }}

                    </td>

                </tr>

            </tbody>

        </table>

        <!-- TOTAL -->

        <div class="total">

            <h2>

                Grand Total:
                ₹ {{ number_format($sale->total_amount, 2) }}

            </h2>

        </div>

        <!-- FOOTER -->

        <div class="footer">

            Thank you for doing business with Bhagyraj Tea

        </div>

    </div>

</body>

</html>