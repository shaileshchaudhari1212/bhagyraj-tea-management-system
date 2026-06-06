

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-8">
        My Invoices
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-6">
                            Invoice
                        </th>

                        <th class="text-left p-6">
                            Tea
                        </th>

                        <th class="text-left p-6">
                            Quantity
                        </th>

                        <th class="text-left p-6">
                            Total
                        </th>

                        <th class="text-left p-6">
                            Date
                        </th>

                        <th class="text-left p-6">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-6 font-semibold">
                                <?php echo e($sale->invoice_number); ?>

                            </td>

                            <td class="p-6">
                                <?php echo e($sale->stock->tea_name); ?>

                            </td>

                            <td class="p-6">
                                <?php echo e($sale->quantity); ?> KG
                            </td>

                            <td class="p-6 font-bold text-green-600">
                                ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>

                            </td>

                            <td class="p-6">
                                <?php echo e(\Carbon\Carbon::parse($sale->sale_date)->format('d M Y')); ?>

                            </td>

                            <td class="p-6">

                                <a href="<?php echo e(route('dealer.invoice', $sale->id)); ?>"
                                    class="bg-black hover:bg-gray-800 text-white px-5 py-2 rounded-lg transition">
                                    View
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="6" class="text-center p-10 text-gray-500">

                                No Invoices Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/invoices.blade.php ENDPATH**/ ?>