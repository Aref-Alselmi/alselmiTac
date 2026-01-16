<header class="navbar" aria-label="Main Navigation">
    <div class="container nav-content">

        <!-- Logo -->
        <a href="{{ url('/') }}" class="logo" aria-label="Al-Selmi Center Home">
            <img
                src="{{ asset('assets/images/logo.png') }}"
                alt="Al-Selmi Center for Translation & Administration Consulting"
                class="site-logo"
                loading="eager"
            >
        </a>

        <!-- Navigation -->
        <nav>
            <ul class="nav-links">

                <!-- Home -->
                <li>
                    <a href="{{ url('/') }}"
                       class="{{ request()->is('/') ? 'active' : '' }}">
                        Home
                    </a>
                </li>

                <!-- Services -->
                <li>
                    <a href="{{ url('/#services') }}"
                       class="{{ request()->is('services*') ? 'active' : '' }}">
                        Services
                    </a>
                </li>

                <!-- Contact -->
                <li>
                    <a href="{{ route('contact') }}"
                       class="{{ request()->is('contact') ? 'active' : '' }}">
                        Contact
                    </a>
                </li>

                {{-- Authentication Links --}}
                @guest
                    <li>
                        <a href="{{ route('login') }}"
                           class="{{ request()->is('login') ? 'active' : '' }}">
                            Login
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('register') }}"
                           class="{{ request()->is('register') ? 'active' : '' }}">
                            Register
                        </a>
                    </li>
                @else
                    <li>
                        <a href="{{ route('dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                    style="background:none;border:none;color:inherit;cursor:pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endguest

            </ul>
        </nav>

    </div>
</header>
