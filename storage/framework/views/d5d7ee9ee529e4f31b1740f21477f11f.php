

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Stock
        </h1>

        <form action="<?php echo e(route('stock.update', $stock->id)); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>

                    <label class="block mb-1">
                        Tea Name
                    </label>

                    <input type="text" name="tea_name" value="<?php echo e($stock->tea_name); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Quantity
                    </label>

                    <input type="number" name="quantity" value="<?php echo e($stock->quantity); ?>" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Purchase Price
                    </label>

                    <input type="number" step="0.01" name="purchase_price" value="<?php echo e($stock->purchase_price); ?>"
                        class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Selling Price
                    </label>

                    <input type="number" step="0.01" name="selling_price" value="<?php echo e($stock->selling_price); ?>"
                        class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Status
                    </label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="available" <?php echo e($stock->status == 'available' ? 'selected' : ''); ?>>

                            Available

                        </option>

                        <option value="low" <?php echo e($stock->status == 'low' ? 'selected' : ''); ?>>

                            Low

                        </option>

                        <option value="out_of_stock" <?php echo e($stock->status == 'out_of_stock' ? 'selected' : ''); ?>>

                            Out Of Stock

                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-1">
                        Description
                    </label>

                    <textarea name="description" class="w-full border rounded p-2"><?php echo e($stock->description); ?></textarea>

                </div>

                <button type="submit" class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                    Update Stock

                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/stock/edit.blade.php ENDPATH**/ ?>