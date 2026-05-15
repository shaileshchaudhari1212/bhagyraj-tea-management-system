

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-8">

            Dashboard Analytics

        </h1>

        

        <div class="grid grid-cols-4 gap-6 mb-8">

            

            <div class="bg-green-500 text-white p-6 rounded-xl shadow">

                <h2 class="text-lg mb-2">

                    Total Revenue

                </h2>

                <p class="text-3xl font-bold">

                    Rs. <?php echo e(number_format($totalRevenue, 2)); ?>


                </p>

            </div>

            

            <div class="bg-blue-500 text-white p-6 rounded-xl shadow">

                <h2 class="text-lg mb-2">

                    Total Sales

                </h2>

                <p class="text-3xl font-bold">

                    <?php echo e($totalSales); ?>


                </p>

            </div>

            

            <div class="bg-purple-500 text-white p-6 rounded-xl shadow">

                <h2 class="text-lg mb-2">

                    Total Dealers

                </h2>

                <p class="text-3xl font-bold">

                    <?php echo e($totalDealers); ?>


                </p>

            </div>

            

            <div class="bg-orange-500 text-white p-6 rounded-xl shadow">

                <h2 class="text-lg mb-2">

                    Total Stock

                </h2>

                <p class="text-3xl font-bold">

                    <?php echo e($totalStock); ?> KG

                </p>

            </div>

        </div>

        

        <div class="grid grid-cols-2 gap-6 mb-8">

            

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-2xl font-bold mb-4">

                    Monthly Revenue

                </h2>

                <p class="text-4xl font-bold text-green-600">

                    Rs. <?php echo e(number_format($monthlySales, 2)); ?>


                </p>

            </div>

            

            <div class="bg-white p-6 rounded-xl shadow">

                <h2 class="text-2xl font-bold mb-4">

                    Total Payments Received

                </h2>

                <p class="text-4xl font-bold text-blue-600">

                    Rs. <?php echo e(number_format($totalPayments, 2)); ?>


                </p>

            </div>

        </div>

        

        <div class="bg-white p-6 rounded-xl shadow">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-2xl font-bold text-red-600">

                    Low Stock Alert

                </h2>

                <span class="bg-red-500 text-white px-4 py-2 rounded-full">

                    <?php echo e(count($lowStocks)); ?> Items

                </span>

            </div>

            <div class="overflow-x-auto">

    <table class="w-full min-w-[800px]">

</table>

</div>

                <thead>

                    <tr class="border-b">

                        <th class="text-left py-3">
                            Tea Name
                        </th>

                        <th class="text-left py-3">
                            Quantity
                        </th>

                        <th class="text-left py-3">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $lowStocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-b">

                            <td class="py-4">

                                <?php echo e($stock->tea_name); ?>


                            </td>

                            <td class="py-4">

                                <?php echo e($stock->quantity); ?> KG

                            </td>

                            <td class="py-4">

                                <span class="bg-red-500 text-white px-3 py-1 rounded">

                                    LOW

                                </span>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="3" class="text-center py-6 text-gray-500">

                                No Low Stock Items

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>