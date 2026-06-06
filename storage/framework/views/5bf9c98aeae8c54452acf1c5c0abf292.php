

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-8">
        Payment History
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-5 font-semibold">
                            Amount
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Payment Type
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
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/payments.blade.php ENDPATH**/ ?>