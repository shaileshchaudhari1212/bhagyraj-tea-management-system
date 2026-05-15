@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-6">
            Create Sale
        </h1>

        @if(session('error'))

            <div class="bg-red-100 text-red-700 p-4 rounded mb-8">

                {{ session('error') }}

            </div>

        @endif

        <form action="{{ route('sales.store') }}" method="POST">

            @csrf

            <div class="bg-white p-6 rounded-xl shadow space-y-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Dealer
                    </label>

                    <select name="dealer_id" class="w-full border rounded-lg p-3">

                        <option value="">
                            Select Dealer
                        </option>

                        @foreach($dealers as $dealer)

                            <option value="{{ $dealer->id }}">

                                {{ $dealer->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Tea Product
                    </label>

                    <select name="stock_id" class="w-full border rounded-lg p-3">

                        <option value="">
                            Select Tea
                        </option>

                        @foreach($stocks as $stock)

                            <option value="{{ $stock->id }}">

                                {{ $stock->tea_name }}
                                -
                                {{ $stock->quantity }} KG

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Quantity (KG)
                    </label>

                    <input type="number" name="quantity" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Sale Date
                    </label>

                    <input type="date" name="sale_date" class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <textarea name="notes" class="w-full border rounded-lg p-3"></textarea>

                </div>

                <button class="bg-black text-white px-6 py-3 rounded-lg">
                    Create Sale
                </button>

            </div>

        </form>

    </div>

@endsection