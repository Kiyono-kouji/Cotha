@extends('layouts.app')

@section('title', 'Events - COTHA')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Waves --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Hero Section --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 700px;">
                        Upcoming Events
                    </h1>
                    <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 600px;">
                        Join our exciting coding competitions, workshops, and activities!
                    </p>
                </div>
                <div class="d-none d-lg-block col-lg-6"></div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%; pointer-events: none; z-index: 0;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Tabs and Cards in One Card --}}
    <div class="container py-4 position-relative" style="z-index: 2; margin-top: -60px;">
        <div class="card border-0 shadow-lg rounded-4 p-0" style="background: white;">
            {{-- Tabs --}}
            <div class="px-4 pt-4">
                <ul class="nav nav-tabs justify-content-center flex-nowrap overflow-auto" id="eventCategoriesTab" role="tablist" style="border-bottom: 2px solid #e3f2fd;">
                    <li class="nav-item" role="presentation">
                        <a href="{{ route('events.index') }}"
                           class="nav-link px-4 py-2 fw-semibold {{ !$categoryId ? 'active' : '' }}"
                           style="font-size: 1rem; color: #1976D2;"
                           role="tab">
                            All Events
                        </a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item" role="presentation">
                            <a href="{{ route('events.index', ['category' => $category->id]) }}"
                               class="nav-link px-4 py-2 fw-semibold {{ $categoryId == $category->id ? 'active' : '' }}"
                               style="font-size: 1rem; color: #1976D2;"
                               role="tab">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Events Grid --}}
            <div class="p-4">
                @if($events->count() > 0)
                    <div class="row g-4">
                        @foreach($events as $event)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card h-100 border-0 shadow rounded-4 overflow-hidden hover-lift" style="transition: transform 0.3s ease;">
                                    {{-- Event Image --}}
                                    <div class="position-relative" style="height: 200px; overflow: hidden;">
                                        @if($event->image)
                                            <img src="{{ asset('storage/' . $event->image) }}" 
                                                 alt="{{ $event->title }}" 
                                                 class="w-100 h-100" 
                                                 style="object-fit: cover;">
                                        @else
                                            <div class="w-100 h-100 d-flex align-items-center justify-content-center" style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%);">
                                                <i class="bi bi-calendar-event" style="font-size: 4rem; color: white; opacity: 0.5;"></i>
                                            </div>
                                        @endif
                                        
                                        {{-- Category Badge --}}
                                        <div class="position-absolute top-0 start-0 m-3">
                                            <span class="badge rounded-pill px-3 py-2" style="background: rgba(255, 255, 255, 0.9); color: #4fc3f7; font-weight: 600;">
                                                {{ $event->category->name }}
                                            </span>
                                        </div>
                                        
                                        {{-- Price Badge --}}
                                        <div class="position-absolute top-0 end-0 m-3">
                                            @if($event->isFree())
                                                <span class="badge rounded-pill px-3 py-2" style="background: #4caf50; color: white; font-weight: 600;">
                                                    FREE
                                                </span>
                                            @else
                                                <span class="badge rounded-pill px-3 py-2" style="background: #FF85A2; color: white; font-weight: 600;">
                                                    Rp {{ number_format($event->price_per_participant, 0, ',', '.') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="card-body d-flex flex-column p-4">
                                        <h5 class="fw-bold mb-3" style="color: #2C3E50;">{{ $event->title }}</h5>
                                        <p class="text-muted mb-3" style="font-size: 0.9rem;">
                                            {{ \Illuminate\Support\Str::limit($event->description, 100) }}
                                        </p>
                                        
                                        <div class="mt-auto">
                                            {{-- Event Details --}}
                                            <div class="d-flex flex-column gap-2 mb-3">
                                                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.9rem;">
                                                    <i class="bi bi-calendar3" style="color: #4fc3f7;"></i>
                                                    <span>{{ $event->date->format('D, M j, Y') }}</span>
                                                </div>
                                                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.9rem;">
                                                    <i class="bi bi-clock" style="color: #4fc3f7;"></i>
                                                    <span>{{ $event->date->format('H:i') }} WIB</span>
                                                </div>
                                                @if($event->location)
                                                    <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.9rem;">
                                                        <i class="bi bi-geo-alt" style="color: #4fc3f7;"></i>
                                                        <span>{{ $event->location }}</span>
                                                    </div>
                                                @endif
                                                <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.9rem;">
                                                    <i class="bi bi-{{ $event->isTeamBased() ? 'people' : 'person' }}" style="color: #4fc3f7;"></i>
                                                    <span>
                                                        {{ $event->isTeamBased() ? 'Team (Max ' . $event->max_team_members . ' members)' : 'Individual' }}
                                                    </span>
                                                </div>
                                            </div>

                                            <a href="{{ route('events.show', $event) }}" 
                                               class="btn w-100 rounded-pill py-2 fw-semibold"
                                               style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                                                View Details & Register
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    <div class="mt-5">
                        {{ $events->links('pagination::bootstrap-5') }}
                    </div>
                @else
                    <div class="text-center py-5">
                        <i class="bi bi-calendar-x" style="font-size: 4rem; color: #ddd;"></i>
                        <h3 class="mt-3 text-muted">No Events Found</h3>
                        <p class="text-muted">There are no upcoming events at the moment. Check back later!</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection