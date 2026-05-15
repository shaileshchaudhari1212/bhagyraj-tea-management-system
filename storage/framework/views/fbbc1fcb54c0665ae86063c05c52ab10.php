

<?php $__env->startSection('content'); ?>

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-6">
            Edit Payment
        </h1>

        <form action="<?php echo e(route('payments.update', $payment->id)); ?>" method="POST">

            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="bg-white p-6 rounded-xl shadow space-y-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Dealer
                    </label>

                    <select name="dealer_id" class="w-full border rounded-lg p-3">

                        <?php $__currentLoopData = $dealers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dealer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <option value="<?php echo e($dealer->id); ?>" <?php echo e($payment->dealer_id == $dealer->id ? 'selected' : ''); ?>>

                                <?php echo e($dealer->name); ?>


                            </option>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Amount
                    </label>

                    <input type="number" step="0.01" name="amount" value="<?php echo e($payment->amount); ?>"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Type
                    </label>

                    <select name="payment_type" class="w-full border rounded-lg p-3">

                        <option value="cash" <?php echo e($payment->payment_type == 'cash' ? 'selected' : ''); ?>>
                            Cash
                        </option>

                        <option value="online" <?php echo e($payment->payment_type == 'online' ? 'selected' : ''); ?>>
                            Online
                        </option>

                        <option value="cheque" <?php echo e($payment->payment_type == 'cheque' ? 'selected' : ''); ?>>
                            Cheque
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Date
                    </label>

                    <input type="date" name="payment_date" value="<?php echo e($payment->payment_date); ?>"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <textarea name="notes" class="w-full border rounded-lg p-3"><?php echo e($payment->notes); ?></textarea>

                </div>

                <button class="bg-black text-white px-6 py-3 rounded-lg">
                    Update Payment
                </button>

            </div>

        </form>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/payments/edit.blade.php ENDPATH**/ ?>