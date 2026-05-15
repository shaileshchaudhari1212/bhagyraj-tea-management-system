

<?php $__env->startSection('content'); ?>

    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Stock Management
        </h1>

        <a href="<?php echo e(route('stock.create')); ?>"
            class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl transition shadow">

            Add Stock

        </a>

    </div>

    <?php if(session('success')): ?>

        <div class="bg-green-100 border border-green-300 text-green-700 px-4 py-3 rounded-xl mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <form method="GET" class="mb-6">

        <div class="flex flex-col md:flex-row gap-3">

            <input type="text" name="search" value="<?php echo e($search); ?>" placeholder="Search Tea Product..."
                class="w-full border border-gray-300 rounded-xl p-3 focus:ring-2 focus:ring-black focus:outline-none">

            <button class="bg-black hover:bg-gray-800 text-white px-8 py-3 rounded-xl transition">

                Search

            </button>

        </div>

    </form>

    <div class="bg-white shadow-lg rounded-2xl overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Tea Name
                        </th>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Quantity
                        </th>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Purchase Price
                        </th>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Selling Price
                        </th>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Status
                        </th>

                        <th class="text-left p-4 font-semibold text-gray-700">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-4 font-medium text-gray-800">
                                <?php echo e($stock->tea_name); ?>

                            </td>

                            <td class="p-4 text-gray-700">
                                <?php echo e($stock->quantity); ?> KG
                            </td>

                            <td class="p-4 text-gray-700">
                                ₹ <?php echo e(number_format($stock->purchase_price, 2)); ?>

                            </td>

                            <td class="p-4 text-green-600 font-semibold">
                                ₹ <?php echo e(number_format($stock->selling_price, 2)); ?>

                            </td>

                            <td class="p-4">

                                <?php if($stock->status == 'available'): ?>

                                    <span class="bg-green-500 text-white px-3 py-1 rounded-full text-sm">

                                        Available

                                    </span>

                                <?php elseif($stock->status == 'low'): ?>

                                    <span class="bg-yellow-500 text-white px-3 py-1 rounded-full text-sm">

                                        Low

                                    </span>

                                <?php else: ?>

                                    <span class="bg-red-500 text-white px-3 py-1 rounded-full text-sm">

                                        Out Of Stock

                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="p-4">

                                <div class="flex gap-2">

                                    <a href="<?php echo e(route('stock.edit', $stock->id)); ?>"
                                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">

                                        Edit

                                    </a>

                                    <form action="<?php echo e(route('stock.destroy', $stock->id)); ?>" method="POST">

                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>

                                        <button type="submit"
                                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg transition">

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="6" class="text-center p-8 text-gray-500">

                                No Stock Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/stock/index.blade.php ENDPATH**/ ?>