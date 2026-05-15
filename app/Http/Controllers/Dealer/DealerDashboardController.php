<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
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

        $payments = $dealer->payments()
            ->latest()
            ->get();

        return view(
            'dealer.payments',
            compact('payments')
        );
    }
}