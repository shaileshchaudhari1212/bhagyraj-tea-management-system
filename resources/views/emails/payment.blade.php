<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>Payment Received</title>

</head>

<body style="font-family: Arial">

    <h2>
        Payment Received Successfully
    </h2>

    <hr>

    <p>
        Dealer:
        {{ $payment->dealer->name }}
    </p>

    <p>
        Amount:
        ₹ {{ number_format($payment->amount, 2) }}
    </p>

    <p>
        Payment Type:
        {{ $payment->payment_type }}
    </p>

    <p>
        Notes:
        {{ $payment->notes }}
    </p>

    <hr>

    <h3>
        Thank You ❤️
    </h3>

</body>

</html>