@extends('layouts.admin')

@section('content')

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-4xl font-bold">
            Activity Logs
        </h1>

    </div>

    <div class="bg-white rounded-xl shadow overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full min-w-[800px]">

            </table>

        </div>

        <thead class="bg-gray-100">

            <tr>

                <th class="p-6 text-left">
                    User
                </th>

                <th class="p-6 text-left">
                    Action
                </th>

                <th class="p-6 text-left">
                    Module
                </th>

                <th class="p-6 text-left">
                    Description
                </th>

                <th class="p-6 text-left">
                    Date
                </th>

            </tr>

        </thead>

        <tbody>

            @foreach($logs as $log)

                <tr class="border-t">

                    <td class="p-6">

                        {{ $log->user_name }}

                    </td>

                    <td class="p-6">

                        {{ $log->action }}

                    </td>

                    <td class="p-6">

                        {{ $log->module }}

                    </td>

                    <td class="p-6">

                        {{ $log->description }}

                    </td>

                    <td class="p-6">

                        {{ $log->created_at }}

                    </td>

                </tr>

            @endforeach

        </tbody>

        </table>

    </div>

@endsection