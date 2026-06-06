

<?php $__env->startSection('content'); ?>

    <h1 class="text-4xl font-bold mb-6">
        Dealer Stock Requests
    </h1>

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

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[1000px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Dealer</th>
                    <th>Tea</th>
                    <th>Quantity</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="border-b">

                            <td class="py-4">
                                <?php echo e($request->dealer->name); ?>

                            </td>

                            <td>
                                <?php echo e($request->stock->tea_name); ?>

                            </td>

                            <td>
                                <?php echo e($request->quantity); ?> KG
                            </td>

                            <td>
                                <?php echo e($request->notes); ?>

                            </td>

                            <td>

                                <span class="
                                            px-3 py-1 rounded text-white
                                            <?php echo e(strtolower($request->status) == 'pending'
                    ? 'bg-yellow-500'
                    : 'bg-green-500'); ?>

                                        ">

                                    <?php echo e($request->status); ?>


                                </span>

                            </td>

                            <td>

                                <?php if(strtolower($request->status) == 'pending'): ?>

                                    <form action="<?php echo e(route('admin.requests.approve', $request->id)); ?>" method="POST">

                                        <?php echo csrf_field(); ?>

                                        <button type="submit"
                                            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">

                                            Approve

                                        </button>

                                    </form>

                                <?php else: ?>

                                    <span class="text-gray-500">

                                        Completed

                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/requests/index.blade.php ENDPATH**/ ?>