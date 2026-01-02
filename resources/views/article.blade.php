@extends('layouts.app')

@section('title', 'Articles - COTHA')

@section('main_content')
{{-- Hero Section with Absolute Banner Image --}}
<div class="container-fluid py-5 position-relative" style="min-height: 550px;">
    {{-- Background banner image --}}
    <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
        <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
             alt="Hero Banner"
             style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
        <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
        <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
    </div>
    {{-- Hero text --}}
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-lg-start text-center ms-lg-5 ps-lg-0" style="margin-top: 8rem !important;">
                <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                    Articles
                </h1>
                <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                    Read the latest news, tips, and stories from COTHA.
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

{{-- Articles Section --}}
<div class="container py-5 px-3 px-md-1 position-relative" style="z-index: 2;">
    <div class="row g-4">
        @forelse($articles as $article)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow rounded-4 h-100 tilt-card fade-in-up" style="background: white; border-radius: 20px;">
                @if($article->image1 || $article->image2)
                <div class="d-flex flex-column align-items-center pt-3">
                    @if($article->image1)
                        <img src="{{ asset('storage/' . $article->image1) }}" alt="Image 1" class="mb-2" style="max-width: 100%; max-height: 180px; object-fit: cover; border-radius: 12px;">
                    @endif
                    @if($article->image2)
                        <img src="{{ asset('storage/' . $article->image2) }}" alt="Image 2" class="mb-2" style="max-width: 100%; max-height: 180px; object-fit: cover; border-radius: 12px;">
                    @endif
                </div>
                @endif
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title fw-bold" style="color: #2C3E50;">{{ $article->headline }}</h5>
                    <div class="card-text mb-2" style="white-space: pre-line; color: #555;">{{ \Illuminate\Support\Str::limit($article->body, 120) }}</div>
                    <div class="mt-auto">
                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-sm rounded-pill shake" style="background: #4fc3f7; color: white;">Read More</a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info rounded-4 text-center py-5 mb-0">
                <i class="bi bi-file-earmark-text fs-1 text-muted mb-3 d-block"></i>
                <p class="text-muted mb-0">No articles available at the moment.</p>
            </div>
        </div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection