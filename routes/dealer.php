<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'dealer'])
    ->prefix('dealer')
    ->group(function () {

        Route::get('/dashboard', function () {
            return 'Dealer Dashboard';
        });

    });