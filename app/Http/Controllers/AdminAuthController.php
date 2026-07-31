<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        return view('admin-login');
    }

    public function login(Request $request)
    {
        $request->validate(['password' => 'required']);

        if ($request->password === env('ADMIN_PASSWORD')) {
            $request->session()->put('admin_ok', true);
            return redirect('/twc-panel-8x2');
        }

        return back()->withErrors(['password' => 'Wrong password.']);
    }
}