<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))

    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )

    ->withMiddleware(function (Middleware $middleware): void {

        $middleware->trustProxies(at: '*');

        $middleware->alias([

            /*
            |--------------------------------------------------------------------------
            | ADMIN
            |--------------------------------------------------------------------------
            */

            'admin' => \App\Http\Middleware\AdminMiddleware::class,

            /*
            |--------------------------------------------------------------------------
            | DEALER
            |--------------------------------------------------------------------------
            */

            'dealer' => \App\Http\Middleware\DealerMiddleware::class,

            /*
            |--------------------------------------------------------------------------
            | FORCE PASSWORD CHANGE
            |--------------------------------------------------------------------------
            */

            'force.password.change' => \App\Http\Middleware\ForcePasswordChange::class,

            /*
            |--------------------------------------------------------------------------
            | DEALER ACTIVE
            |--------------------------------------------------------------------------
            */

            'dealer.active' => \App\Http\Middleware\DealerActiveMiddleware::class,

        ]);

    })

    ->withExceptions(function (Exceptions $exceptions): void {

        //
    
    })

    ->create();