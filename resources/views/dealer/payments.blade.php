@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-8">
        Payment History
    </h1>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-5 font-semibold">
                            Amount
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Payment Type
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Notes
                        </th>

                        <th class="text-left p-5 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($payments as $payment)

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-5 font-bold text-green-600">

                                ₹ {{ number_format($payment->amount, 2) }}

                            </td>

                            <td class="p-5">

                                <span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">

                                    {{ ucfirst($payment->payment_type) }}

                                </span>

                            </td>

                            <td class="p-5 text-gray-700">

                                {{ $payment->notes ?: 'No Notes' }}

                            </td>

                            <td class="p-5 text-gray-600">

                                {{ \Carbon\Carbon::parse($payment->payment_date)->format('d M Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="text-center p-8 text-gray-500">

                                No Payments Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection