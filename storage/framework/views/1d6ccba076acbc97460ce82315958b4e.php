

<?php $__env->startSection('content'); ?>

    <div class="flex justify-between items-center mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            Sales Management
        </h1>

        <a href="<?php echo e(route('sales.create')); ?>" class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-2xl shadow">

            Create Sale

        </a>

    </div>


    <?php if(session('error')): ?>

        <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl mb-6">

            <?php echo e(session('error')); ?>


        </div>

    <?php endif; ?>

    <div class="bg-white rounded-3xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="p-5 text-left">
                            Invoice No
                        </th>

                        <th class="p-5 text-left">
                            Dealer
                        </th>

                        <th class="p-5 text-left">
                            Email Status
                        </th>

                        <th class="p-5 text-left">
                            Tea
                        </th>

                        <th class="p-5 text-left">
                            Qty
                        </th>

                        <th class="p-5 text-left">
                            Price/KG
                        </th>

                        <th class="p-5 text-left">
                            Total
                        </th>

                        <th class="p-5 text-left">
                            Date
                        </th>

                        <th class="p-5 text-left">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <?php $__currentLoopData = $sales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-5 font-semibold text-gray-700">

                                <?php echo e($sale->invoice_number); ?>


                            </td>

                            <td class="p-5">

                                <?php echo e($sale->dealer->name); ?>


                            </td>

                            <td class="p-5">

                                <?php if($sale->email_sent): ?>

                                    <div class="flex items-center gap-3">

                                        <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">

                                            Email Sent

                                        </span>

                                        <form action="<?php echo e(route('sales.send.mail', $sale->id)); ?>" method="POST">

                                            <?php echo csrf_field(); ?>

                                            <button type="submit"
                                                class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm">

                                                Send Again

                                            </button>

                                        </form>

                                    </div>

                                <?php else: ?>

                                    <div class="flex items-center gap-3">


                                        <form action="<?php echo e(route('sales.send.mail', $sale->id)); ?>" method="POST">

                                            <?php echo csrf_field(); ?>

                                            <button type="submit"
                                                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">

                                                Send Mail

                                            </button>

                                        </form>

                                    </div>

                                <?php endif; ?>

                            </td>

                            <td class="p-5">

                                <?php echo e($sale->stock->tea_name); ?>


                            </td>

                            <td class="p-5">

                                <?php echo e($sale->quantity); ?> KG

                            </td>

                            <td class="p-5">

                                ₹ <?php echo e(number_format($sale->price_per_kg, 2)); ?>


                            </td>

                            <td class="p-5 font-bold text-green-600">

                                ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


                            </td>

                            <td class="p-5">

                                <?php echo e($sale->sale_date); ?>


                            </td>

                            <td class="p-5">

                                <a href="<?php echo e(route('sales.invoice', $sale->id)); ?>"
                                    class="bg-black hover:bg-gray-800 text-white px-5 py-2 rounded-xl">

                                    Invoice

                                </a>

                            </td>

                        </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </tbody>

            </table>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/sales/index.blade.php ENDPATH**/ ?>