@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-3xl font-bold mb-6">
            Edit Dealer
        </h1>

        <form action="{{ route('dealers.update', $dealer->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="bg-white p-6 rounded shadow space-y-4">

                <div>

                    <label class="block mb-1">
                        Name
                    </label>

                    <input type="text" name="name" value="{{ $dealer->name }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Shop Name
                    </label>

                    <input type="text" name="shop_name" value="{{ $dealer->shop_name }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Mobile
                    </label>

                    <input type="text" name="mobile" value="{{ $dealer->mobile }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Email
                    </label>

                    <input type="email" name="email" value="{{ $dealer->email }}" class="w-full border rounded p-2">

                </div>

                <div>

                    <label class="block mb-1">
                        Address
                    </label>

                    <textarea name="address" class="w-full border rounded p-2">{{ $dealer->address }}</textarea>

                </div>

                <div>

                    <label class="block mb-1">
                        Status
                    </label>

                    <select name="status" class="w-full border rounded p-2">

                        <option value="active" {{ $dealer->status == 'active' ? 'selected' : '' }}>

                            Active

                        </option>

                        <option value="inactive" {{ $dealer->status == 'inactive' ? 'selected' : '' }}>

                            Inactive

                        </option>

                    </select>

                </div>

                <button type="submit" class="bg-black hover:bg-gray-800 text-white px-5 py-3 rounded-xl transition">

                    Update Dealer

                </button>

            </div>

        </form>

    </div>

@endsection