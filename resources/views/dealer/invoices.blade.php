@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-8">
        My Invoices
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[900px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-6">
                            Invoice
                        </th>

                        <th class="text-left p-6">
                            Tea
                        </th>

                        <th class="text-left p-6">
                            Quantity
                        </th>

                        <th class="text-left p-6">
                            Total
                        </th>

                        <th class="text-left p-6">
                            Date
                        </th>

                        <th class="text-left p-6">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($sales as $sale)

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-6 font-semibold">
                                {{ $sale->invoice_number }}
                            </td>

                            <td class="p-6">
                                {{ $sale->stock->tea_name }}
                            </td>

                            <td class="p-6">
                                {{ $sale->quantity }} KG
                            </td>

                            <td class="p-6 font-bold text-green-600">
                                ₹ {{ number_format($sale->total_amount, 2) }}
                            </td>

                            <td class="p-6">
                                {{ \Carbon\Carbon::parse($sale->sale_date)->format('d M Y') }}
                            </td>

                            <td class="p-6">

                                <a href="{{ route('dealer.invoice', $sale->id) }}" target="_blank"
                                    class="bg-black hover:bg-gray-800 text-white px-5 py-2 rounded-lg transition">

                                    View

                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="text-center p-10 text-gray-500">

                                No Invoices Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection