

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Dealer
        </h1>

        <form action="<?php echo e(route('dealers.update', $dealer->id)); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>

                    <label class="block mb-1">
                        Name
                    </label>

                    <input type="text" name="name" value="<?php echo e($dealer->name); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Shop Name
                    </label>

                    <input type="text" name="shop_name" value="<?php echo e($dealer->shop_name); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Mobile
                    </label>

                    <input type="text" name="mobile" value="<?php echo e($dealer->mobile); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Email
                    </label>

                    <input type="email" name="email" value="<?php echo e($dealer->email); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Address
                    </label>

                    <textarea name="address" class="w-full border rounded p-2"><?php echo e($dealer->address); ?></textarea>

                </div>

                <div>

                    <label class="block mb-1">
                        Status
                    </label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="active" <?php echo e($dealer->status == 'active' ? 'selected' : ''); ?>>

                            Active

                        </option>

                        <option value="inactive" <?php echo e($dealer->status == 'inactive' ? 'selected' : ''); ?>>

                            Inactive

                        </option>

                    </select>

                </div>

                <button type="submit" class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                    Update Dealer

                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/dealers/edit.blade.php ENDPATH**/ ?>