@extends('layouts.app')

@section('title', $article->headline . ' - COTHA')

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
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                  
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.3; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 900px; margin: 0 auto;">
                        {{ $article->headline }}
                    </h1>
                    <p class="mb-0" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.15);">
                        <i class="bi bi-calendar3 me-2"></i>{{ $article->created_at->format('F j, Y') }}
                    </p>
                </div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Article Content --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8">
                <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                    {{-- Article Images Side by Side --}}
                    @if($article->image1 || $article->image2)
                        <div class="row g-3 mb-4">
                            @if($article->image1)
                                <div class="col-12 {{ $article->image2 ? 'col-md-6' : '' }}">
                                    <img src="{{ asset('storage/images/Articles/' . $article->image1) }}" 
                                         alt="Image 1" 
                                         class="img-fluid rounded-3 w-100 shadow-sm"
                                         style="object-fit: cover; max-height: 400px;"
                                         onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                                </div>
                            @endif
                            
                            @if($article->image2)
                                <div class="col-12 {{ $article->image1 ? 'col-md-6' : '' }}">
                                    <img src="{{ asset('storage/images/Articles/' . $article->image2) }}" 
                                         alt="Image 2" 
                                         class="img-fluid rounded-3 w-100 shadow-sm"
                                         style="object-fit: cover; max-height: 400px;"
                                         onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Article Body --}}
                    <div class="article-content" style="line-height: 1.8; color: #2C3E50;">
                        <p style="white-space: pre-wrap; font-size: 1.1rem;">{{ $article->body }}</p>
                    </div>

                    {{-- Back Button --}}
                    <div class="text-center mt-5">
                        <a href="{{ route('articles.index') }}" 
                           class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow"
                           style="background: #FF85A2; border: none; color: white;">
                            <i class="bi bi-arrow-left me-2"></i>Back to Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Decorative Shapes at Bottom --}}
    <div style="position: relative; margin-top: 60px;">
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 80px; pointer-events: none; z-index: 0;">
            <svg width="100%" height="80" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="120" cy="40" r="24" fill="#4fc3f7" opacity="0.12"/>
                <circle cx="1320" cy="50" r="32" fill="#FF85A2" opacity="0.12"/>
                <rect x="700" y="20" width="48" height="48" rx="16" fill="#FFB74D" opacity="0.10"/>
            </svg>
        </div>
    </div>
</section>
@endsection