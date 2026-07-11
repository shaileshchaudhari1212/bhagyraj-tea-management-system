@extends('layouts.admin')

@section('content')

<div class="flex justify-between items-center mb-8">

    <h1 class="text-4xl font-bold text-gray-800">
        Sales Management
    </h1>

    <a href="{{ route('sales.create') }}"
        class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-2xl shadow">

        Create Sale

    </a>

</div>


@if(session('error'))

    <div class="bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-xl mb-6">

        {{ session('error') }}

    </div>

@endif

<div class="bg-white rounded-3xl shadow overflow-hidden">

    <div class="overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="p-5 text-left">
                        Invoice No
                    </th>

                    <th class="p-5 text-left">
                        Dealer
                    </th>

                    <th class="p-5 text-left">
                        Email Status
                    </th>

                    <th class="p-5 text-left">
                        Tea
                    </th>

                    <th class="p-5 text-left">
                        Qty
                    </th>

                    <th class="p-5 text-left">
                        Price/KG
                    </th>

                    <th class="p-5 text-left">
                        Total
                    </th>

                    <th class="p-5 text-left">
                        Date
                    </th>

                    <th class="p-5 text-left">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($sales as $sale)

                    <tr class="border-t hover:bg-gray-50 transition">

                        <td class="p-5 font-semibold text-gray-700">

                            {{ $sale->invoice_number }}

                        </td>

                        <td class="p-5">

                            {{ $sale->dealer->name }}

                        </td>

                        <td class="p-5">

                            @if($sale->email_sent)

                                <div class="flex items-center gap-3">

                                    <span
                                        class="bg-green-500 text-white px-4 py-2 rounded-full text-sm font-semibold">

                                        Email Sent

                                    </span>

                                    <a href="{{ route('sales.send.mail', $sale->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg text-sm">

                                        Send Again

                                    </a>

                                </div>

                            @else

                                <a href="{{ route('sales.send.mail', $sale->id) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">

                                    Send Mail

                                </a>

                            @endif

                        </td>

                        <td class="p-5">

                            {{ $sale->stock->tea_name }}

                        </td>

                        <td class="p-5">

                            {{ $sale->quantity }} KG

                        </td>

                        <td class="p-5">

                            ₹ {{ number_format($sale->price_per_kg, 2) }}

                        </td>

                        <td class="p-5 font-bold text-green-600">

                            ₹ {{ number_format($sale->total_amount, 2) }}

                        </td>

                        <td class="p-5">

                            {{ \Carbon\Carbon::parse($sale->sale_date)->format('d-m-Y') }}

                        </td>

                        <td class="p-5">

                            <a href="{{ route('sales.invoice', $sale->id) }}"
                                class="bg-black hover:bg-gray-800 text-white px-5 py-2 rounded-xl">

                                Invoice

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="9" class="text-center py-10 text-gray-500">

                            No Sales Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection