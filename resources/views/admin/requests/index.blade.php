@extends('layouts.admin')

@section('content')

    <h1 class="text-4xl font-bold mb-6">
        Dealer Stock Requests
    </h1>





    @if(session('error'))

        <div class="bg-red-100 text-red-700 p-4 rounded mb-6">

            {{ session('error') }}

        </div>

    @endif

    <div class="bg-white rounded-2xl shadow p-6 overflow-x-auto">

        <table class="w-full min-w-[1000px]">

            <thead>

                <tr class="border-b text-left">

                    <th class="py-4">Dealer</th>
                    <th>Tea</th>
                    <th>Quantity</th>
                    <th>Notes</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($requests as $request)

                        <tr class="border-b">

                            <td class="py-4">
                                {{ $request->dealer->name }}
                            </td>

                            <td>
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

                                    {{ $request->status }}

                                </span>

                            </td>

                            <td>

                                @if(strtolower($request->status) == 'pending')

                                    <form action="{{ route('admin.requests.approve', $request->id) }}" method="POST">

                                        @csrf

                                        <button type="submit"
                                            class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800 transition">

                                            Approve

                                        </button>

                                    </form>

                                @else

                                    <span class="text-gray-500">

                                        Completed

                                    </span>

                                @endif

                            </td>

                        </tr>

                @endforeach

            </tbody>

        </table>

    </div>

@endsection