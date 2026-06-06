

<?php $__env->startSection('content'); ?>

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Stock Requests
        </h1>

    </div>

    <?php if(session('success')): ?>

        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">

            <?php echo e(session('success')); ?>


        </div>

    <?php endif; ?>

    <?php if(session('error')): ?>

        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

            <?php echo e(session('error')); ?>


        </div>

    <?php endif; ?>

    <!-- REQUEST FORM -->

    <div class="bg-white rounded-2xl shadow p-6 mb-8">

        <form action="<?php echo e(route('dealer.requests.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="grid md:grid-cols-3 gap-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Select Tea
                    </label>

                    <select name="stock_id" class="w-full border rounded-xl p-3" required>

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

                    <label class="block mb-2 font-semibold">
                        Quantity (KG)
                    </label>

                    <input type="number" name="quantity" class="w-full border rounded-xl p-3" required>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <input type="text" name="notes" class="w-full border rounded-xl p-3">

                </div>

            </div>

            <button type="submit" class="mt-6 bg-black text-white px-6 py-3 rounded-xl">

                Send Request

            </button>

        </form>

    </div>

    <!-- REQUEST HISTORY -->

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Tea</th>
                    <th>Quantity</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Date</th>

                </tr>

            </thead>

            <tbody>

                <?php $__empty_1 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr class="border-b">

                        <td class="py-4">

                            <?php echo e($request->stock->tea_name ?? 'N/A'); ?>


                        </td>

                        <td>

                            <?php echo e($request->quantity); ?> KG

                        </td>

                        <td>

                            <?php echo e($request->notes); ?>


                        </td>

                        <td>

                            <?php if($request->status == 'pending'): ?>

                                <span class="bg-yellow-500 text-white px-3 py-1 rounded">

                                    Pending

                                </span>

                            <?php elseif($request->status == 'approved'): ?>

                                <span class="bg-green-500 text-white px-3 py-1 rounded">

                                    Approved

                                </span>

                            <?php else: ?>

                                <span class="bg-red-500 text-white px-3 py-1 rounded">

                                    Rejected

                                </span>

                            <?php endif; ?>

                        </td>

                        <td>

                            <?php echo e($request->created_at->format('d M Y')); ?>


                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>

                        <td colspan="5" class="text-center py-6 text-gray-500">

                            No Requests Found

                        </td>

                    </tr>

                <?php endif; ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/requests/index.blade.php ENDPATH**/ ?>