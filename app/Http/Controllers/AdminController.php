<?php

namespace App\Http\Controllers;

use App\Models\ContactSubmission;
use App\Models\Application;
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

        return view('admin', compact('submissions', 'applications', 'roleFilter'));
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
}