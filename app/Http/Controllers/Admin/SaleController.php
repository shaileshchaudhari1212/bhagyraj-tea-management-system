<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Stock;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class SaleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SALES LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $sales = Sale::with('dealer')
            ->latest()
            ->get();

        return view(
            'admin.sales.index',
            compact('sales')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $dealers = Dealer::all();

        $stocks = Stock::all();

        return view(
            'admin.sales.create',
            compact(
                'dealers',
                'stocks'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE SALE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'dealer_id' => 'required',

            'tea_name' => 'required',

            'quantity' => 'required',

            'price_per_kg' => 'required',

        ]);

        $total = $request->quantity * $request->price_per_kg;

        Sale::create([

            'invoice_number' =>
                'INV-' . strtoupper(uniqid()),

            'dealer_id' => $request->dealer_id,

            'tea_name' => $request->tea_name,

            'quantity' => $request->quantity,

            'price_per_kg' => $request->price_per_kg,

            'total_amount' => $total,

            'sale_date' => now(),

            'email_sent' => 0,

        ]);

        return redirect()
            ->route('sales.index')
            ->with(
                'success',
                'Sale Created Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | INVOICE PAGE
    |--------------------------------------------------------------------------
    */

    public function invoice($id)
    {
        $sale = Sale::with('dealer')
            ->findOrFail($id);

        return view(
            'admin.sales.invoice',
            compact('sale')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEND INVOICE MAIL
    |--------------------------------------------------------------------------
    */

    public function sendMail($id)
    {
        $sale = Sale::with('dealer')
            ->findOrFail($id);

        try {

            Mail::to($sale->dealer->email)
                ->send(
                    new InvoiceMail($sale)
                );

            $sale->update([

                'email_sent' => 1

            ]);

            return redirect()
                ->route('sales.index')
                ->with(
                    'success',
                    'Invoice Email Sent Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->route('sales.index')
                ->with(
                    'error',
                    'Email Sending Failed'
                );
        }
    }
}