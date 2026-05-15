@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Stock
        </h1>

        <form action="{{ route('stock.update', $stock->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>

                    <label class="block mb-1">
                        Tea Name
                    </label>

                    <input type="text" name="tea_name" value="{{ $stock->tea_name }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Quantity
                    </label>

                    <input type="number" name="quantity" value="{{ $stock->quantity }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Purchase Price
                    </label>

                    <input type="number" step="0.01" name="purchase_price" value="{{ $stock->purchase_price }}"
                        class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Selling Price
                    </label>

                    <input type="number" step="0.01" name="selling_price" value="{{ $stock->selling_price }}"
                        class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Status
                    </label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="available" {{ $stock->status == 'available' ? 'selected' : '' }}>

                            Available

                        </option>

                        <option value="low" {{ $stock->status == 'low' ? 'selected' : '' }}>

                            Low

                        </option>

                        <option value="out_of_stock" {{ $stock->status == 'out_of_stock' ? 'selected' : '' }}>

                            Out Of Stock

                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-1">
                        Description
                    </label>

                    <textarea name="description" class="w-full border rounded p-2">{{ $stock->description }}</textarea>

                </div>

                <button type="submit" class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                    Update Stock

                </button>

            </div>

        </form>

    </div>

@endsection