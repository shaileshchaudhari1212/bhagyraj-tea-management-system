@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Add Dealer
        </h1>

        <form action="{{ route('dealers.store') }}" method="POST">

            @csrf

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>
                    <label>Name</label>

                    <input type="text" name="name" class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Shop Name</label>

                    <input type="text" name="shop_name" class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Mobile</label>

                    <input type="text" name="mobile" class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Email</label>

                    <input type="email" name="email" class="w-full border rounded p-2">
                </div>

                <div>
                    <label>Address</label>

                    <textarea name="address" class="w-full border rounded p-2"></textarea>
                </div>

                <div>
                    <label>Status</label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="active">
                            Active
                        </option>

                        <option value="inactive">
                            Inactive
                        </option>

                    </select>
                </div>

                <button class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">
                    Save Dealer
                </button>

            </div>

        </form>

    </div>

@endsection