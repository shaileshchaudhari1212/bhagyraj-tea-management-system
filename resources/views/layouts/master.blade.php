<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bhagyraj Tea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

    @include('layouts.navigation')

    <div class="ml-64">

        <div class="bg-white shadow px-8 py-5 flex justify-between items-center">

            <h1 class="text-2xl font-bold">
                Dashboard
            </h1>

            <div class="flex items-center gap-6">

                <span>
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <button type="submit" class="bg-red-500 text-white px-5 py-2 rounded">
                        Logout
                    </button>

                </form>

            </div>

        </div>

        <div class="p-8">

            @yield('content')

        </div>

    </div>

</body>

</html>