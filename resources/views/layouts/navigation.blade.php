<nav class="navbar navbar-expand-lg" style="background: #3082e5;">
    <div class="container">
        <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="{{ url('/') }}">
            <div style="background: #fff; border-radius: 12px; padding: 4px 12px 4px 4px; display: flex; align-items: center; justify-content: center; height: 48px;">
                <img src="{{ asset('images/cotha_logo.PNG') }}" alt="COTHA Logo" style="height: 60px;">
            </div>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="gap: 24px;">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('/') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/') }}">
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('levels*') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/levels') }}">
                        Levels
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('testimonials') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/testimonials') }}">
                        Testimonials
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('projects') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/projects') }}">
                        Projects
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('albums*') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/albums') }}">
                        Albums
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('about') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/about') }}">
                        About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ request()->routeIs('events.index') ? 'fw-bold' : 'fw-normal' }}" href="{{ route('events.index') }}">
                        Events
                    </a>
                </li>
                @auth
                    @if(auth()->user()->isAdmin ?? false)
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/admin/dashboard') }}">
                                Admin Dashboard
                            </a>
                        </li>
                    @endif
                    <li class="nav-item d-flex align-items-center h-100">
                        <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center h-100">
                            @csrf
                            <button type="submit" class="nav-link btn btn-link text-white fw-normal px-0" style="margin: 0; height: 100%;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                @endauth
            </ul>
        </div>
    </div>
</nav>