<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dealer;
use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Payment;

class DealerController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | DEALER LIST
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $dealers = Dealer::when(
            $search,
            function ($query) use ($search) {

                $query->where(
                    'name',
                    'LIKE',
                    "%{$search}%"
                )

                    ->orWhere(
                        'shop_name',
                        'LIKE',
                        "%{$search}%"
                    )

                    ->orWhere(
                        'mobile',
                        'LIKE',
                        "%{$search}%"
                    );
            }
        )

            ->latest()
            ->get();

        return view(
            'admin.dealers.index',
            compact(
                'dealers',
                'search'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE PAGE
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('admin.dealers.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE DEALER
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'shop_name' => 'required',
            'mobile' => 'required|unique:dealers',
            'email' => 'required|email|unique:dealers',

        ]);

        Dealer::create([

            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,

        ]);

        activityLog(
            'Create',
            'Dealer',
            'New Dealer Added'
        );

        return redirect()
            ->route('dealers.index')
            ->with(
                'success',
                'Dealer Added Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PAGE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $dealer = Dealer::findOrFail($id);

        return view(
            'admin.dealers.edit',
            compact('dealer')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE DEALER
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $dealer = Dealer::findOrFail($id);

        $request->validate([

            'name' => 'required',
            'shop_name' => 'required',
            'mobile' => 'required',
            'email' => 'required|email',

        ]);

        $dealer->update([

            'name' => $request->name,
            'shop_name' => $request->shop_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'status' => $request->status,

        ]);

        activityLog(
            'Update',
            'Dealer',
            'Dealer Updated'
        );

        return redirect()
            ->route('dealers.index')
            ->with(
                'success',
                'Dealer Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DEALER LEDGER
    |--------------------------------------------------------------------------
    */

    public function ledger($id)
    {
        $dealer = Dealer::findOrFail($id);

        $sales = Sale::with('stock')
            ->where('dealer_id', $dealer->id)
            ->oldest()
            ->get();

        $payments = Payment::where(
            'dealer_id',
            $dealer->id
        )->oldest()->get();

        $totalSales = $sales->sum('total_amount');

        $totalPayments = $payments->sum('amount');

        $balance = $totalSales - $totalPayments;

        $remainingPayment = $totalPayments;

        foreach ($sales as $sale) {

            if ($remainingPayment >= $sale->total_amount) {

                $sale->paid_amount = $sale->total_amount;

                $sale->pending_amount = 0;

                $sale->payment_status = 'Paid';

                $remainingPayment -= $sale->total_amount;

            } elseif ($remainingPayment > 0) {

                $sale->paid_amount = $remainingPayment;

                $sale->pending_amount =
                    $sale->total_amount - $remainingPayment;

                $sale->payment_status = 'Partial';

                $remainingPayment = 0;

            } else {

                $sale->paid_amount = 0;

                $sale->pending_amount = $sale->total_amount;

                $sale->payment_status = 'Pending';
            }
        }

        return view(
            'admin.dealers.ledger',
            compact(
                'dealer',
                'sales',
                'payments',
                'totalSales',
                'totalPayments',
                'balance'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DEALER INVOICE
    |--------------------------------------------------------------------------
    */

    public function invoice($id)
    {
        $sale = Sale::with('stock')
            ->findOrFail($id);

        return view(
            'dealer.invoice',
            compact('sale')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE DEALER
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $dealer = Dealer::findOrFail($id);

        activityLog(
            'Delete',
            'Dealer',
            'Dealer Deleted'
        );

        $dealer->delete();

        return redirect()
            ->route('dealers.index')
            ->with(
                'success',
                'Dealer Deleted Successfully'
            );
    }
}