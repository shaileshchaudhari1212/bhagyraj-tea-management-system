<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Stock;

use Barryvdh\DomPDF\Facade\Pdf;

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
}