

<?php $__env->startSection('content'); ?>

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Payment Management
        </h1>

        <a href="<?php echo e(route('payments.create')); ?>" class="bg-black text-white px-5 py-3 rounded-xl">
            Add Payment
        </a>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Dealer</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Notes</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                    <tr class="border-b">

                        <td class="py-4">
                            <?php echo e($payment->dealer->name); ?>

                        </td>

                        <td>
                            ₹ <?php echo e(number_format($payment->amount, 2)); ?>

                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                <?php echo e($payment->payment_type); ?>


                            </span>

                        </td>

                        <td>
                            <?php echo e($payment->payment_date); ?>

                        </td>

                        <td>
                            <?php echo e($payment->notes); ?>

                        </td>

                        <td>

                            <a href="<?php echo e(route('payments.edit', $payment->id)); ?>"
                                class="bg-blue-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                        </td>

                    </tr>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </tbody>

        </table>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/payments/index.blade.php ENDPATH**/ ?>