@extends('layouts.app')

@section('title', 'Admin Dashboard')

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
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
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
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.8rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 520px;">
                        Admin Dashboard
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.3rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 520px;">
                        Manage all COTHA content, users, and features from one place.
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

    {{-- Admin Cards Section --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.levels.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #4fc3f7;">
                            <i class="bi bi-journal-code fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Levels</h5>
                        <p class="text-secondary mb-0">Create, edit, and delete courses offered at COTHA.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.classes.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #f48acb;">
                            <i class="bi bi-easel2 fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Classes</h5>
                        <p class="text-secondary mb-0">Organize and update class details and schedules.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.projects.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #80c7e4;">
                            <i class="bi bi-controller fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Projects</h5>
                        <p class="text-secondary mb-0">Review and feature student projects.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.methods.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #feda77;">
                            <i class="bi bi-lightbulb fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Methods</h5>
                        <p class="text-secondary mb-0">Edit learning methods and approaches.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.testimonials.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #b3e0f7;">
                            <i class="bi bi-chat-quote fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Testimonials</h5>
                        <p class="text-secondary mb-0">Approve and display student testimonials.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.albums.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #f48acb;">
                            <i class="bi bi-images fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Albums</h5>
                        <p class="text-secondary mb-0">Create, edit, and organize photo/video albums.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.partners.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #80c7e4;">
                            <i class="bi bi-people fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Partners</h5>
                        <p class="text-secondary mb-0">Add, edit, and organize partner logos and connections.</p>
                    </div>
                </a>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <a href="{{ route('admin.registrations.index') }}" class="card border-0 shadow h-100 text-decoration-none" style="border-radius: 20px; background: white;">
                    <div class="card-body text-center py-5 d-flex flex-column align-items-center justify-content-center h-100">
                        <div class="mb-3 d-flex align-items-center justify-content-center mx-auto"
                             style="width: 64px; height: 64px; border-radius: 50%; background: #80c7e4;">
                            <i class="bi bi-clipboard-check fs-2 text-white"></i>
                        </div>
                        <h5 class="fw-bold mb-2" style="color: #2C3E50;">Manage Registrations</h5>
                        <p class="text-secondary mb-0">Review and contact registered users.</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection