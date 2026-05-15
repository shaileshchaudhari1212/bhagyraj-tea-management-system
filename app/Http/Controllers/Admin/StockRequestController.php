<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\StockRequest;
use App\Models\Sale;

class StockRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REQUEST LIST
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $requests = StockRequest::with([

            'dealer',
            'stock'

        ])

            ->latest()

            ->get();

        return view(
            'admin.requests.index',
            compact('requests')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | APPROVE REQUEST
    |--------------------------------------------------------------------------
    */

    public function approve($id)
    {
        $requestData = StockRequest::with([

            'dealer',
            'stock'

        ])->findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | CHECK STOCK
        |--------------------------------------------------------------------------
        */

        if (
            $requestData->quantity >
            $requestData->stock->quantity
        ) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Not Enough Stock Available'
                );
        }

        /*
        |--------------------------------------------------------------------------
        | CREATE SALE
        |--------------------------------------------------------------------------
        */

        Sale::create([

            'invoice_number' =>

                'INV-' . strtoupper(uniqid()),

            'dealer_id' =>

                $requestData->dealer_id,

            'stock_id' =>

                $requestData->stock_id,

            'quantity' =>

                $requestData->quantity,

            'price_per_kg' =>

                $requestData->stock->selling_price,

            'total_amount' =>

                (
                    $requestData->quantity *
                    $requestData->stock->selling_price
                ),

            'notes' =>

                $requestData->notes,

            'sale_date' =>

                now(),

        ]);

        /*
        |--------------------------------------------------------------------------
        | REDUCE STOCK
        |--------------------------------------------------------------------------
        */

        $requestData->stock->update([

            'quantity' =>

                $requestData->stock->quantity -
                $requestData->quantity

        ]);

        /*
        |--------------------------------------------------------------------------
        | UPDATE REQUEST STATUS
        |--------------------------------------------------------------------------
        */

        $requestData->update([

            'status' => 'approved',

            'approved_by' => auth()->id()

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Request Approved Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | REJECT REQUEST
    |--------------------------------------------------------------------------
    */

    public function reject($id)
    {
        $requestData = StockRequest::findOrFail($id);

        $requestData->update([

            'status' => 'rejected',

            'approved_by' => auth()->id()

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Request Rejected Successfully'
            );
    }
}