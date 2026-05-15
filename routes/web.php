<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DealerController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\SaleController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\ActivityLogController;

use App\Http\Controllers\Dealer\DealerDashboardController;
use App\Http\Controllers\Dealer\StockRequestController;

use App\Http\Controllers\Admin\StockRequestController as AdminStockRequestController;

/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', function () {

    return redirect('/login');

});

/*
|--------------------------------------------------------------------------
| ADMIN PANEL
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | DASHBOARD
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/dashboard',
        [DashboardController::class, 'index']
    )->name('admin.dashboard');

    /*
    |--------------------------------------------------------------------------
    | DEALERS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/dealers',
        [DealerController::class, 'index']
    )->name('dealers.index');

    Route::get(
        '/admin/dealers/create',
        [DealerController::class, 'create']
    )->name('dealers.create');

    Route::post(
        '/admin/dealers/store',
        [DealerController::class, 'store']
    )->name('dealers.store');

    Route::get(
        '/admin/dealers/{id}/edit',
        [DealerController::class, 'edit']
    )->name('dealers.edit');

    Route::put(
        '/admin/dealers/{id}',
        [DealerController::class, 'update']
    )->name('dealers.update');

    Route::delete(
        '/admin/dealers/{id}',
        [DealerController::class, 'destroy']
    )->name('dealers.destroy');

    Route::get(
        '/admin/dealers/{id}/ledger',
        [DealerController::class, 'ledger']
    )->name('dealers.ledger');

    Route::get(
        '/dealer/invoice/{id}',
        [DealerController::class, 'invoice']
    )->name('dealer.invoice');

    /*
    |--------------------------------------------------------------------------
    | STOCK
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/stock',
        [StockController::class, 'index']
    )->name('stock.index');

    Route::get(
        '/admin/stock/create',
        [StockController::class, 'create']
    )->name('stock.create');

    Route::post(
        '/admin/stock/store',
        [StockController::class, 'store']
    )->name('stock.store');

    Route::get(
        '/admin/stock/{id}/edit',
        [StockController::class, 'edit']
    )->name('stock.edit');

    Route::put(
        '/admin/stock/{id}',
        [StockController::class, 'update']
    )->name('stock.update');

    Route::delete(
        '/admin/stock/{id}',
        [StockController::class, 'destroy']
    )->name('stock.destroy');

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/payments',
        [PaymentController::class, 'index']
    )->name('payments.index');

    Route::get(
        '/admin/payments/create',
        [PaymentController::class, 'create']
    )->name('payments.create');

    Route::post(
        '/admin/payments/store',
        [PaymentController::class, 'store']
    )->name('payments.store');

    Route::get(
        '/admin/payments/{id}/edit',
        [PaymentController::class, 'edit']
    )->name('payments.edit');

    Route::put(
        '/admin/payments/{id}',
        [PaymentController::class, 'update']
    )->name('payments.update');

    Route::delete(
        '/admin/payments/{id}',
        [PaymentController::class, 'destroy']
    )->name('payments.destroy');

    /*
    |--------------------------------------------------------------------------
    | SALES
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/sales',
        [SaleController::class, 'index']
    )->name('sales.index');

    Route::get(
        '/admin/sales/create',
        [SaleController::class, 'create']
    )->name('sales.create');

    Route::post(
        '/admin/sales/store',
        [SaleController::class, 'store']
    )->name('sales.store');

    Route::delete(
        '/admin/sales/{id}',
        [SaleController::class, 'destroy']
    )->name('sales.destroy');

    Route::get(
        '/admin/sales/invoice/{id}',
        [SaleController::class, 'invoice']
    )->name('sales.invoice');

    Route::get(
        '/admin/sales/invoice/download/{id}',
        [SaleController::class, 'downloadInvoice']
    )->name('sales.invoice.download');

    Route::get(
        '/admin/sales/export/excel',
        [SaleController::class, 'exportExcel']
    )->name('sales.export.excel');

    /*
    |--------------------------------------------------------------------------
    | SEND MAIL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/sales/send-mail/{id}',
        [SaleController::class, 'sendMail']
    )->name('sales.send.mail');

    Route::post(
        '/admin/sales/send-mail/{id}',
        [SaleController::class, 'sendMail']
    )->name('sales.send.mail');

    /*
    |--------------------------------------------------------------------------
    | REPORTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/reports',
        [ReportController::class, 'index']
    )->name('reports.index');

    Route::get(
        '/admin/reports/pdf',
        [ReportController::class, 'pdf']
    )->name('reports.pdf');

    Route::get(
        '/admin/reports/excel',
        [ReportController::class, 'excel']
    )->name('reports.excel');

    /*
    |--------------------------------------------------------------------------
    | STOCK REQUESTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/requests',
        [AdminStockRequestController::class, 'index']
    )->name('admin.requests.index');

    Route::post(
        '/admin/requests/{id}/approve',
        [AdminStockRequestController::class, 'approve']
    )->name('admin.requests.approve');

    Route::post(
        '/admin/requests/{id}/reject',
        [AdminStockRequestController::class, 'reject']
    )->name('admin.requests.reject');

    /*
    |--------------------------------------------------------------------------
    | ACTIVITY LOGS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/admin/logs',
        [ActivityLogController::class, 'index']
    )->name('logs.index');

    /*
    |--------------------------------------------------------------------------
    | DEALER PANEL
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dealer/dashboard',
        [DealerDashboardController::class, 'dashboard']
    )->name('dealer.dashboard');

    Route::get(
        '/dealer/invoices',
        [DealerDashboardController::class, 'invoices']
    )->name('dealer.invoices');

    Route::get(
        '/dealer/payments',
        [DealerDashboardController::class, 'payments']
    )->name('dealer.payments');

    /*
    |--------------------------------------------------------------------------
    | DEALER STOCK REQUESTS
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dealer/requests',
        [StockRequestController::class, 'index']
    )->name('dealer.requests.index');

    Route::get(
        '/dealer/requests/create',
        [StockRequestController::class, 'create']
    )->name('dealer.requests.create');

    Route::post(
        '/dealer/requests',
        [StockRequestController::class, 'store']
    )->name('dealer.requests.store');

});

require __DIR__ . '/auth.php';