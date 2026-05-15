@extends('layouts.admin')

@section('content')

    <div class="p-6">

        <h1 class="text-4xl font-bold mb-6">
            Edit Payment
        </h1>

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="bg-white p-6 rounded-xl shadow space-y-5">

                <div>

                    <label class="block mb-2 font-semibold">
                        Dealer
                    </label>

                    <select name="dealer_id" class="w-full border rounded-lg p-3">

                        @foreach($dealers as $dealer)

                            <option value="{{ $dealer->id }}" {{ $payment->dealer_id == $dealer->id ? 'selected' : '' }}>

                                {{ $dealer->name }}

                            </option>

                        @endforeach

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Amount
                    </label>

                    <input type="number" step="0.01" name="amount" value="{{ $payment->amount }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Type
                    </label>

                    <select name="payment_type" class="w-full border rounded-lg p-3">

                        <option value="cash" {{ $payment->payment_type == 'cash' ? 'selected' : '' }}>
                            Cash
                        </option>

                        <option value="online" {{ $payment->payment_type == 'online' ? 'selected' : '' }}>
                            Online
                        </option>

                        <option value="cheque" {{ $payment->payment_type == 'cheque' ? 'selected' : '' }}>
                            Cheque
                        </option>

                    </select>

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Payment Date
                    </label>

                    <input type="date" name="payment_date" value="{{ $payment->payment_date }}"
                        class="w-full border rounded-lg p-3">

                </div>

                <div>

                    <label class="block mb-2 font-semibold">
                        Notes
                    </label>

                    <textarea name="notes" class="w-full border rounded-lg p-3">{{ $payment->notes }}</textarea>

                </div>

                <button class="bg-black text-white px-6 py-3 rounded-lg">
                    Update Payment
                </button>

            </div>

        </form>

    </div>

@endsection