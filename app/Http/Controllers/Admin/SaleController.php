<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Stock;

use Barryvdh\DomPDF\Facade\Pdf;
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
        $sales = Sale::with([
            'dealer',
            'stock'
        ])

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
            'stock_id' => 'required',
            'quantity' => 'required|numeric|min:1',

        ]);

        $stock = Stock::findOrFail(
            $request->stock_id
        );

        $totalAmount =
            $stock->selling_price *
            $request->quantity;

        Sale::create([

            'dealer_id' => $request->dealer_id,

            'stock_id' => $request->stock_id,

            'quantity' => $request->quantity,

            'price' => $stock->selling_price,

            'total_amount' => $totalAmount,

            'email_sent' => 0,

        ]);

        return redirect()
            ->route('sales.index')
            ->with(
                'success',
                'Sale Added Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE SALE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $sale = Sale::findOrFail($id);

        $sale->delete();

        return redirect()
            ->route('sales.index')
            ->with(
                'success',
                'Sale Deleted Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | INVOICE VIEW
    |--------------------------------------------------------------------------
    */

    public function invoice($id)
    {
        $sale = Sale::with([
            'dealer',
            'stock'
        ])->findOrFail($id);

        return view(
            'admin.sales.invoice',
            compact('sale')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DOWNLOAD PDF INVOICE
    |--------------------------------------------------------------------------
    */

    public function downloadInvoice($id)
    {
        $sale = Sale::with([
            'dealer',
            'stock'
        ])->findOrFail($id);

        $pdf = Pdf::loadView(
            'admin.sales.invoice-pdf',
            compact('sale')
        );

        return $pdf->download(
            'invoice-' . $sale->id . '.pdf'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SEND MAIL
    |--------------------------------------------------------------------------
    */
    public function sendMail($id)
    {
        $sale = Sale::with([
            'dealer',
            'stock'
        ])->findOrFail($id);

        if (!$sale->dealer) {
            return redirect()
                ->back()
                ->with('error', 'Dealer not found');
        }

        if (!$sale->dealer->email) {
            return redirect()
                ->back()
                ->with('error', 'Dealer email not found');
        }

        try {

            // Generate PDF
            $pdf = Pdf::loadView(
                'admin.sales.invoice-pdf',
                compact('sale')
            );

            // Email body
            $body =
                "Dear {$sale->dealer->name}\n\n" .
                "Your invoice has been generated successfully.\n\n" .
                "Invoice No: " . ($sale->invoice_number ?? ('INV-' . $sale->id)) . "\n" .
                "Tea: {$sale->stock->tea_name}\n" .
                "Quantity: {$sale->quantity} KG\n" .
                "Total Amount: ₹" . number_format($sale->total_amount, 2) . "\n\n" .
                "Thank you for doing business with Bhagyraj Tea.\n\n" .
                "Website: https://bhagyrajtea.com/\n" .
                "Phone: +91 9875858984";

            Mail::to($sale->dealer->email)
                ->send(new InvoiceMail($sale));

            $sale->email_sent = 1;
            $sale->save();

            return redirect()
                ->back()
                ->with('success', 'Invoice email sent successfully');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', $e->getMessage());

        }
    }
}