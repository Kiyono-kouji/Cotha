<div class="container-fluid position-absolute top-0 start-0 w-100 mt-4" style="z-index: 1000;">
    <div class="container">
        <nav class="navbar navbar-expand-xl" style="background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); border-radius: 24px; padding: 12px 24px; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="{{ asset('images/cotha_logo.PNG') }}" alt="COTHA Logo" style="height: 48px; width: auto;">
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav align-items-center" style="gap: 20px;">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('/') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('levels*') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/levels') }}">
                                Levels
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('testimonials') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/testimonials') }}">
                                Testimonials
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('projects') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/projects') }}">
                                Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('albums*') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/albums') }}">
                                Albums
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('about') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/about') }}">
                                About
                            </a>
                        </li>
                        @auth
                            @if(auth()->user()->isAdmin ?? false)
                                <li class="nav-item">
                                    <a class="nav-link {{ Request::is('admin/dashboard') ? 'fw-bold' : 'fw-normal' }}" style="color: #0052a4;" href="{{ url('/admin/dashboard') }}">
                                        Admin Dashboard
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-link nav-link fw-normal" style="color: #0052a4; text-decoration: none;">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>