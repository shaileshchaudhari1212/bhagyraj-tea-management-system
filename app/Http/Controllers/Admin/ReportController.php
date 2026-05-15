<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Sale;
use App\Models\Payment;
use App\Models\Dealer;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

use App\Exports\SalesExport;

class ReportController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | REPORT PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $sales = Sale::with(
            'dealer',
            'stock'
        )->latest()->get();

        $payments = Payment::with(
            'dealer'
        )->latest()->get();

        $dealers = Dealer::all();

        /*
        |--------------------------------------------------------------------------
        | ANALYTICS
        |--------------------------------------------------------------------------
        */

        $totalRevenue = Sale::sum(
            'total_amount'
        );

        $totalPayments = Payment::sum(
            'amount'
        );

        $monthlySales = Sale::selectRaw(
            'MONTH(created_at) as month,
            SUM(total_amount) as total'
        )
            ->groupBy('month')
            ->pluck('total');

        $monthlyLabels = Sale::selectRaw(
            'MONTH(created_at) as month'
        )
            ->groupBy('month')
            ->pluck('month');

        return view(
            'admin.reports.index',
            compact(
                'sales',
                'payments',
                'dealers',
                'totalRevenue',
                'totalPayments',
                'monthlySales',
                'monthlyLabels'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PDF EXPORT
    |--------------------------------------------------------------------------
    */

    public function pdf()
    {
        $sales = Sale::with('dealer')
            ->latest()
            ->get();

        $payments = Payment::with('dealer')
            ->latest()
            ->get();

        $totalSalesAmount = $sales->sum('total_amount');

        $totalPayments = $payments->sum('amount');

        $totalProfit = $totalSalesAmount - $totalPayments;

        $pdf = Pdf::loadView(
            'admin.reports.pdf',
            compact(
                'sales',
                'payments',
                'totalSalesAmount',
                'totalPayments',
                'totalProfit'
            )
        );

        return $pdf->download('bhagyraj-tea-report.pdf');
    }

    /*
    |--------------------------------------------------------------------------
    | EXCEL EXPORT
    |--------------------------------------------------------------------------
    */

    public function excel()
    {
        return Excel::download(
            new SalesExport,
            'sales-report.xlsx'
        );
    }
}