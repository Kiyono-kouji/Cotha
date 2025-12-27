@extends('layouts.app')

@section('title', 'Event Registration Detail')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Banner Background --}}
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
                        Event Registration Detail
                    </h1>
                    <div class="mb-3 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                        <a href="{{ route('admin.event_registrations.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                           style="background: #4fc3f7; border: none; color: white;">
                            <i class="bi bi-arrow-left me-2"></i>Back to Event Registrations
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                <div class="card shadow border-0 rounded-4 p-4">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-semibold text-secondary">Invoice Number</dt>
                        <dd class="col-sm-8">{{ $registration->invoice_number }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Guardian Name</dt>
                        <dd class="col-sm-8">{{ $registration->guardian_name }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Guardian Phone</dt>
                        <dd class="col-sm-8">{{ $registration->guardian_phone }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Guardian Email</dt>
                        <dd class="col-sm-8">{{ $registration->guardian_email }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Event</dt>
                        <dd class="col-sm-8">{{ $registration->event ? $registration->event->title : '-' }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Total Teams</dt>
                        <dd class="col-sm-8">{{ $registration->total_teams }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Total Price</dt>
                        <dd class="col-sm-8">Rp {{ number_format($registration->total_price, 0, ',', '.') }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Payment Status</dt>
                        <dd class="col-sm-8">
                            @if($registration->payment_status === 'paid')
                                <span class="badge bg-success">Paid</span>
                            @elseif($registration->payment_status === 'failed')
                                <span class="badge bg-danger">Failed</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Registered At</dt>
                        <dd class="col-sm-8">{{ $registration->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i') }}</dd>
                    </dl>
                    <hr>
                    <h5 class="fw-bold mb-3">Teams & Members</h5>
                    @foreach($registration->teams as $team)
                        <div class="mb-3">
                            <div class="fw-semibold mb-1" style="color: #1976D2;">{{ $team->team_name }}</div>
                            <ul class="list-group">
                                @foreach($team->participants as $member)
                                    <li class="list-group-item d-flex flex-column flex-md-row justify-content-between align-items-md-center">
                                        <span>
                                            <strong>{{ $member->name }}</strong>
                                            <span class="text-muted ms-2">{{ $member->email }}</span>
                                        </span>
                                        <span class="text-muted">{{ $member->school }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection