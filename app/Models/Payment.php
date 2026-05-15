<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [

        'dealer_id',
        'amount',
        'payment_type',
        'notes',
        'payment_date',

    ];

    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}