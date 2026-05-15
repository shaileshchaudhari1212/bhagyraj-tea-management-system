@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-8">
        Stock Requests
    </h1>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">

            {{ session('success') }}

        </div>

    @endif

    <div class="bg-white p-6 rounded-2xl shadow mb-10">

        <form action="{{ route('dealer.requests.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>

                    <label class="font-bold block mb-2">
                        Tea Product
                    </label>

                    <select name="stock_id"
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                        <option value="">
                            Select Tea
                        </option>

                        @foreach($stocks as $stock)

                            <option value="{{ $stock->id }}">

                                {{ $stock->tea_name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="font-bold block mb-2">
                        Quantity
                    </label>

                    <input type="number" name="quantity"
                        class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                </div>

            </div>

            <div class="mt-6">

                <label class="font-bold block mb-2">
                    Notes
                </label>

                <textarea name="notes" rows="4"
                    class="w-full border border-gray-300 p-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-black"></textarea>

            </div>

            <button class="bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl mt-6 transition">

                Send Request

            </button>

        </form>

    </div>

    <div class="bg-white rounded-2xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

                <thead class="bg-gray-100">

                    <tr>

                        <th class="text-left p-4 font-semibold">
                            Tea
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Quantity
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Status
                        </th>

                        <th class="text-left p-4 font-semibold">
                            Date
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($requests as $request)

                        <tr class="border-t hover:bg-gray-50 transition">

                            <td class="p-4">

                                {{ $request->stock->tea_name }}

                            </td>

                            <td class="p-4">

                                {{ $request->quantity }} KG

                            </td>

                            <td class="p-4">

                                @if($request->status == 'pending')

                                    <span class="bg-yellow-500 text-white px-4 py-1 rounded-full text-sm">

                                        Pending

                                    </span>

                                @elseif($request->status == 'approved')

                                    <span class="bg-green-500 text-white px-4 py-1 rounded-full text-sm">

                                        Approved

                                    </span>

                                @else

                                    <span class="bg-red-500 text-white px-4 py-1 rounded-full text-sm">

                                        Rejected

                                    </span>

                                @endif

                            </td>

                            <td class="p-4 text-gray-600">

                                {{ $request->created_at->format('d M Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="4" class="p-6 text-center text-gray-500">

                                No Stock Requests Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection