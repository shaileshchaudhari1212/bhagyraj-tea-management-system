

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-6">

        Dealer Ledger

    </h1>

    <!-- SUMMARY -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-green-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Total Sales
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ <?php echo e(number_format($totalSales, 2)); ?>


            </h2>

        </div>

        <div class="bg-blue-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Total Received
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ <?php echo e(number_format($totalPayments, 2)); ?>


            </h2>

        </div>

        <div class="bg-red-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Remaining Balance
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ <?php echo e(number_format($balance, 2)); ?>


            </h2>

        </div>

    </div>

    <!-- SALES HISTORY -->

    <div class="bg-white rounded-2xl shadow p-6 mb-8">

        <h2 class="text-2xl font-bold mb-5">

            Sales History

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b bg-gray-100">

                        <th class="py-3 px-3 text-left">
                            Invoice
                        </th>

                        <th class="py-3 px-3 text-left">
                            Tea
                        </th>

                        <th class="py-3 px-3 text-left">
                            Qty
                        </th>

                        <th class="py-3 px-3 text-left">
                            Price/KG
                        </th>

                        <th class="py-3 px-3 text-left">
                            Total
                        </th>

                        <th class="py-3 px-3 text-left">
                            Received
                        </th>

                        <th class="py-3 px-3 text-left">
                            Pending
                        </th>

                        <th class="py-3 px-3 text-left">
                            Status
                        </th>

                        <th class="py-3 px-3 text-left">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-3 font-semibold text-blue-600">

                                <?php echo e($sale->invoice_number ?? 'INV-' . strtoupper(substr(md5($sale->id), 0, 10))); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php echo e($sale->stock->tea_name ?? 'N/A'); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php echo e($sale->quantity); ?> KG

                            </td>

                            <td class="py-3 px-3">

                                ₹ <?php echo e(number_format($sale->price ?? ($sale->total_amount / max($sale->quantity, 1)), 2)); ?>


                            </td>

                            <td class="py-3 px-3 font-bold text-black">

                                ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


                            </td>

                            <td class="py-3 px-3 text-green-600 font-bold">

                                ₹ <?php echo e(number_format($sale->paid_amount, 2)); ?>


                            </td>

                            <td class="py-3 px-3 text-red-600 font-bold">

                                ₹ <?php echo e(number_format($sale->pending_amount, 2)); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php if($sale->payment_status == 'Paid'): ?>

                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">

                                        Paid

                                    </span>

                                <?php elseif($sale->payment_status == 'Partial'): ?>

                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">

                                        Partial

                                    </span>

                                <?php else: ?>

                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">

                                        Pending

                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="py-3 px-3">

                                <?php echo e(\Carbon\Carbon::parse($sale->created_at)->format('d M Y')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="9" class="py-6 text-center text-gray-500">

                                No Sales Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

    <!-- PAYMENT HISTORY -->

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-5">

            Payment History

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b bg-gray-100">

                        <th class="py-3 px-3 text-left">
                            Amount
                        </th>

                        <th class="py-3 px-3 text-left">
                            Type
                        </th>

                        <th class="py-3 px-3 text-left">
                            Notes
                        </th>

                        <th class="py-3 px-3 text-left">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-3 font-bold text-green-600">

                                ₹ <?php echo e(number_format($payment->amount, 2)); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php echo e(ucfirst($payment->payment_type)); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php echo e($payment->notes ?? '-'); ?>


                            </td>

                            <td class="py-3 px-3">

                                <?php echo e(\Carbon\Carbon::parse($payment->payment_date)->format('d M Y')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="4" class="py-6 text-center text-gray-500">

                                No Payments Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/dealers/ledger.blade.php ENDPATH**/ ?>