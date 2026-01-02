@extends('layouts.app')

@section('title', $article->headline . ' - Article')

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
    <div class="container py-5 position-relative" style="z-index: 2; max-width: 700px;">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98);">
            <h2 class="fw-bold mb-4">{{ $article->headline }}</h2>
            <div class="mb-4 d-flex flex-column align-items-center">
                @if($article->image1)
                    <img src="{{ asset('storage/' . $article->image1) }}" alt="Image 1" class="mb-3" style="max-width: 100%; max-height: 250px; object-fit: cover;">
                @endif
                @if($article->image2)
                    <img src="{{ asset('storage/' . $article->image2) }}" alt="Image 2" class="mb-3" style="max-width: 100%; max-height: 250px; object-fit: cover;">
                @endif
            </div>
            <div class="mb-4" style="white-space: pre-line; font-size: 1.1rem;">
                {{ $article->body }}
            </div>
            <div class="text-end">
                <a href="{{ route('articles.index') }}" class="btn btn-sm rounded-pill" style="background: #FF85A2; color: white;">
                    <i class="bi bi-arrow-left"></i> Back to Articles
                </a>
            </div>
        </div>
    </div>
</section>
@endsection