

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-6">

        Dealer Ledger

    </h1>

    <div class="grid grid-cols-3 gap-5 mb-8">

        <div class="bg-green-500 text-white p-6 rounded-2xl">

            <p>Total Sales</p>

            <h2 class="text-3xl font-bold">

                ₹ <?php echo e(number_format($totalSales, 2)); ?>


            </h2>

        </div>

        <div class="bg-blue-500 text-white p-6 rounded-2xl">

            <p>Total Payments</p>

            <h2 class="text-3xl font-bold">

                ₹ <?php echo e(number_format($totalPayments, 2)); ?>


            </h2>

        </div>

        <div class="bg-red-500 text-white p-6 rounded-2xl">

            <p>Remaining Balance</p>

            <h2 class="text-3xl font-bold">

                ₹ <?php echo e(number_format($balance, 2)); ?>


            </h2>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 mb-8">

        <h2 class="text-2xl font-bold mb-5">

            Sales History

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">Invoice</th>
                    <th class="text-left">Tea</th>
                    <th class="text-left">Qty</th>
                    <th class="text-left">Total</th>
                    <th class="text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b">

                        <td class="py-3">

                            <?php echo e($sale->invoice_no); ?>


                        </td>

                        <td>

                            <?php echo e($sale->stock->tea_name); ?>


                        </td>

                        <td>

                            <?php echo e($sale->quantity); ?> KG

                        </td>

                        <td>

                            ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


                        </td>

                        <td>

                            <?php echo e($sale->sale_date); ?>


                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-5">

            Payment History

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">Amount</th>
                    <th class="text-left">Type</th>
                    <th class="text-left">Notes</th>
                    <th class="text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b">

                        <td class="py-3">

                            ₹ <?php echo e(number_format($payment->amount, 2)); ?>


                        </td>

                        <td>

                            <?php echo e($payment->payment_type); ?>


                        </td>

                        <td>

                            <?php echo e($payment->notes); ?>


                        </td>

                        <td>

                            <?php echo e($payment->payment_date); ?>


                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/dealers/ledger.blade.php ENDPATH**/ ?>