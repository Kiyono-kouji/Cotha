<nav class="navbar navbar-expand-lg" style="background: #80c7e4;">
    <div class="container">
        <a class="navbar-brand fw-bold text-white" href="{{ url('/') }}" style="font-size: 1.5rem; letter-spacing: 1px;">
            COTHA
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="gap: 24px;">
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('/') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/') }}">
                        Welcome
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Request::is('courses') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/courses') }}">
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
                    <a class="nav-link text-white {{ Request::is('join') ? 'fw-bold' : 'fw-normal' }}" href="{{ url('/join') }}">
                        Join Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>