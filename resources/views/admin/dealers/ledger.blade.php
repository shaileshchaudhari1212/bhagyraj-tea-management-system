@extends('layouts.admin')

@section('content')

    <h1 class="text-4xl font-bold mb-6">

        Dealer Ledger

    </h1>

    <div class="grid grid-cols-3 gap-5 mb-8">

        <div class="bg-green-500 text-white p-6 rounded-2xl">

            <p>Total Sales</p>

            <h2 class="text-3xl font-bold">

                ₹ {{ number_format($totalSales, 2) }}

            </h2>

        </div>

        <div class="bg-blue-500 text-white p-6 rounded-2xl">

            <p>Total Payments</p>

            <h2 class="text-3xl font-bold">

                ₹ {{ number_format($totalPayments, 2) }}

            </h2>

        </div>

        <div class="bg-red-500 text-white p-6 rounded-2xl">

            <p>Remaining Balance</p>

            <h2 class="text-3xl font-bold">

                ₹ {{ number_format($balance, 2) }}

            </h2>

        </div>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 mb-8">

        <h2 class="text-2xl font-bold mb-5">

            Sales History

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">Invoice</th>
                    <th class="text-left">Tea</th>
                    <th class="text-left">Qty</th>
                    <th class="text-left">Total</th>
                    <th class="text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                @foreach($sales as $sale)

                    <tr class="border-b">

                        <td class="py-3">

                            {{ $sale->invoice_no }}

                        </td>

                        <td>

                            {{ $sale->stock->tea_name }}

                        </td>

                        <td>

                            {{ $sale->quantity }} KG

                        </td>

                        <td>

                            ₹ {{ number_format($sale->total_amount, 2) }}

                        </td>

                        <td>

                            {{ $sale->sale_date }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

    <div class="bg-white rounded-2xl shadow p-6">

        <h2 class="text-2xl font-bold mb-5">

            Payment History

        </h2>

        <table class="w-full">

            <thead>

                <tr class="border-b">

                    <th class="py-3 text-left">Amount</th>
                    <th class="text-left">Type</th>
                    <th class="text-left">Notes</th>
                    <th class="text-left">Date</th>

                </tr>

            </thead>

            <tbody>

                @foreach($payments as $payment)

                    <tr class="border-b">

                        <td class="py-3">

                            ₹ {{ number_format($payment->amount, 2) }}

                        </td>

                        <td>

                            {{ $payment->payment_type }}

                        </td>

                        <td>

                            {{ $payment->notes }}

                        </td>

                        <td>

                            {{ $payment->payment_date }}

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection