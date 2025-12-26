@extends('layouts.app')

@section('title', 'Manage Event Registrations')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Wave on Left Side --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    {{-- Decorative Animated Wave on Right Side --}}
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Hero Section with Banner Image Background --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 420px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto;">
                        Manage Event Registrations
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Review, search, and manage all event registrations at COTHA.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 position-relative" style="z-index: 2;">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- Search Bar --}}
        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-7">
                <form method="GET" action="{{ route('admin.event_registrations.index') }}" class="d-flex gap-2 align-items-center">
                    <input type="text"
                           name="search"
                           class="form-control rounded-pill px-4 py-2 shadow-sm"
                           style="border: 2px solid #4fc3f7; background: #f8f9fa; color: #1976D2; font-size: 1rem;"
                           placeholder="Search by guardian, event, or status..."
                           value="{{ request('search') }}">
                    <button type="submit"
                            class="btn rounded-pill px-4 fw-semibold d-flex align-items-center"
                            style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); color: white; border: none;">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.event_registrations.index') }}"
                           class="btn btn-secondary rounded-pill px-4 fw-semibold d-flex align-items-center"
                           style="background: #e3f2fd; color: #1976D2; border: none;">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
        </div>

        <div class="table-responsive bg-white rounded-4 shadow p-4">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Guardian Name</th>
                        <th>Event</th>
                        <th>Teams</th>
                        <th>Total Price</th>
                        <th>Payment Status</th>
                        <th>Registered At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($registrations as $reg)
                    <tr>
                        <td>{{ $reg->guardian_name }}</td>
                        <td>{{ $reg->event ? $reg->event->title : '-' }}</td>
                        <td>{{ $reg->total_teams }}</td>
                        <td>Rp {{ number_format($reg->total_price, 0, ',', '.') }}</td>
                        <td>
                            @if($reg->payment_status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($reg->payment_status === 'failed')
                                <span class="badge bg-danger">Failed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td>{{ $reg->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.event_registrations.show', $reg->id) }}" class="btn btn-sm rounded-pill" style="background: #17c7e0; color: white;">
                                <i class="bi bi-eye"></i> View
                            </a>
                            <form action="{{ route('admin.event_registrations.destroy', $reg->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm rounded-pill" style="background: #e74c3c; color: white;" onclick="return confirm('Delete this registration?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted">No event registrations found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $registrations->links() }}
            </div>
        </div>
    </div>
</section>
@endsection