<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sale;
use App\Models\Dealer;
use App\Models\Stock;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TOTAL REVENUE
        |--------------------------------------------------------------------------
        */

        $totalRevenue = Sale::sum(
            'total_amount'
        );

        /*
        |--------------------------------------------------------------------------
        | TOTAL SALES
        |--------------------------------------------------------------------------
        */

        $totalSales = Sale::count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL DEALERS
        |--------------------------------------------------------------------------
        */

        $totalDealers = Dealer::count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL STOCK
        |--------------------------------------------------------------------------
        */

        $totalStock = Stock::sum(
            'quantity'
        );

        /*
        |--------------------------------------------------------------------------
        | LOW STOCK
        |--------------------------------------------------------------------------
        */

        $lowStocks = Stock::where(
            'quantity',
            '<=',
            10
        )->get();

        /*
        |--------------------------------------------------------------------------
        | TOTAL PAYMENT
        |--------------------------------------------------------------------------
        */

        $totalPayments = Payment::sum(
            'amount'
        );

        /*
        |--------------------------------------------------------------------------
        | MONTHLY SALES
        |--------------------------------------------------------------------------
        */

        $monthlySales = Sale::whereMonth(
            'created_at',
            now()->month
        )->sum('total_amount');

        return view(
            'admin.dashboard',
            compact(
                'totalRevenue',
                'totalSales',
                'totalDealers',
                'totalStock',
                'lowStocks',
                'totalPayments',
                'monthlySales'
            )
        );
    }
}