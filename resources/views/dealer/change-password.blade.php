@extends('layouts.dealer')

@section('content')

    <div class="max-w-2xl mx-auto mt-10">

        <div class="bg-white rounded-3xl shadow-xl p-10">

            <div class="text-center mb-8">

                <h1 class="text-4xl font-bold text-gray-800">
                    Change Your Password
                </h1>

                <p class="text-gray-500 mt-3">

                    This is your first login.

                    <br>

                    For your account security, you must change your password before continuing.

                </p>

            </div>

            @if ($errors->any())

                <div class="mb-6 bg-red-100 border border-red-300 text-red-700 rounded-xl p-4">

                    <ul class="list-disc ml-5">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form method="POST" action="{{ route('dealer.password.update') }}">

                @csrf

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">

                        Current Password

                    </label>

                    <input type="password" name="current_password"
                        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                </div>

                <div class="mb-6">

                    <label class="block mb-2 font-semibold">

                        New Password

                    </label>

                    <input type="password" name="password"
                        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                </div>

                <div class="mb-8">

                    <label class="block mb-2 font-semibold">

                        Confirm Password

                    </label>

                    <input type="password" name="password_confirmation"
                        class="w-full border rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-black"
                        required>

                </div>

                <button type="submit"
                    class="w-full bg-black hover:bg-gray-800 text-white py-4 rounded-xl text-lg font-semibold transition">

                    Change Password

                </button>

            </form>

        </div>

    </div>

@endsection