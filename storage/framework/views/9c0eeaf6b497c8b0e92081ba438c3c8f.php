

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-6">
            Create Sale
        </h1>

        <?php if(session('error')): ?>

            <div class="bg-red-100 text-red-700 p-4 rounded mb-8">

                <?php echo e(session('error')); ?>


            </div>

        <?php endif; ?>

        <form action="<?php echo e(route('sales.store')); ?>" method="POST">

            <?php echo csrf_field(); ?>

            <div class="bg-white p-6 rounded-xl shadow space-y-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Dealer
                    </label>

                    <select name="dealer_id" class="w-full border rounded-lg p-3">

                        <option value="">
                            Select Dealer
                        </option>

                        <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($dealer->id); ?>">

                                <?php echo e($dealer->name); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Tea Product
                    </label>

                    <select name="stock_id" class="w-full border rounded-lg p-3">

                        <option value="">
                            Select Tea
                        </option>

                        <?php $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($stock->id); ?>">

                                <?php echo e($stock->tea_name); ?>

                                -
                                <?php echo e($stock->quantity); ?> KG

                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Quantity (KG)
                    </label>

                    <input type="number" name="quantity" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Sale Date
                    </label>

                    <input type="date" name="sale_date" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <textarea name="notes" class="w-full border rounded-lg p-3"></textarea>

                </div>

                <button class="bg-black text-white px-6 py-3 rounded-lg">
                    Create Sale
                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/sales/create.blade.php ENDPATH**/ ?>