<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

use App\Mail\PaymentMail;

use App\Models\Payment;
use App\Models\Dealer;

class PaymentController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PAYMENT LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $payments = Payment::with('dealer')
            ->latest()
            ->get();

        return view(
            'admin.payments.index',
            compact('payments')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $dealers = Dealer::where(
            'status',
            'active'
        )->get();

        return view(
            'admin.payments.create',
            compact('dealers')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE PAYMENT
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'dealer_id' => 'required',
            'amount' => 'required|numeric',
            'payment_type' => 'required',
            'payment_date' => 'required',

        ]);

        $payment = Payment::create([

            'dealer_id' => $request->dealer_id,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,
            'notes' => $request->notes,
            'payment_date' => $request->payment_date,

        ]);

        /*
        |--------------------------------------------------------------------------
        | SEND EMAIL
        |--------------------------------------------------------------------------
        */

        $dealer = Dealer::findOrFail(
            $request->dealer_id
        );

        Mail::to(
            $dealer->email
        )->send(
                new PaymentMail($payment)
            );

        /*
        |--------------------------------------------------------------------------
        | ACTIVITY LOG
        |--------------------------------------------------------------------------
        */

        activityLog(
            'Create',
            'Payment',
            'Payment Added'
        );

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Added Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PAGE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $payment = Payment::findOrFail($id);

        $dealers = Dealer::all();

        return view(
            'admin.payments.edit',
            compact(
                'payment',
                'dealers'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PAYMENT
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);

        $request->validate([

            'dealer_id' => 'required',
            'amount' => 'required|numeric',
            'payment_type' => 'required',
            'payment_date' => 'required',

        ]);

        $payment->update([

            'dealer_id' => $request->dealer_id,
            'amount' => $request->amount,
            'payment_type' => $request->payment_type,
            'notes' => $request->notes,
            'payment_date' => $request->payment_date,

        ]);

        activityLog(
            'Update',
            'Payment',
            'Payment Updated'
        );

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE PAYMENT
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $payment = Payment::findOrFail($id);

        activityLog(
            'Delete',
            'Payment',
            'Payment Deleted'
        );

        $payment->delete();

        return redirect()
            ->route('payments.index')
            ->with(
                'success',
                'Payment Deleted Successfully'
            );
    }
}