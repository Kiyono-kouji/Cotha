@extends('layouts.app')

@section('title', 'Testimonials - COTHA')

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

    {{-- Hero Section with Absolute Banner Image --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                        Student Testimonials
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                        Hear what our students say about learning at COTHA!
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

    {{-- Testimonials Section --}}
    <div class="container py-5 px-3 px-md-1 position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center">
            @forelse ($testimonials as $t)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow h-100" style="border-radius: 20px; background: white; overflow: hidden; position: relative;">
                        {{-- Quote icon --}}
                        <div class="position-absolute top-0 start-0 m-3">
                            <div class="d-flex align-items-center justify-content-center rounded-circle"
                                 style="width: 40px; height: 40px; background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%);">
                                <i class="bi bi-quote text-white fs-5"></i>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column text-center pt-5 px-4 pb-4">
                            @if($t->photo)
                                <img src="{{ asset('storage/images/StudentPictures/' . $t->photo) }}"
                                     class="rounded-circle mx-auto mb-3 shadow"
                                     width="90" height="90"
                                     alt="{{ $t->name }}"
                                     style="object-fit: cover; border: 4px solid #E3F2FD;">
                            @else
                                <div class="rounded-circle mx-auto mb-3 shadow d-flex align-items-center justify-content-center"
                                     style="width: 90px; height: 90px; background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: 4px solid #E3F2FD;">
                                    <span class="text-white fs-2 fw-bold">{{ substr($t->name, 0, 1) }}</span>
                                </div>
                            @endif

                            <p class="flex-grow-1 mb-3 fst-italic text-secondary" style="font-size: 0.95rem; line-height: 1.6;">
                                "{{ $t->text }}"
                            </p>

                            <h6 class="fw-bold mb-0" style="color: #2C3E50;">{{ $t->name }}</h6>
                            <small class="text-muted mb-4">{{ $t->school ?? '-' }}{{ $t->city ? ' • ' . $t->city : '' }}</small>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info mb-0 text-center border-0 shadow-sm">
                        <i class="fas fa-info-circle me-2"></i>No testimonials available at the moment.
                    </div>
                </div>
            @endforelse
        </div>

        @if ($testimonials->hasPages())
            <div class="text-center mt-5">
                <p class="text-muted mb-3">
                    Page {{ $testimonials->currentPage() }} of {{ $testimonials->lastPage() }}
                </p>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" style="gap: 8px;">
                        {{-- Previous Page Link --}}
                        @if ($testimonials->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $testimonials->previousPageUrl() }}" rel="prev">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @foreach ($testimonials->getUrlRange(1, $testimonials->lastPage()) as $page => $url)
                            @if ($page == $testimonials->currentPage())
                                <li class="page-item active">
                                    <span class="page-link border-0 shadow-sm"
                                          style="background: #FF85A2; color: #fff; font-weight: bold; border-radius: 12px;">
                                        {{ $page }}
                                    </span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link border-0 shadow-sm"
                                       style="background: #fff; color: #4fc3f7; border: 2px solid #4fc3f7; border-radius: 12px;"
                                       href="{{ $url }}">
                                        {{ $page }}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($testimonials->hasMorePages())
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $testimonials->nextPageUrl() }}" rel="next">
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