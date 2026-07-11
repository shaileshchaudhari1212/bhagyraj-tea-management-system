@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-8">
        Stock Requests
    </h1>



    @if(session('error'))

        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

            {{ session('error') }}

        </div>

    @endif

    <div class="bg-white p-6 rounded-2xl shadow mb-8">

        <form action="{{ route('dealer.requests.store') }}" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Select Tea
                    </label>

                    <select name="stock_id" class="w-full border rounded-lg p-3">

                        @foreach($stocks as $stock)

                            <option value="{{ $stock->id }}">

                                {{ $stock->tea_name }}
                                ({{ $stock->quantity }} KG Available)

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Quantity
                    </label>

                    <input type="number" name="quantity" class="w-full border rounded-lg p-3" placeholder="Enter Quantity">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <input type="text" name="notes" class="w-full border rounded-lg p-3" placeholder="Optional">

                </div>

            </div>

            <button type="submit" class="mt-6 bg-black text-white px-6 py-3 rounded-lg">

                Send Request

            </button>

        </form>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">
                        Tea
                    </th>

                    <th>
                        Quantity
                    </th>

                    <th>
                        Notes
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Date
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($requests as $request)

                        <tr class="border-b">

                            <td class="py-4">

                                {{ $request->stock->tea_name }}

                            </td>

                            <td>

                                {{ $request->quantity }} KG

                            </td>

                            <td>

                                {{ $request->notes }}

                            </td>

                            <td>

                                <span class="
                                            px-3 py-1 rounded text-white

                                            {{ strtolower($request->status) == 'pending'
                    ? 'bg-yellow-500'
                    : 'bg-green-500' }}
                                        ">

                                    {{ ucfirst($request->status) }}

                                </span>

                            </td>

                            <td>

                                {{ $request->created_at->format('d M Y') }}

                            </td>

                        </tr>

                @empty

                    <tr>

                        <td colspan="5" class="text-center py-6 text-gray-500">

                            No Requests Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

@endsection