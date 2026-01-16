@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')

<main class="container">

    <h1>Contact Us</h1>

    {{-- Success message --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation errors --}}
    @if ($errors->any())
        <div class="alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" class="contact-form">
        @csrf

        <div class="form-group">
            <label for="name">Full Name</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input
                type="text"
                id="phone"
                name="phone"
                value="{{ old('phone') }}"
            >
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input
                type="text"
                id="subject"
                name="subject"
                value="{{ old('subject') }}"
                required
            >
        </div>

        <div class="form-group">
            <label for="service">Service</label>
            <select name="service" id="service" required>
                <option value="">-- Select Service --</option>
                <option value="Translation" {{ old('service')=='Translation'?'selected':'' }}>Translation</option>
                <option value="Administrative Consulting" {{ old('service')=='Administrative Consulting'?'selected':'' }}>Administrative Consulting</option>
                <option value="Recruitment" {{ old('service')=='Recruitment'?'selected':'' }}>Recruitment</option>
                <option value="Data Analytics" {{ old('service')=='Data Analytics'?'selected':'' }}>Data Analytics</option>
                <option value="Training" {{ old('service')=='Training'?'selected':'' }}>Training</option>
            </select>
        </div>

        <div class="form-group">
            <label for="details">Message</label>
            <textarea
                name="details"
                id="details"
                rows="5"
                required
            >{{ old('details') }}</textarea>
        </div>

        <button type="submit" class="btn-submit">
            Send Message
        </button>
    </form>

</main>

@endsection
