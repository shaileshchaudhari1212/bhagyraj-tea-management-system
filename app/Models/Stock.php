<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [

        'tea_name',
        'quantity',
        'purchase_price',
        'selling_price',
        'status',
        'description',

    ];

    /*
    |--------------------------------------------------------------------------
    | Sales Relation
    |--------------------------------------------------------------------------
    */

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}