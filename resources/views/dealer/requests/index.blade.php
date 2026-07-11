@extends('layouts.dealer')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Stock Requests
        </h1>

    </div>

    @if(session('error'))

        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

            {{ session('error') }}

        </div>

    @endif

    {{-- ACCOUNT INACTIVE WARNING --}}
    @if($dealer->status === 'inactive')

        <div class="bg-yellow-100 border-l-8 border-yellow-500 text-yellow-900 rounded-2xl p-6 mb-8 shadow">

            <div class="flex items-start gap-4">

                <div class="text-4xl">
                    ⚠️
                </div>

                <div>

                    <h2 class="text-2xl font-bold mb-2">

                        Your account has been deactivated.

                    </h2>

                    <p>

                        Please contact
                        <strong>Bhagyraj Tea Administration</strong>.

                    </p>

                    <p class="mt-2">

                        You can still view your previous requests,
                        but you cannot create new stock requests.

                    </p>

                </div>

            </div>

        </div>

    @else

        <!-- REQUEST FORM -->

        <div class="bg-white rounded-2xl shadow p-6 mb-8">

            <form action="{{ route('dealer.requests.store') }}" method="POST">

                @csrf

                <div class="grid md:grid-cols-3 gap-5">

                    <div>

                        <label class="block mb-2 font-semibold">
                            Select Tea
                        </label>

                        <select name="stock_id" class="w-full border rounded-xl p-3" required>

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

                        <label class="block mb-2 font-semibold">
                            Quantity (KG)
                        </label>

                        <input type="number" name="quantity" class="w-full border rounded-xl p-3" required>

                    </div>

                    <div>

                        <label class="block mb-2 font-semibold">
                            Notes
                        </label>

                        <input type="text" name="notes" class="w-full border rounded-xl p-3">

                    </div>

                </div>

                <button type="submit" class="mt-6 bg-black hover:bg-gray-800 text-white px-6 py-3 rounded-xl">

                    Send Request

                </button>

            </form>

        </div>

    @endif

    <!-- REQUEST HISTORY -->

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

                            {{ $request->stock->tea_name ?? 'N/A' }}

                        </td>

                        <td>

                            {{ $request->quantity }} KG

                        </td>

                        <td>

                            {{ $request->notes }}

                        </td>

                        <td>

                            @if($request->status == 'pending')

                                <span class="bg-yellow-500 text-white px-3 py-1 rounded">

                                    Pending

                                </span>

                            @elseif($request->status == 'approved')

                                <span class="bg-green-500 text-white px-3 py-1 rounded">

                                    Approved

                                </span>

                            @else

                                <span class="bg-red-500 text-white px-3 py-1 rounded">

                                    Rejected

                                </span>

                            @endif

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