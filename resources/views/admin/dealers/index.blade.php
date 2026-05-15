@extends('layouts.admin')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Dealers
        </h1>

        <a href="{{ route('dealers.create') }}" class="bg-black text-white px-5 py-3 rounded-xl">
            Add Dealer
        </a>

    </div>

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[900px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Name</th>
                    <th>Shop</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($dealers as $dealer)

                    <tr class="border-b hover:bg-gray-50">

                        <td class="py-4">
                            {{ $dealer->name }}
                        </td>

                        <td>
                            {{ $dealer->shop_name }}
                        </td>

                        <td>
                            {{ $dealer->mobile }}
                        </td>

                        <td>
                            {{ $dealer->email }}
                        </td>

                        <td>

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                {{ $dealer->status }}

                            </span>

                        </td>

                        <td class="space-x-2 text-center">

                            <a href="{{ route('dealers.ledger', $dealer->id) }}" class="bg-green-600 text-white px-3 py-2 rounded">
                                Ledger
                            </a>

                            <a href="{{ route('dealers.edit', $dealer->id) }}" class="bg-blue-500 text-white px-3 py-2 rounded">
                                Edit
                            </a>

                            <form action="{{ route('dealers.destroy', $dealer->id) }}" method="POST" class="inline">

                                @csrf
                                @method('DELETE')

                                <button class="bg-red-500 text-white px-3 py-2 rounded">
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection