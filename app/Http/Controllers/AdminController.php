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
        $applications = Application::latest()->get();

        return view('admin', compact('submissions', 'applications'));
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