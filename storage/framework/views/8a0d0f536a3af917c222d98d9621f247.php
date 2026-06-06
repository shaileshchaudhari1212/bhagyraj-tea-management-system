

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-6">

        Available Stock

    </h1>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Tea Name</th>

                    <th>Available Quantity</th>

                    <th>Selling Price</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">

                            <?php echo e($stock->tea_name); ?>


                        </td>

                        <td>

                            <?php echo e($stock->quantity); ?> KG

                        </td>

                        <td class="text-green-600 font-bold">

                            ₹ <?php echo e(number_format($stock->selling_price, 2)); ?>


                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                <?php echo e($stock->status); ?>


                            </span>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="4" class="text-center py-6 text-gray-500">

                            No Stock Available

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/stocks/index.blade.php ENDPATH**/ ?>