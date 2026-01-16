<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Store a new contact request (Public Contact Form)
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'required|string',
            'service' => 'required|string',
            'details' => 'required|string',
        ]);

        Contact::create($request->all());

        return back()->with('success', 'Your message has been sent successfully.');
    }

    /**
     * Update contact request status (Dashboard only)
     */
    public function updateStatus(Request $request, Contact $contact)
    {
        $request->validate([
            'status' => 'required|in:new,in_progress,closed'
        ]);

        $contact->update([
            'status' => $request->status
        ]);

        return back()->with('success', 'Status updated successfully.');
    }
}
