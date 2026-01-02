@extends('layouts.app')

@section('title', $article->headline . ' - COTHA')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    <style>
        .badge-pink { background: #FF85A2 !important; color: #fff !important; }
    </style>
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
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-2" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18);">{{ $article->headline }}</h1>
                    <small class="badge badge-pink rounded-pill px-3 py-2">
                        <i class="bi bi-calendar3 me-1"></i>
                        {{ $article->created_at->timezone('Asia/Jakarta')->format('D, M j, Y') }}
                    </small>
                </div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Content Card Overlay --}}
    <div class="container position-relative" style="z-index: 2; margin-top: -100px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8">
                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98);">
                    @php
                        $first = $article->thumbnail ?: $article->image1;
                        $img1  = $first ? asset('storage/images/Articles/' . $first) : null;
                        $img2  = $article->image2 ? asset('storage/images/Articles/' . $article->image2) : null;
                    @endphp

                    @if($img1 || $img2)
                        <div class="row g-3 mb-3">
                            <div class="{{ $img2 ? 'col-12 col-md-6' : 'col-12' }}">
                                <div class="rounded-4 overflow-hidden" style="height: 260px;">
                                    <img src="{{ $img1 ?? asset('images/default_project.png') }}"
                                         alt="Image 1"
                                         class="w-100 h-100"
                                         style="object-fit: cover;"
                                         loading="lazy"
                                         onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                                </div>
                            </div>
                            @if($img2)
                            <div class="col-12 col-md-6">
                                <div class="rounded-4 overflow-hidden" style="height: 260px;">
                                    <img src="{{ $img2 }}"
                                         alt="Image 2"
                                         class="w-100 h-100"
                                         style="object-fit: cover;"
                                         loading="lazy"
                                         onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                                </div>
                            </div>
                            @endif
                        </div>
                    @endif

                    <div class="text-secondary" style="white-space: pre-line; font-size:1.05rem;">
                        {{ $article->body }}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('articles.index') }}" class="btn btn-lg rounded-pill px-4 fw-semibold shadow"
                           style="background: #4fc3f7; border: none; color: white;">
                            <i class="bi bi-arrow-left me-2"></i>Back to Articles
                        </a>
                    </div>

                    <div style="position: absolute; top: -30px; right: -30px; width: 60px; height: 60px; border-radius: 50%; background: #FF85A2; opacity: 0.12; z-index: 0;"></div>
                    <div style="position: absolute; bottom: -30px; left: -30px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 0;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection