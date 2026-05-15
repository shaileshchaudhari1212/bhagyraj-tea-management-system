<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>
        Invoice
    </title>

</head>

<body style="font-family: Arial; padding:20px;">

    <h1>
        Bhagyraj Tea
    </h1>

    <h2>
        Invoice Details
    </h2>

    <hr>

    <p>
        <strong>Dealer:</strong>
        {{ $sale->dealer->name }}
    </p>

    <p>
        <strong>Invoice No:</strong>
        {{ $sale->invoice_number }}
    </p>

    <p>
        <strong>Tea:</strong>

        @if($sale->tea_name)

            {{ $sale->stock->tea_name }}

        @else

            Tea Product

        @endif
    </p>

    <p>
        <strong>Quantity:</strong>
        {{ $sale->quantity }} KG
    </p>

    <p>
        <strong>Price Per KG:</strong>
        ₹ {{ number_format($sale->price_per_kg, 2) }}
    </p>

    <p>
        <strong>Total Amount:</strong>
        ₹ {{ number_format($sale->total_amount, 2) }}
    </p>

    <p>
        <strong>Date:</strong>
        {{ $sale->sale_date }}
    </p>

    <hr>

    <h3>
        Thank You For Business ❤️
    </h3>

</body>

</html>