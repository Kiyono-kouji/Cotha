<nav class="navbar navbar-expand-lg navbar-light shadow-sm py-2 sticky-top" style="background: #80c7e4; border-bottom: 1px solid #e3e6ea;">
    <div class="container">
        {{-- Logo/Brand --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="font-size: 1.5rem; letter-spacing: 1px; color:#ffffff">
            COTHA
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav" style="gap: 8px;">
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is('/') ? 'active text-primary' : 'text-dark' }}" href="{{ url('/') }}">
                        Welcome
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold {{ Request::is('program') ? 'active text-primary' : 'text-dark' }}" href="{{ url('/program') }}">
                        Program
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fw-semibold btn btn-primary text-white px-3 ms-2" style="border-radius: 8px;" href="{{ url('/join') }}">
                        Join Us
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>