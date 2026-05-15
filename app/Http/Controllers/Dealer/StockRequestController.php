<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\StockRequest;

class StockRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REQUEST PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $stocks = Stock::latest()->get();

        $requests = StockRequest::with('stock')

            ->where(
                'dealer_id',
                auth()->user()->dealer->id
            )

            ->latest()

            ->get();

        return view(
            'dealer.requests.index',
            compact(
                'stocks',
                'requests'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STORE REQUEST
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'stock_id' => 'required',
            'quantity' => 'required|numeric|min:1',

        ]);

        StockRequest::create([

            'dealer_id' =>
                auth()->user()->dealer->id,

            'stock_id' =>
                $request->stock_id,

            'quantity' =>
                $request->quantity,

            'notes' =>
                $request->notes,

            'status' =>
                'pending',

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Request Sent Successfully'
            );
    }
}