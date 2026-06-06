

<?php $__env->startSection('content'); ?>

    <div class="bg-white p-8 rounded-2xl shadow">

        <!-- HEADER -->

        <div class="flex justify-between items-center border-b pb-6 mb-8">

            <div class="flex items-center gap-5">

                <img src="<?php echo e(asset('images/logo.png')); ?>" alt="Bhagyraj Tea" class="h-24">

                <div>

                    <h1 class="text-4xl font-bold text-red-600">
                        Bhagyraj Tea
                    </h1>

                    <p class="text-gray-500">
                        Premium Tea Supplier
                    </p>

                    <p class="text-sm mt-2">
                        📞 +91 9875858984
                    </p>

                    <p class="text-sm">
                        📧 info@bhagyrajtea.com
                    </p>

                    <p class="text-sm text-blue-600">
                        🌐 https://bhagyrajtea.com/
                    </p>

                </div>

            </div>

            <div class="text-right">

                <h2 class="text-4xl font-bold">
                    INVOICE
                </h2>

                <p class="mt-3 text-lg">

                    Invoice #
                    <?php echo e($sale->invoice_number ?? 'INV-' . strtoupper(uniqid())); ?>


                </p>

                <p class="text-gray-600">

                    Date:
                    <?php echo e(date('d M Y', strtotime($sale->created_at))); ?>


                </p>

            </div>

        </div>

        <!-- DEALER DETAILS -->

        <div class="mb-10">

            <h3 class="text-2xl font-bold mb-4">

                Dealer Details

            </h3>

            <div class="space-y-2 text-lg">

                <p>

                    <strong>Name:</strong>
                    <?php echo e($sale->dealer->name); ?>


                </p>

                <p>

                    <strong>Shop:</strong>
                    <?php echo e($sale->dealer->shop_name); ?>


                </p>

                <p>

                    <strong>Mobile:</strong>
                    <?php echo e($sale->dealer->mobile); ?>


                </p>

                <p>

                    <strong>Email:</strong>
                    <?php echo e($sale->dealer->email); ?>


                </p>

            </div>

        </div>

        <!-- TABLE -->

        <div class="overflow-x-auto">

            <table class="w-full border border-gray-300">

                <thead class="bg-black text-white">

                    <tr>

                        <th class="p-4 text-left">
                            Tea
                        </th>

                        <th class="p-4 text-left">
                            Quantity
                        </th>

                        <th class="p-4 text-left">
                            Price/KG
                        </th>

                        <th class="p-4 text-left">
                            Total
                        </th>

                    </tr>

                </thead>

                <tbody>

                    <tr class="border-b">

                        <td class="p-4">

                            <?php echo e($sale->stock->tea_name); ?>


                        </td>

                        <td class="p-4">

                            <?php echo e($sale->quantity); ?> KG

                        </td>

                        <td class="p-4">

                            ₹ <?php echo e(number_format($sale->total_amount / $sale->quantity, 2)); ?>


                        </td>

                        <td class="p-4 font-bold text-green-600 text-lg">

                            ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <!-- GRAND TOTAL -->

        <div class="mt-10 text-right">

            <h2 class="text-4xl font-bold text-green-600">

                Grand Total:
                ₹ <?php echo e(number_format($sale->total_amount, 2)); ?>


            </h2>

        </div>

        <!-- FOOTER -->

        <div class="mt-12 border-t pt-6 text-center text-gray-500">

            <p>

                Thank you for doing business with Bhagyraj Tea

            </p>

        </div>

        <!-- BUTTONS -->

        <div class="mt-10 flex gap-4">

            <a href="<?php echo e(route('sales.invoice.download', $sale->id)); ?>"
                class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl transition">

                Download PDF

            </a>

            <button onclick="window.print()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl transition">

                Print Invoice

            </button>

        </div>

    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dealer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/dealer/invoice.blade.php ENDPATH**/ ?>