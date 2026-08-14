<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'role'    => 'required|string|max:255',
            'message' => 'nullable|string|max:500',
            'join_reason' => 'required|string|max:250',
        ]);

        Application::create($validated);

        return redirect(url()->previous() . '#apply-section')->with('success', 'Application submitted — thank you!');    }
}