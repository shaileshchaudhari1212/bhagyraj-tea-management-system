@extends('layouts.dealer')

@section('content')

    <div class="bg-white rounded-2xl shadow p-8">

        <div class="flex justify-between items-start mb-10">

            <div>

                <h1 class="text-5xl font-extrabold text-black">
                    Bhagyraj Tea
                </h1>

                <p class="text-gray-500 mt-2">
                    Premium Tea Supplier
                </p>

            </div>

            <div class="text-right">

                <h2 class="text-4xl font-bold">
                    INVOICE
                </h2>

                <p class="mt-4 text-lg">
                    {{ $sale->invoice_number }}
                </p>

                <p class="mt-2 text-gray-600">
                    Date:
                    {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}
                </p>

            </div>

        </div>

        <div class="mb-10">

            <h3 class="text-2xl font-bold mb-4">
                Dealer Details
            </h3>

            <p class="text-lg">
                {{ $sale->dealer->name }}
            </p>

            <p class="text-lg">
                {{ $sale->dealer->shop_name }}
            </p>

            <p class="text-lg">
                {{ $sale->dealer->phone }}
            </p>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full border">

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

                    <tr class="border-t">

                        <td class="p-4">
                            {{ $sale->stock->tea_name }}
                        </td>

                        <td class="p-4">
                            {{ $sale->quantity }} KG
                        </td>

                        <td class="p-4">
                            ₹ {{ number_format($sale->price_per_kg, 2) }}
                        </td>

                        <td class="p-4 font-bold text-green-600">
                            ₹ {{ number_format($sale->total_amount, 2) }}
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

        <div class="mt-10">

            <button onclick="window.print()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg">

                Print Invoice

            </button>

        </div>

    </div>

@endsection