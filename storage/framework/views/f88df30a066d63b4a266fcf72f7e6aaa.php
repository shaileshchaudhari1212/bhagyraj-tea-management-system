

<?php $__env->startSection('content'); ?>

    <h1 class="text-5xl font-extrabold mb-10 text-gray-900">
        Dealer Dashboard
    </h1>

    <!-- STATS -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">

        <div class="bg-white rounded-2xl shadow p-8 border border-gray-100">

            <p class="text-gray-500 text-lg mb-3">
                Total Purchase
            </p>

            <h2 class="text-5xl font-extrabold text-blue-600">

                ₹ <?php echo e(number_format($totalPurchase, 2)); ?>


            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow p-8 border border-gray-100">

            <p class="text-gray-500 text-lg mb-3">
                Total Payment
            </p>

            <h2 class="text-5xl font-extrabold text-green-600">

                ₹ <?php echo e(number_format($totalPayment, 2)); ?>


            </h2>

        </div>

        <div class="bg-white rounded-2xl shadow p-8 border border-gray-100">

            <p class="text-gray-500 text-lg mb-3">
                Remaining Balance
            </p>

            <h2 class="text-5xl font-extrabold text-red-600">

                ₹ <?php echo e(number_format($remainingBalance, 2)); ?>


            </h2>

        </div>

    </div>

    <!-- INVOICES -->

    <div class="bg-white rounded-2xl shadow overflow-hidden mb-10">

        <div class="p-6 border-b bg-gray-50">

            <h2 class="text-3xl font-bold">
                My Invoices
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-5 font-semibold">
                            Invoice
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Tea
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Quantity
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Total
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-5 font-semibold text-gray-800">

                                <?php echo e($sale->invoice_number); ?>


                            </td>

                            <td class="p-5">

                                <?php echo e($sale->stock->tea_name); ?>


                            </td>

                            <td class="p-5">

                                <?php echo e($sale->quantity); ?> KG

                            </td>

                            <td class="p-5 font-bold text-green-600">

                                ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


                            </td>

                            <td class="p-5 text-gray-600">

                                <?php echo e(\Carbon\Carbon::parse($sale->sale_date)->format('d M Y')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="5" class="text-center p-8 text-gray-500">

                                No Invoices Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- PAYMENTS -->

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="p-6 border-b bg-gray-50">

            <h2 class="text-3xl font-bold">
                Payment History
            </h2>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full min-w-[1000px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-5 font-semibold">
                            Amount
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Type
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Notes
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-5 font-bold text-green-600">

                                ₹ <?php echo e(number_format($payment->amount, 2)); ?>


                            </td>

                            <td class="p-5">

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                    <?php echo e(ucfirst($payment->payment_type)); ?>


                                </span>

                            </td>

                            <td class="p-5 text-gray-700">

                                <?php echo e($payment->notes ?: 'No Notes'); ?>


                            </td>

                            <td class="p-5 text-gray-600">

                                <?php echo e(\Carbon\Carbon::parse($payment->payment_date)->format('d M Y')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="4" class="text-center p-8 text-gray-500">

                                No Payments Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/dashboard.blade.php ENDPATH**/ ?>