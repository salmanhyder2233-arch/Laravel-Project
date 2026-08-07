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
            'message' => 'nullable|string|max:2000',
            'join_reason' => 'required|string|max:255',
        ]);

        Application::create($validated);

        return back()->with('success', 'Application submitted — thank you!');
    }
}