@extends('layouts.admin')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Payment Management
        </h1>

        <a href="{{ route('payments.create') }}" class="bg-black text-white px-5 py-3 rounded-xl">
            Add Payment
        </a>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Dealer</th>
                    <th>Amount</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Notes</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($payments as $payment)

                    <tr class="border-b">

                        <td class="py-4">
                            {{ $payment->dealer->name }}
                        </td>

                        <td>
                            ₹ {{ number_format($payment->amount, 2) }}
                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                {{ $payment->payment_type }}

                            </span>

                        </td>

                        <td>
                            {{ $payment->payment_date }}
                        </td>

                        <td>
                            {{ $payment->notes }}
                        </td>

                        <td>

                            <a href="{{ route('payments.edit', $payment->id) }}"
                                class="bg-blue-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection