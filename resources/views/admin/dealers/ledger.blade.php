@extends('layouts.admin')

@section('content')

    <h1 class="text-4xl font-bold mb-6">

        Dealer Ledger

    </h1>

    <!-- SUMMARY CARDS -->

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mb-8">

        <div class="bg-green-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Total Sales
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ {{ number_format($totalSales, 2) }}

            </h2>

        </div>

        <div class="bg-blue-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Total Payments
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ {{ number_format($totalPayments, 2) }}

            </h2>

        </div>

        <div class="bg-red-500 text-white p-6 rounded-2xl shadow">

            <p class="text-lg">
                Remaining Balance
            </p>

            <h2 class="text-3xl font-bold mt-2">

                ₹ {{ number_format($balance, 2) }}

            </h2>

        </div>

    </div>

    <!-- SALES HISTORY -->

    <div class="bg-white rounded-2xl shadow p-6 mb-8">

        <h2 class="text-2xl font-bold mb-5">

            Sales History

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b bg-gray-100">

                        <th class="py-3 px-3 text-left">
                            Invoice
                        </th>

                        <th class="py-3 px-3 text-left">
                            Tea
                        </th>

                        <th class="py-3 px-3 text-left">
                            Qty
                        </th>

                        <th class="py-3 px-3 text-left">
                            Price/KG
                        </th>

                        <th class="py-3 px-3 text-left">
                            Total
                        </th>

                        <th class="py-3 px-3 text-left">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-3 font-semibold text-blue-600">

                                {{ $sale->invoice_number ?? 'INV-' . strtoupper(substr(md5($sale->id), 0, 10)) }}

                            </td>

                            <td class="py-3 px-3">

                                {{ $sale->stock->tea_name ?? 'N/A' }}

                            </td>

                            <td class="py-3 px-3">

                                {{ $sale->quantity }} KG

                            </td>

                            <td class="py-3 px-3">

                                ₹ {{ number_format($sale->price ?? ($sale->total_amount / max($sale->quantity, 1)), 2) }}

                            </td>

                            <td class="py-3 px-3 font-bold text-green-600">

                                ₹ {{ number_format($sale->total_amount, 2) }}

                            </td>

                            <td class="py-3 px-3">

                                {{ \Carbon\Carbon::parse($sale->created_at)->format('d M Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="py-6 text-center text-gray-500">

                                No Sales Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    <!-- PAYMENT HISTORY -->

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-5">

            Payment History

        </h2>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b bg-gray-100">

                        <th class="py-3 px-3 text-left">
                            Amount
                        </th>

                        <th class="py-3 px-3 text-left">
                            Type
                        </th>

                        <th class="py-3 px-3 text-left">
                            Notes
                        </th>

                        <th class="py-3 px-3 text-left">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($payments as $payment)

                        <tr class="border-b hover:bg-gray-50">

                            <td class="py-3 px-3 font-bold text-green-600">

                                ₹ {{ number_format($payment->amount, 2) }}

                            </td>

                            <td class="py-3 px-3">

                                {{ ucfirst($payment->payment_type) }}

                            </td>

                            <td class="py-3 px-3">

                                {{ $payment->notes ?? '-' }}

                            </td>

                            <td class="py-3 px-3">

                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="py-6 text-center text-gray-500">

                                No Payments Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection