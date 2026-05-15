

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-8">
        Stock Requests
    </h1>

    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <div class="bg-white p-6 rounded-2xl shadow mb-10">

        <form action="<?php echo e(route('dealer.requests.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="font-bold block mb-2">
                        Tea Product
                    </label>

                    <select name="stock_id"
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                        <option value="">
                            Select Tea
                        </option>

                        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($stock->id); ?>">

                                <?php echo e($stock->tea_name); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Quantity
                    </label>

                    <input type="number" name="quantity"
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                </div>

            </div>

            <div class="mt-6">

                <label class="font-bold block mb-2">
                    Notes
                </label>

                <textarea name="notes" rows="4"
                    class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"></textarea>

            </div>

            <button class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl mt-6 transition">

                Send Request

            </button>

        </form>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-4 font-semibold">
                            Tea
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Quantity
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Status
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-4">

                                <?php echo e($request->stock->tea_name); ?>


                            </td>

                            <td class="p-4">

                                <?php echo e($request->quantity); ?> KG

                            </td>

                            <td class="p-4">

                                <?php if($request->status == 'pending'): ?>

                                    <span class="bg-yellow-500 text-white px-4 py-1 rounded-full text-sm">

                                        Pending

                                    </span>

                                <?php elseif($request->status == 'approved'): ?>

                                    <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">

                                        Approved

                                    </span>

                                <?php else: ?>

                                    <span class="bg-red-500 text-white px-4 py-1 rounded-full text-sm">

                                        Rejected

                                    </span>

                                <?php endif; ?>

                            </td>

                            <td class="p-4 text-gray-600">

                                <?php echo e($request->created_at->format('d M Y')); ?>


                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <tr>

                            <td colspan="4" class="p-6 text-center text-gray-500">

                                No Stock Requests Found

                            </td>

                        </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/requests/index.blade.php ENDPATH**/ ?>