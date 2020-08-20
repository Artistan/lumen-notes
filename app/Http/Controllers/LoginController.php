<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (\Auth::attempt($credentials, $request->has('remember'))) {
            // Authentication passed...
            return redirect('/notes');
        }
    }
}
