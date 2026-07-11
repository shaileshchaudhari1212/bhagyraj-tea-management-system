@extends('layouts.dealer')

@section('content')

    <h1 class="text-4xl font-bold mb-8">
        Request Stock
    </h1>





    <form action="{{ route('dealer.requests.store') }}" method="POST">

        @csrf

        <div class="bg-white p-6 rounded shadow space-y-5">

            <div>

                <label class="block mb-2">
                    Tea Product
                </label>

                <select name="stock_id" class="w-full border rounded p-3">

                    @foreach($stocks as $stock)

                        <option value="{{ $stock->id }}">

                            {{ $stock->tea_name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div>

                <label class="block mb-2">
                    Quantity
                </label>

                <input type="number" name="quantity" class="w-full border rounded p-3">

            </div>

            <div>

                <label class="block mb-2">
                    Notes
                </label>

                <textarea name="notes" class="w-full border rounded p-3"></textarea>

            </div>

            <button type="submit" class="bg-black text-white px-6 py-3 rounded">

                Send Request

            </button>

        </div>

    </form>

@endsection