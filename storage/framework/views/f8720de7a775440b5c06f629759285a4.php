<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bhagyraj Tea</title>

    <?php echo app('Illuminate\Foundation\Vite')([
    'resources/css/app.css',
    'resources/js/app.js'
]); ?>

</head>

<body class="bg-gray-100">

    <div class="flex min-h-screen">

        <!-- MOBILE OVERLAY -->

        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden"></div>

        <!-- SIDEBAR -->

        <aside id="sidebar"
            class="fixed md:static z-50 top-0 left-0 w-64 bg-black text-white min-h-screen transform -translate-x-full md:translate-x-0 transition duration-300">

            <div class="p-6 text-4xl font-extrabold border-b border-gray-800">

                Bhagyraj Tea

            </div>

            <nav class="p-6 space-y-2 text-lg">

                <a href="/admin/dashboard" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Dashboard
                </a>

                <a href="/admin/dealers" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Dealers
                </a>

                <a href="/admin/stock" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Stock
                </a>

                <a href="/admin/payments" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Payments
                </a>

                <a href="/admin/sales" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Sales
                </a>

                <a href="/admin/reports" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Reports
                </a>

                <a href="/admin/requests" class="block px-4 py-3 rounded hover:bg-gray-800 transition">
                    Stock Requests
                </a>

            </nav>

        </aside>

        <!-- MAIN -->

        <div class="flex-1">

            <!-- TOPBAR -->

            <header class="bg-white shadow">

                <div class="flex items-center justify-between px-6 py-4">

                    <div class="flex items-center gap-4">

                        <!-- MOBILE BUTTON -->

                        <button id="menuBtn" class="md:hidden bg-black text-white px-3 py-2 rounded">
                            ☰
                        </button>

                        <h1 class="text-2xl font-bold">
                            Dashboard
                        </h1>

                    </div>

                    <div class="flex items-center gap-6">

                        <span class="font-semibold">

                            <?php echo e(auth()->user()->name); ?>


                        </span>

                        <form method="POST" action="<?php echo e(route('logout')); ?>">
                        
                            <?php echo csrf_field(); ?>
                        
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded transition">
                        
                                Logout
                        
                            </button>
                        
                        </form>

                    </div>

                </div>

            </header>

            <!-- CONTENT -->

            <main class="p-6">

                <?php if(session('success')): ?>

                    <div class="bg-green-100 text-green-700 p-4 rounded mb-8">

                        <?php echo e(session('success')); ?>


                    </div>

                <?php endif; ?>

                <?php echo $__env->yieldContent('content'); ?>

            </main>

        </div>

    </div>

    <script>

        const sidebar = document.getElementById('sidebar');

        const overlay = document.getElementById('overlay');

        const menuBtn = document.getElementById('menuBtn');

        menuBtn.addEventListener('click', () => {

            sidebar.classList.remove('-translate-x-full');

            overlay.classList.remove('hidden');

        });

        overlay.addEventListener('click', () => {

            sidebar.classList.add('-translate-x-full');

            overlay.classList.add('hidden');

        });

    </script>

</body>

</html><?php /**PATH C:\laragon\www\bhagyraj-tea\resources\views/layouts/admin.blade.php ENDPATH**/ ?>