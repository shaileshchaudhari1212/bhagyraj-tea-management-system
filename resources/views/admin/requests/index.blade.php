@extends('layouts.admin')

@section('content')

    <h1 class="text-4xl font-bold mb-6">
        Dealer Stock Requests
    </h1>

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

                            <span class="bg-green-500 text-white px-3 py-1 rounded">

                                {{ $request->status }}

                            </span>

                        </td>

                        <td>

                            @if($request->status == 'Pending')

                                <a href="{{ route('admin.requests.approve', $request->id) }}"
                                    class="bg-black text-white px-4 py-2 rounded">
                                    Approve
                                </a>

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