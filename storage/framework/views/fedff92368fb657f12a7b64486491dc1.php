

<?php $__env->startSection('content'); ?>

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Dealers
        </h1>

        <a href="<?php echo e(route('dealers.create')); ?>" class="bg-black text-white px-5 py-3 rounded-xl">
            Add Dealer
        </a>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Name</th>
                    <th>Shop</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">
                            <?php echo e($dealer->name); ?>

                        </td>

                        <td>
                            <?php echo e($dealer->shop_name); ?>

                        </td>

                        <td>
                            <?php echo e($dealer->mobile); ?>

                        </td>

                        <td>
                            <?php echo e($dealer->email); ?>

                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                <?php echo e($dealer->status); ?>


                            </span>

                        </td>

                        <td class="space-x-2 text-center">

                            <a href="<?php echo e(route('dealers.ledger', $dealer->id)); ?>" class="bg-green-600 text-white px-3 py-2 rounded">
                                Ledger
                            </a>

                            <a href="<?php echo e(route('dealers.edit', $dealer->id)); ?>" class="bg-blue-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="<?php echo e(route('dealers.destroy', $dealer->id)); ?>" method="POST" class="inline">

                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button class="bg-red-500 text-white px-3 py-2 rounded">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/dealers/index.blade.php ENDPATH**/ ?>