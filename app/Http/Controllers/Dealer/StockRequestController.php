<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Stock;
use App\Models\StockRequest;
use App\Models\Dealer;

class StockRequestController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REQUEST PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $user = auth()->user();

        $dealer = Dealer::where(
            'user_id',
            $user->id
        )->first();

        if (!$dealer) {

            abort(404, 'Dealer not found');

        }

        $stocks = Stock::latest()->get();

        $requests = StockRequest::with([
            'stock'
        ])
            ->where(
                'dealer_id',
                $dealer->id
            )
            ->latest()
            ->get();

        return view(
            'dealer.requests.index',
            compact(
                'dealer',
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

        $user = auth()->user();

        $dealer = Dealer::where(
            'user_id',
            $user->id
        )->first();

        if (!$dealer) {

            abort(404, 'Dealer not found');

        }

        /*
        |--------------------------------------------------------------------------
        | EXTRA SECURITY
        |--------------------------------------------------------------------------
        */

        if ($dealer->status !== 'active') {

            return redirect()
                ->route('dealer.requests.index')
                ->with(
                    'error',
                    'Your account is inactive. Please contact Bhagyraj Tea Administration.'
                );

        }

        StockRequest::create([

            'dealer_id' => $dealer->id,

            'stock_id' => $request->stock_id,

            'quantity' => $request->quantity,

            'notes' => $request->notes,

            'status' => 'pending',

        ]);

        return redirect()
            ->route('dealer.requests.index')
            ->with(
                'success',
                'Request Sent Successfully'
            );
    }
}