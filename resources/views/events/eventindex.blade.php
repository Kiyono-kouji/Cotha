@extends('layouts.app')

@section('title', 'Events - COTHA')

@section('main_content')
{{-- Hero Section with Absolute Banner Image --}}
<div class="container-fluid py-5 position-relative" style="min-height: 550px;">
    {{-- Background banner image --}}
    <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
        <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
             alt="Events Banner"
             style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
        <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
        <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
    </div>
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-center text-lg-start ps-lg-5" style="margin-top: 8rem !important;">
                <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                    Events & Activities
                </h1>
                <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                    Discover upcoming workshops, competitions, and seminars at COTHA!
                </p>
            </div>
        </div>
    </div>
    {{-- Bottom wave --}}
    <div style="position: absolute; bottom: -1px; left: 0; width: 100%; pointer-events: none; z-index: 0;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
            <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</div>

{{-- Events Filter & Grid --}}
<div class="container py-5 px-3 px-md-1">
    <div class="mb-4">
        <ul class="nav nav-pills overflow-auto flex-nowrap justify-content-center" style="gap: 12px;">
            <li class="nav-item">
                <a class="nav-link {{ empty($category) ? 'active' : '' }}" href="{{ route('events.index') }}">All</a>
            </li>
            @foreach(['offline','online','competition','workshop','seminar'] as $cat)
                <li class="nav-item">
                    <a class="nav-link {{ ($category === $cat) ? 'active' : '' }}" href="{{ route('events.index', ['category' => $cat]) }}">
                        {{ ucfirst($cat) }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-4">
        <h2 class="h5 text-dark text-center mb-4">Latest Events</h2>
        @if($events->count() === 0)
            <div class="bg-white border rounded p-4 text-center text-muted">
                No events found{{ $category ? " for ".ucfirst($category) : '' }}.
            </div>
        @else
            <div class="row g-4 mt-1">
                @foreach($events as $event)
                    <div class="col-12 col-sm-6 col-lg-4">
                        <div class="card h-100 shadow-sm border-0" style="border-radius: 20px; background: white; overflow: hidden;">
                            <div class="position-relative" style="aspect-ratio: 16/9; overflow: hidden;">
                                <img src="{{ $event->image }}" alt="{{ $event->title }}" class="w-100 h-100" style="object-fit: cover;">
                                @if($event->category)
                                    <span class="badge position-absolute top-0 start-0 m-2 px-3 py-2" style="background: #4fc3f7; color: #fff; font-size: 0.9rem; border-radius: 12px;">
                                        {{ ucfirst($event->category) }}
                                    </span>
                                @endif
                            </div>
                            <div class="card-body d-flex flex-column">
                                <h5 class="fw-bold mb-2" style="color: #2C3E50;">{{ $event->title }}</h5>
                                <div class="d-flex flex-column gap-1 small text-muted mb-2">
                                    <span class="d-inline-flex align-items-center gap-2">
                                        <i class="bi bi-calendar-event"></i>
                                        {{ $event->date ? \Carbon\Carbon::parse($event->date)->format('D, M j, Y') : '-' }}
                                    </span>
                                    <span class="d-inline-flex align-items-center gap-2">
                                        <i class="bi bi-geo-alt"></i>
                                        {{ $event->location ?? '-' }}
                                    </span>
                                </div>
                                <div class="mt-auto">
                                    <span class="fw-semibold text-danger">{{ $event->price }}</span>
                                    <button type="button" class="btn btn-primary btn-sm rounded-pill ms-3"
                                        data-bs-toggle="modal"
                                        data-bs-target="#registerEventModal{{ $event->id }}">
                                        Register
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Registration Modal --}}
                    <div class="modal fade" id="registerEventModal{{ $event->id }}" tabindex="-1" aria-labelledby="registerEventModalLabel{{ $event->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow" style="border-radius: 16px;">
                                <div class="modal-header" style="background: #4fc3f7; border-radius: 16px 16px 0 0;">
                                    <h5 class="modal-title text-white fw-bold" id="registerEventModalLabel{{ $event->id }}">
                                        Register for {{ $event->title }}
                                    </h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4" style="background-color: #F5F5F5;">
                                    @if($event->price === 'Free')
                                        {{-- Free event registration form --}}
                                        <form method="POST" action="{{ route('events.register', $event->id) }}">
                                            @csrf
                                            <div class="mb-2">
                                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="email" name="email" class="form-control" placeholder="Your Email (optional)">
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" name="wa" class="form-control" placeholder="WhatsApp Number (optional)">
                                            </div>
                                            <button type="submit" class="btn btn-info btn-sm">Register for Free</button>
                                        </form>
                                    @else
                                        {{-- Paid event registration form --}}
                                        <form method="POST" action="{{ route('events.register', $event->id) }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold" style="color:#2C3E50;">Your Name</label>
                                                <input type="text" name="name" class="form-control rounded-pill" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold" style="color:#2C3E50;">Email</label>
                                                <input type="email" name="email" class="form-control rounded-pill" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold" style="color:#2C3E50;">Phone Number</label>
                                                <input type="tel" name="phone" class="form-control rounded-pill" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label fw-semibold" style="color:#2C3E50;">Notes / Questions</label>
                                                <textarea name="note" class="form-control rounded-pill" rows="2"></textarea>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-lg px-4 py-2 fw-semibold rounded-pill shadow"
                                                        style="background-color: #4fc3f7; border: none; color: white;">
                                                    Submit Registration
                                                </button>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @if($events->hasPages())
                <div class="d-flex justify-content-center my-5">
                    {{ $events->links('pagination::bootstrap-5') }}
                </div>
            @endif
        @endif
    </div>
</div>
@endsection