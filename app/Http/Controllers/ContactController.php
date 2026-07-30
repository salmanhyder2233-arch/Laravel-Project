<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;
use App\Models\ContactSubmission;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
        ]);

        ContactSubmission::create($validated);

        Mail::to('twcorg.pk@gmail.com')->send(new ContactFormSubmitted($validated));

        return back()->with('success', 'Message sent — thanks for reaching out!');
    }
}