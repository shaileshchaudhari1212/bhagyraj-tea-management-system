@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-6">

        Available Stock

    </h1>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Tea Name</th>

                    <th>Available Quantity</th>

                    <th>Selling Price</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($stocks as $stock)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">

                            {{ $stock->tea_name }}

                        </td>

                        <td>

                            {{ $stock->quantity }} KG

                        </td>

                        <td class="text-green-600 font-bold">

                            ₹ {{ number_format($stock->selling_price, 2) }}

                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                {{ $stock->status }}

                            </span>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center py-6 text-gray-500">

                            No Stock Available

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection