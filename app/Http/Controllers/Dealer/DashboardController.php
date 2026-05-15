<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dealer.dashboard');
    }
}