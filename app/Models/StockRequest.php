<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockRequest extends Model
{
    protected $fillable = [

        'dealer_id',
        'stock_id',
        'quantity',
        'notes',
        'status',
        'approved_by',

    ];

    /*
    |--------------------------------------------------------------------------
    | DEALER
    |--------------------------------------------------------------------------
    */

    public function dealer()
    {
        return $this->belongsTo(
            Dealer::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | STOCK
    |--------------------------------------------------------------------------
    */

    public function stock()
    {
        return $this->belongsTo(
            Stock::class
        );
    }
}