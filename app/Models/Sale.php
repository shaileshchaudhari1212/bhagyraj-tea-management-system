<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [

        'dealer_id',
        'stock_id',
        'quantity',
        'price_per_kg',
        'total_amount',
        'invoice_number',
        'notes',
        'sale_date',

    ];

    /*
    |--------------------------------------------------------------------------
    | Dealer Relation
    |--------------------------------------------------------------------------
    */

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Stock Relation
    |--------------------------------------------------------------------------
    */

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}