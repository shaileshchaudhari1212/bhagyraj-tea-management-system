@extends('layouts.admin')

@section('content')

    <div class="bg-white p-10 rounded-2xl shadow">

        <!-- HEADER -->

        <div class="flex justify-between items-center border-b pb-6 mb-8">

            <div class="flex items-center gap-5">

                <img src="{{ asset('images/logo.png') }}" alt="Bhagyraj Tea" class="h-28">

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

                <h2 class="text-3xl font-bold">
                    INVOICE
                </h2>

                <p class="mt-2">
                    Invoice #
                    {{ $sale->id }}
                </p>

                <p>
                    Date:
                    {{ date('d M Y', strtotime($sale->created_at)) }}
                </p>

            </div>

        </div>

        <!-- DEALER -->

        <div class="grid grid-cols-2 gap-10 mb-10">

            <div>

                <h3 class="font-bold text-lg mb-3">
                    Dealer Details
                </h3>

                <p>
                    <strong>Name:</strong>
                    {{ $sale->dealer->name }}
                </p>

                <p>
                    <strong>Shop:</strong>
                    {{ $sale->dealer->shop_name }}
                </p>

                <p>
                    <strong>Mobile:</strong>
                    {{ $sale->dealer->mobile }}
                </p>

                <p>
                    <strong>Email:</strong>
                    {{ $sale->dealer->email }}
                </p>

            </div>

        </div>

        <!-- TABLE -->

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
                        {{ $sale->stock->tea_name }}
                    </td>

                    <td class="p-4">
                        {{ $sale->quantity }} KG
                    </td>

                    <td class="p-4">
                        ₹ {{ number_format($sale->total_amount / $sale->quantity, 2) }}
                    </td>

                    <td class="p-4 font-bold text-green-600">
                        ₹ {{ number_format($sale->total_amount, 2) }}
                    </td>

                </tr>

            </tbody>

        </table>

        <!-- TOTAL -->

        <div class="mt-8 text-right">

            <h2 class="text-3xl font-bold text-green-600">

                Grand Total:
                ₹ {{ number_format($sale->total_amount, 2) }}

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

            <a href="{{ route('sales.invoice.download', $sale->id) }}"
                class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl transition">
                Download PDF
            </a>

            <button onclick="window.print()"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-xl transition">
                Print Invoice
            </button>

        </div>

    </div>

@endsection