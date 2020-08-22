<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        //dd($credentials, Auth::attempt($credentials, $request->has('remember')), Auth::user());

        if (Auth::attempt($credentials,true)) {
            Auth::user()->touch();
            return redirect('/notes');
        }
        return redirect('/?errors[]=Failed to Authenticate');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function logout()
    {
        if (Auth::logout()) {
            // Authentication passed...
            return redirect('/');
        }
        return redirect('/?errors[]=Failed to Logout');
    }
}
