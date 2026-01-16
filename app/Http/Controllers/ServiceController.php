<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display single service details (Public)
     */
    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('services.show', compact('service'));
    }

    /**
     * Display services on home page (Public)
     */
    public function home()
    {
        $services = Service::latest()->get();
        return view('home', compact('services'));
    }

    /**
     * Display a listing of services (Admin)
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new service (Admin)
     */
    public function create()
    {
        return view('admin.services.create');
    }

    /**
     * Store a newly created service (Admin)
     */
    public function store(Request $request)
    {
        // ✅ VALIDATION (rules only – no data)
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'details'     => 'nullable|string',
            'image'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // ✅ IMAGE HANDLING (SAFE & CLEAR)
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('services', 'public');
        }

        // ✅ CREATE SERVICE
        Service::create($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service added successfully');
    }

    /**
     * Show the form for editing the service (Admin)
     */
    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified service (Admin)
     */
    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'details'     => 'nullable|string',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }

            $validated['image'] = $request->file('image')
                ->store('services', 'public');
        }

        $service->update($validated);

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service updated successfully');
    }

    /**
     * Remove the specified service (Admin)
     */
    public function destroy(Service $service)
    {
        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return redirect()
            ->route('admin.services.index')
            ->with('success', 'Service deleted successfully');
    }
}
