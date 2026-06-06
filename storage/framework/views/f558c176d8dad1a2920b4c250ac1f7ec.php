

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-6">
            Add Payment
        </h1>

        <form action="<?php echo e(route('payments.store')); ?>" method="POST">

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
                        Amount
                    </label>

                    <input type="number" step="0.01" name="amount" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Type
                    </label>

                    <select name="payment_type" class="w-full border rounded-lg p-3">

                        <option value="cash">
                            Cash
                        </option>

                        <option value="online">
                            Online
                        </option>

                        <option value="cheque">
                            Cheque
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Date
                    </label>

                    <input type="date" name="payment_date" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <textarea name="notes" class="w-full border rounded-lg p-3"></textarea>

                </div>

                <button class="bg-black text-white px-6 py-3 rounded-lg">
                    Save Payment
                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/payments/create.blade.php ENDPATH**/ ?>