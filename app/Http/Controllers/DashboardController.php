<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard overview.
     */
    public function index(): View
    {
        // Fetch contact requests (latest first)
        $contacts = Contact::latest()->paginate(10);

        // Dashboard insights
        $stats = [
            'totalContacts' => Contact::count(),
            'newContacts'   => Contact::where('status', 'new')->count(),
            'todayContacts' => Contact::whereDate('created_at', today())->count(),
        ];

        return view('dashboard', array_merge(
            ['contacts' => $contacts],
            $stats
        ));
    }
}
