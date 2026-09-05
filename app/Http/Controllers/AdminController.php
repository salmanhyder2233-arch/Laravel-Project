<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Application;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $submissions = ContactSubmission::latest()->get();
        $roleFilter = $request->query('role');
        $applications = Application::when($roleFilter, function ($query, $roleFilter) {
            $query->where('role', $roleFilter);
        })->latest()->get();

        $settings = SiteSetting::first();

        return view('admin', compact('submissions', 'applications', 'roleFilter', 'settings'));
    }

    public function deleteSubmission($id)
    {
        ContactSubmission::findOrFail($id)->delete();
        return back()->with('success', 'Submission deleted.');
    }

    public function deleteApplication($id)
    {
        Application::findOrFail($id)->delete();
        return back()->with('success', 'Application deleted.');
    }

    public function updateSettings(Request $request)
    {
        $validated = $request->validate([
            'raised_amount' => 'required|integer|min:0',
            'goal_amount' => 'required|integer|min:1',
        ]);

        $settings = SiteSetting::first();
        $settings->update($validated);

        return back()->with('success', 'Progress bar updated.');
    }
}