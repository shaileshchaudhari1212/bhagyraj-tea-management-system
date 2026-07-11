<?php

namespace App\Http\Controllers\Dealer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CHANGE PASSWORD PAGE
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view(
            'dealer.change-password'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE PASSWORD
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $request->validate([

            'current_password' => [
                'required'
            ],

            'password' => [
                'required',
                'confirmed',
                'min:8'
            ],

        ]);

        $user = auth()->user();

        /*
        |--------------------------------------------------------------------------
        | CHECK CURRENT PASSWORD
        |--------------------------------------------------------------------------
        */

        if (
            !Hash::check(
                $request->current_password,
                $user->password
            )
        ) {

            return back()->withErrors([

                'current_password' =>
                    'Current password is incorrect.'

            ]);

        }

        /*
        |--------------------------------------------------------------------------
        | SAVE NEW PASSWORD
        |--------------------------------------------------------------------------
        */

        $user->password = Hash::make(
            $request->password
        );

        $user->must_change_password = false;

        $user->save();

        return redirect()
            ->route('dealer.dashboard')
            ->with(
                'success',
                'Password changed successfully.'
            );
    }
}