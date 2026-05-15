<nav class="bg-black text-white w-64 min-h-screen fixed">

    <div class="p-6 border-b border-gray-800">

        <h1 class="text-4xl font-bold">
            Bhagyraj Tea
        </h1>

    </div>

    <ul class="mt-6 space-y-2">

        <li>

            <a href="{{ url('/admin/dashboard') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Dashboard
            </a>

        </li>

        <li>

            <a href="{{ url('/admin/dealers') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Dealers
            </a>

        </li>

        <li>

            <a href="{{ url('/admin/stock') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Stock
            </a>

        </li>

        <li>

            <a href="{{ url('/admin/payments') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Payments
            </a>

        </li>
        
        <li>
        
            <a href="{{ route('sales.index') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Sales
            </a>
        
        </li>

        <li>
        
            <a href="{{ route('reports.index') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Reports
            </a>
        
        </li>

        <li>
            <a href="{{ route('logs.index') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
                Activity Logs
            </a>
        </li>

        <li>
        
            <a href="{{ route('admin.requests.index') }}" class="block px-6 py-3 hover:bg-gray-900 transition">
        
                Stock Requests
        
            </a>
        
        </li>

    </ul>

</nav>