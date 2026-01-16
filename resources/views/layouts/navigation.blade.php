<nav class="navbar">
    <div class="container nav-content">

        <!-- Logo -->
        <div class="logo">
            <a href="{{ route('home') }}">
                <img src="{{ asset('assets/images/logo.png') }}" alt="Al-Selmi Center" height="45">
            </a>
        </div>
<x-nav-link href="{{ route('admin.services.index') }}" :active="request()->routeIs('admin.services.*')">
    {{ __('Services') }}
</x-nav-link>
        <!-- Navigation Links -->
        <ul class="nav-links">
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>

            <li>
                <a href="{{ route('contact') }}">Contact</a>
            </li>

            @auth
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>

                <li class="user-name">
                    {{ auth()->user()->name }}
                </li>

                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            Logout
                        </button>
                    </form>
                </li>
            @else
                <li>
                    
                    <a href="{{ route('login') }}">Login</a>
                </li>

                <li>
                    <a href="{{ route('register') }}">Register</a>
                </li>
            @endauth
        </ul>

    </div>
</nav>
