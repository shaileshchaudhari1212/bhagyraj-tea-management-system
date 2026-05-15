

<?php $__env->startSection('content'); ?>

    <div class="bg-white p-8 rounded shadow">

        <div class="flex justify-between items-center mb-8">

            <div>

                <h1 class="text-4xl font-bold">
                    Bhagyraj Tea
                </h1>

                <p class="text-gray-500">
                    Premium Tea Supplier
                </p>

            </div>

            <div class="text-right">

                <h2 class="text-2xl font-bold">
                    INVOICE
                </h2>

                <p>
                    <?php echo e($sale->invoice_number); ?>

                </p>

            </div>

        </div>

        <div class="grid grid-cols-2 gap-10 mb-10">

            <div>

                <h3 class="font-bold mb-2">
                    Dealer Details
                </h3>

                <p>
                    <?php echo e($sale->dealer->name); ?>

                </p>

                <p>
                    <?php echo e($sale->dealer->shop_name); ?>

                </p>

                <p>
                    <?php echo e($sale->dealer->mobile); ?>

                </p>

            </div>

            <div class="text-right">

                <p>
                    Date:
                    <?php echo e($sale->sale_date); ?>

                </p>

            </div>

        </div>

        <table class="w-full border">

            <thead class="bg-black text-white">

                <tr>

                    <th class="p-3 text-left">
                        Tea
                    </th>

                    <th class="p-3 text-left">
                        Quantity
                    </th>

                    <th class="p-3 text-left">
                        Price/KG
                    </th>

                    <th class="p-3 text-left">
                        Total
                    </th>

                </tr>

            </thead>

            <tbody>

                <tr class="border-b">

                    <td class="p-3">
                        <?php echo e($sale->stock->tea_name); ?>

                    </td>

                    <td class="p-3">
                        <?php echo e($sale->quantity); ?> KG
                    </td>

                    <td class="p-3">
                        ₹ <?php echo e(number_format($sale->price_per_kg, 2)); ?>

                    </td>

                    <td class="p-3 font-bold text-green-600">
                        ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>

                    </td>

                </tr>

            </tbody>

        </table>

        <div class="mt-10 flex gap-4">

            <a href="<?php echo e(route('sales.invoice.download', $sale->id)); ?>"
                class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">
                Download PDF
            </a>

            <button onclick="window.print()" class="bg-blue-500 text-white px-5 py-2 rounded">
                Print Invoice
            </button>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/admin/sales/invoice.blade.php ENDPATH**/ ?>