@extends('layouts.admin')

@section('content')

    <h1 class="text-4xl font-bold mb-10">
        Business Reports & Analytics
    </h1>

    <div class="grid grid-cols-2 gap-6 mb-10">

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">

            <h2 class="text-gray-500 mb-2">
                Total Revenue
            </h2>

            <p class="text-4xl font-bold text-green-600">

                ₹ {{ number_format($totalRevenue, 2) }}

            </p>

        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-lg transition">

            <h2 class="text-gray-500 mb-2">
                Total Payments
            </h2>

            <p class="text-4xl font-bold text-blue-600">

                ₹ {{ number_format($totalPayments, 2) }}

            </p>

        </div>

    </div>

    <div class="bg-white p-6 rounded shadow mb-10">

        <h2 class="text-2xl font-bold mb-8">
            Monthly Revenue Graph
        </h2>

        <canvas id="salesChart"></canvas>

    </div>

    <div class="flex gap-4 mb-10">

        <a href="{{ route('reports.pdf') }}" class="bg-red-600 text-white px-6 py-3 rounded">
            Export PDF
        </a>

        <a href="{{ route('reports.excel') }}" class="bg-green-600 text-white px-6 py-3 rounded">
            Export Excel
        </a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        const ctx = document.getElementById('salesChart');

        new Chart(ctx, {

            type: 'bar',

            data: {

                labels: @json($monthlyLabels),

                datasets: [{

                    label: 'Monthly Revenue',

                    data: @json($monthlySales),

                    borderWidth: 1

                }]

            },

        });

    </script>

@endsection