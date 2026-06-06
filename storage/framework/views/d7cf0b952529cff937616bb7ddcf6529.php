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
        <?php echo e($payment->dealer->name); ?>

    </p>

    <p>
        Amount:
        ₹ <?php echo e(number_format($payment->amount, 2)); ?>

    </p>

    <p>
        Payment Type:
        <?php echo e($payment->payment_type); ?>

    </p>

    <p>
        Notes:
        <?php echo e($payment->notes); ?>

    </p>

    <hr>

    <h3>
        Thank You ❤️
    </h3>

</body>

</html><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/emails/payment.blade.php ENDPATH**/ ?>