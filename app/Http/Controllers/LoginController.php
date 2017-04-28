<?php

namespace Mentor\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Mentor\Http\Requests;
use Mentor\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials, true)):
            return redirect()->route('app.index');
        endif;

        return redirect()->back();
    }

    public function logout()
    {
        Auth::logout();

        return view('auth.login');
    }
}
