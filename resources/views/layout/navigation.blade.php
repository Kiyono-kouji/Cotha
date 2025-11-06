<nav class="navbar navbar-expand-lg" style="background: #80c7e4;">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}" style="font-size: 1.5rem; letter-spacing: 1px;">
            COTHA
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            @auth
                @if(Auth::user()->is_admin)
                    <ul class="navbar-nav" style="gap: 24px;">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/dashboard') ? 'fw-bold' : 'fw-normal' }}" href="{{ route('admin.dashboard') }}">
                                Admin Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/courses') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/admin/courses') }}">
                                Manage Courses
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/classes') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/admin/classes') }}">
                                Manage Classes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('admin/projects') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/admin/projects') }}">
                                Manage Projects
                            </a>
                        </li>
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-link text-white fw-semibold px-0" style="text-decoration: none;">
                                    <i class="bi bi-box-arrow-right me-1"></i> Log Out
                                </button>
                            </form>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav" style="gap: 24px;">
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('/') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/') }}">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ Request::is('courses*') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/courses') }}">
                                Courses
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
                            <a class="nav-link text-white {{ Request::is('about') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/about') }}">
                                About
                            </a>
                        </li>
                    </ul>
                @endif
            @else
                <ul class="navbar-nav" style="gap: 24px;">
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('/') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/') }}">
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white {{ Request::is('courses*') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/courses') }}">
                            Courses
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
                        <a class="nav-link text-white {{ Request::is('about') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/about') }}">
                            About
                        </a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>