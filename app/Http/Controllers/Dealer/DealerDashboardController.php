<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use App\Models\Stock;

use Illuminate\Support\Facades\Auth;

class DealerDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function dashboard()
    {
        $dealer = Dealer::where(
            'email',
            Auth::user()->email
        )->first();

        /*
        |--------------------------------------------------------------------------
        | IF DEALER NOT FOUND
        |--------------------------------------------------------------------------
        */

        if (!$dealer) {

            abort(404, 'Dealer not found');

        }

        $sales = $dealer->sales()
            ->with('stock')
            ->latest()
            ->get();

        $payments = $dealer->payments()
            ->latest()
            ->get();

        $totalPurchase = $sales->sum('total_amount');

        $totalPayment = $payments->sum('amount');

        $remainingBalance =
            $totalPurchase - $totalPayment;

        return view(
            'dealer.dashboard',
            compact(
                'dealer',
                'sales',
                'payments',
                'totalPurchase',
                'totalPayment',
                'remainingBalance'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | INVOICES
    |--------------------------------------------------------------------------
    */

    public function invoices()
    {
        $dealer = Dealer::where(
            'email',
            Auth::user()->email
        )->first();

        if (!$dealer) {

            abort(404, 'Dealer not found');

        }

        $sales = $dealer->sales()
            ->with('stock')
            ->latest()
            ->get();

        return view(
            'dealer.invoices',
            compact('sales')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS
    |--------------------------------------------------------------------------
    */

    public function payments()
    {
        $dealer = Dealer::where(
            'email',
            Auth::user()->email
        )->first();

        if (!$dealer) {

            abort(404, 'Dealer not found');

        }

        $payments = $dealer->payments()
            ->latest()
            ->get();

        return view(
            'dealer.payments',
            compact('payments')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | AVAILABLE STOCK
    |--------------------------------------------------------------------------
    */

    public function stocks()
    {
        $stocks = Stock::latest()->get();

        return view(
            'dealer.stocks.index',
            compact('stocks')
        );
    }
}