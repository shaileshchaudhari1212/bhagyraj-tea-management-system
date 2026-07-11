<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ForcePasswordChange
{
    /**
     * Handle an incoming request.
     */
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | Only Dealer
        |--------------------------------------------------------------------------
        */

        if (
            $user &&
            $user->role === 'dealer' &&
            $user->must_change_password
        ) {

            /*
            |--------------------------------------------------------------------------
            | Allow only Change Password Routes
            |--------------------------------------------------------------------------
            */

            if (
                !$request->routeIs('dealer.password.change') &&
                !$request->routeIs('dealer.password.update') &&
                !$request->routeIs('logout')
            ) {

                return redirect()->route(
                    'dealer.password.change'
                );

            }

        }

        return $next($request);
    }
}