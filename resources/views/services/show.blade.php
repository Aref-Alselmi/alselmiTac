@extends('layouts.site')

@section('title', $service->title)

@section('content')
<section class="service-details-page">
    <div class="container">

        <!-- Service Title -->
        <h1 class="service-title">
            {{ $service->title }}
        </h1>

        <!-- Service Image -->
        <div class="service-hero-image">
            <img
                src="{{ asset('storage/' . $service->image) }}"
                alt="{{ $service->title }}"
            >
        </div>

        <!-- Service Description / Details -->
        <div class="service-content">
            @if($service->details)
                {!! nl2br(e($service->details)) !!}
            @else
                <p>{{ $service->description }}</p>
            @endif
        </div>

        <!-- Call to Action -->
        <div class="service-cta">
            <a href="{{ route('contact') }}" class="btn btn-primary">
                Contact Us
            </a>
        </div>

    </div>
</section>
@endsection
