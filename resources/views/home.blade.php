@extends('layouts.site')

@section('title', 'Home')

@section('content')

<!-- HERO SECTION -->
<section class="home-hero">
    <div class="home-hero-overlay"></div>

    <div class="home-hero-content">
        <h2>Translation, Administrative Consulting & Training</h2>

        <p>
            Empowering organizations with professional translation, strategic consulting,
            and capacity-building solutions.
        </p>

        <a href="#services" class="btn btn-primary">Our Services</a>
    </div>
</section>

<!-- SERVICES -->
<section id="services" class="services-section">
    <div class="container">

        <div class="services-grid">
            @forelse($services as $service)

                <!-- STEP 4: Make service clickable -->
                <a href="{{ route('services.show', $service->id) }}" class="service-link">

                    <article class="card">
                        <img
                            src="{{ asset('storage/' . $service->image) }}"
                            alt="{{ $service->title }}"
                            loading="lazy"
                        >
                        <h3>{{ $service->title }}</h3>
                        <p>
    {{ \Illuminate\Support\Str::limit($service->description, 100) }}
</p>
                    </article>

                </a>

            @empty
                <p>No services available.</p>
            @endforelse
        </div>

    </div>
</section>

@endsection
