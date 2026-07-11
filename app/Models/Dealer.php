<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
    protected $fillable = [

        'user_id',

        'name',

        'shop_name',

        'mobile',

        'email',

        'address',

        'status',

    ];

    /*
    |--------------------------------------------------------------------------
    | USER RELATION
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(
            User::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SALES RELATION
    |--------------------------------------------------------------------------
    */

    public function sales()
    {
        return $this->hasMany(
            Sale::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | PAYMENTS RELATION
    |--------------------------------------------------------------------------
    */

    public function payments()
    {
        return $this->hasMany(
            Payment::class
        );
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL PURCHASE
    |--------------------------------------------------------------------------
    */

    public function totalPurchase()
    {
        return $this->sales()->sum(
            'total_amount'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | TOTAL PAYMENT
    |--------------------------------------------------------------------------
    */

    public function totalPayment()
    {
        return $this->payments()->sum(
            'amount'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | REMAINING BALANCE
    |--------------------------------------------------------------------------
    */

    public function remainingBalance()
    {
        return $this->totalPurchase()
            -
            $this->totalPayment();
    }
}