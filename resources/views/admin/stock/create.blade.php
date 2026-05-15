@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Add Stock
        </h1>

        <form action="{{ route('stock.store') }}" method="POST">

            @csrf

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>

                    <label class="block mb-1">
                        Tea Name
                    </label>

                    <input type="text" name="tea_name" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Quantity (KG)
                    </label>

                    <input type="number" name="quantity" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Purchase Price
                    </label>

                    <input type="number" step="0.01" name="purchase_price" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Selling Price
                    </label>

                    <input type="number" step="0.01" name="selling_price" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Status
                    </label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="available">
                            Available
                        </option>

                        <option value="low">
                            Low
                        </option>

                        <option value="out_of_stock">
                            Out Of Stock
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-1">
                        Description
                    </label>

                    <textarea name="description" class="w-full border rounded p-2"></textarea>

                </div>

                <button type="submit" class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                    Save Stock

                </button>

            </div>

        </form>

    </div>

@endsection