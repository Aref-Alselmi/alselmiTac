@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container">

    <h1>Dashboard</h1>
    <p>Welcome, <strong>{{ auth()->user()->name }}</strong>.</p>

    {{-- INSIGHTS --}}
    <div class="dashboard-stats">
        <div class="stat-card">
            <h3>Total Requests</h3>
            <p>{{ $totalContacts }}</p>
        </div>

        <div class="stat-card">
            <h3>New Requests</h3>
            <p>{{ $newContacts }}</p>
        </div>

        <div class="stat-card">
            <h3>Today</h3>
            <p>{{ $todayContacts }}</p>
        </div>
    </div>
<a href="{{ route('admin.services.index') }}" class="btn btn-primary">
    Manage Services
</a>
    {{-- CONTACT REQUESTS TABLE --}}
    <h2>Contact Requests</h2>

    @if($contacts->count())
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->service }}</td>
                        <td>{{ ucfirst(str_replace('_',' ',$contact->status)) }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $contacts->links() }}
    @else
        <p>No contact requests found.</p>
    @endif

</div>
@endsection
