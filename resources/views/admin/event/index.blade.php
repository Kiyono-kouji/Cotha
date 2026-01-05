@extends('layouts.app')

@section('title', 'Admin - Manage Events')

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
    <div class="container-fluid py-5 position-relative" style="min-height: 420px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 520px;">
                        Manage Events
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 520px;">
                        Create, update, and manage all events at COTHA.
                    </p>
                </div>
                <div class="d-none d-lg-block col-lg-6"></div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Search and Add Button Row --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-7">
                <form method="GET" action="{{ route('admin.events.index') }}" class="d-flex gap-2 align-items-center">
                    <input type="text"
                           name="search"
                           class="form-control rounded-pill px-4 py-2 shadow-sm"
                           style="border: 2px solid #4fc3f7; background: #f8f9fa; color: #1976D2; font-size: 1rem;"
                           placeholder="Search by title, category, location..."
                           value="{{ request('search') }}">
                    <button type="submit"
                            class="btn rounded-pill px-4 fw-semibold d-flex align-items-center"
                            style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); color: white; border: none;">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.events.index') }}"
                           class="btn btn-secondary rounded-pill px-4 fw-semibold d-flex align-items-center"
                           style="background: #e3f2fd; color: #1976D2; border: none;">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
            <div class="col-12 col-md-5 text-end mt-3 mt-md-0">
                <a href="{{ route('admin.events.create') }}"
                   class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                   style="background: #4fc3f7; border: none; color: white;">
                    <i class="bi bi-plus-lg me-2"></i> Add New Event
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success rounded-pill text-center mb-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive bg-white rounded-4 shadow p-4">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Type</th>
                        <th>Date & Time</th>
                        <th>Location</th>
                        <th>Price/Participant</th>
                        <th>Max Team Size</th>
                        <th>Reg. Closes</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td>{{ $event->title }}</td>
                        <td>
                            <span class="badge rounded-pill px-3 py-2" style="background: #E3F2FD; color: #1976D2;">
                                {{ $event->category ? $event->category->name : '-' }}
                            </span>
                        </td>
                        <td>
                            @if($event->registration_type === 'team')
                                <span class="badge rounded-pill px-3 py-2" style="background: #FFF3E0; color: #F57C00;">
                                    <i class="bi bi-people me-1"></i>Team
                                </span>
                            @else
                                <span class="badge rounded-pill px-3 py-2" style="background: #E8F5E9; color: #2E7D32;">
                                    <i class="bi bi-person me-1"></i>Individual
                                </span>
                            @endif
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($event->date)->setTimezone('Asia/Jakarta')->format('D, M j, Y') }}<br>
                            <small class="text-muted">{{ \Carbon\Carbon::parse($event->date)->setTimezone('Asia/Jakarta')->format('H:i') }} WIB</small>
                        </td>
                        <td>{{ $event->location ?? '-' }}</td>
                        <td>
                            @if($event->price_per_team == 0)
                                <span class="badge rounded-pill px-3 py-2" style="background: #4caf50; color: white;">FREE</span>
                            @else
                                Rp {{ number_format($event->price_per_team, 0, ',', '.') }}
                            @endif
                        </td>
                        <td class="text-center">
                            @if($event->registration_type === 'team' && $event->max_team_members)
                                <span class="badge bg-info">{{ $event->max_team_members }} max</span>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($event->last_registration_at)
                                {{ \Carbon\Carbon::parse($event->last_registration_at)->setTimezone('Asia/Jakarta')->format('M j, Y') }}<br>
                                <small class="text-muted">{{ \Carbon\Carbon::parse($event->last_registration_at)->setTimezone('Asia/Jakarta')->format('H:i') }} WIB</small>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if(\Carbon\Carbon::parse($event->date)->isFuture())
                                <span class="badge bg-success">Upcoming</span>
                            @else
                                <span class="badge bg-secondary">Past</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm rounded-pill mb-1" style="background: #FFB74D; color: white;">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.events.destroy', $event) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm rounded-pill" style="background: #e74c3c; color: white;" onclick="return confirm('Delete this event?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center text-muted">No events found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($events->hasPages())
            <div class="text-center mt-5">
                <p class="text-muted mb-3">
                    Page {{ $events->currentPage() }} of {{ $events->lastPage() }}
                </p>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" style="gap: 8px;">
                        {{-- Previous Page Link --}}
                        @if ($events->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $events->previousPageUrl() }}" rel="prev">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $current = $events->currentPage();
                            $last = $events->lastPage();
                            $window = 2;
                            $pages = [];
                            $pages[] = 1;
                            for ($i = $current - $window; $i <= $current + $window; $i++) {
                                if ($i > 1 && $i < $last) {
                                    $pages[] = $i;
                                }
                            }
                            if ($last > 1) {
                                $pages[] = $last;
                            }
                            $pages = array_values(array_unique($pages));
                            sort($pages);
                            $display = [];
                            $prev = null;
                            foreach ($pages as $p) {
                                if ($prev !== null && $p > $prev + 1) {
                                    $display[] = '...';
                                }
                                $display[] = $p;
                                $prev = $p;
                            }
                        @endphp
                        @foreach ($display as $item)
                            @if ($item === '...')
                                <li class="page-item disabled">
                                    <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">...</span>
                                </li>
                            @else
                                <li class="page-item {{ $item == $events->currentPage() ? 'active' : '' }}">
                                    @if ($item == $events->currentPage())
                                        <span class="page-link border-0 shadow-sm" style="background: #4fc3f7; color: #fff; border-radius: 12px;">{{ $item }}</span>
                                    @else
                                        <a class="page-link border-0 shadow-sm"
                                           style="background: #fff; color: #4fc3f7; border: 2px solid #4fc3f7; border-radius: 12px;"
                                           href="{{ $events->url($item) }}">
                                            {{ $item }}
                                        </a>
                                    @endif
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($events->hasMorePages())
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $events->nextPageUrl() }}" rel="next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</section>
@endsection