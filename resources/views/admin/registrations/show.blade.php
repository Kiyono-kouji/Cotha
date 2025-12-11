@extends('layouts.app')

@section('title', 'Registration Detail')

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
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto;">
                        Registration Detail
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Review the details of this trial class registration.
                    </p>
                    <div class="mb-3 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                        <a href="{{ route('admin.registrations.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                           style="background: #FF85A2; border: none; color: white;">
                            Back to Registrations
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Registration Detail Card --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 col-xl-7">
                <div class="card shadow border-0 rounded-4 p-4">
                    <dl class="row mb-0">
                        <dt class="col-sm-4 fw-semibold text-secondary">Child Name</dt>
                        <dd class="col-sm-8">{{ $registration->child_name }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">DOB</dt>
                        <dd class="col-sm-8">{{ $registration->dob }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Class</dt>
                        <dd class="col-sm-8">{{ $registration->class_title }} ({{ $registration->class_level }})</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">School</dt>
                        <dd class="col-sm-8">{{ $registration->school }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">City</dt>
                        <dd class="col-sm-8">{{ $registration->city }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">WhatsApp</dt>
                        <dd class="col-sm-8">{{ $registration->wa }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Language</dt>
                        <dd class="col-sm-8">{{ $registration->language }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Coding Experience</dt>
                        <dd class="col-sm-8">{{ $registration->coding_experience }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Submitted At</dt>
                        <dd class="col-sm-8">{{ $registration->created_at->format('Y-m-d H:i') }}</dd>
                        <dt class="col-sm-4 fw-semibold text-secondary">Note</dt>
                        <dd class="col-sm-8">{{ $registration->note }}</dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection