<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | STOCK LIST
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $search = $request->search;

        $stocks = Stock::when(
            $search,
            function ($query) use ($search) {

                $query->where(
                    'tea_name',
                    'LIKE',
                    "%{$search}%"
                )

                    ->orWhere(
                        'status',
                        'LIKE',
                        "%{$search}%"
                    );
            }
        )

            ->latest()
            ->get();

        return view(
            'admin.stock.index',
            compact(
                'stocks',
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
        return view('admin.stock.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE STOCK
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'tea_name' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',

        ]);

        Stock::create([

            'tea_name' => $request->tea_name,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
            'description' => $request->description,

        ]);

        activityLog(
            'Create',
            'Stock',
            'New Stock Added'
        );

        return redirect()
            ->route('stock.index')
            ->with(
                'success',
                'Stock Added Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PAGE
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $stock = Stock::findOrFail($id);

        return view(
            'admin.stock.edit',
            compact('stock')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE STOCK
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);

        $request->validate([

            'tea_name' => 'required',
            'quantity' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',

        ]);

        $stock->update([

            'tea_name' => $request->tea_name,
            'quantity' => $request->quantity,
            'purchase_price' => $request->purchase_price,
            'selling_price' => $request->selling_price,
            'status' => $request->status,
            'description' => $request->description,

        ]);

        activityLog(
            'Update',
            'Stock',
            'Stock Updated'
        );

        return redirect()
            ->route('stock.index')
            ->with(
                'success',
                'Stock Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE STOCK
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);

        activityLog(
            'Delete',
            'Stock',
            'Stock Deleted'
        );

        $stock->delete();

        return redirect()
            ->route('stock.index')
            ->with(
                'success',
                'Stock Deleted Successfully'
            );
    }
}