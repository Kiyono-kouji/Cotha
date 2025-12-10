@extends('layouts.app')

@section('title', 'Levels - COTHA')

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
    <div class="container-fluid py-5 position-relative" style="background: url('{{ asset('images/WelcomePage/MainBanner.jpg') }}') center center / cover no-repeat; min-height: 550px;">
        {{-- Overlay for better text readability --}}
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;"></div>
        
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-center text-lg-start ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                        Explore Our Levels
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                        Find the perfect course for your child's age and interests!
                    </p>
                </div>
                <div class="d-none d-lg-block col-lg-6"></div>
            </div>
        </div>
        
        <!-- Decorative Waves at Bottom -->
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Levels Section --}}
    <div class="container py-5 mt-3">
        <div class="row g-4 justify-content-center">
            @foreach($levels as $index => $level)
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('/levels/' . $level->slug) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-lg h-100" 
                             style="background: white; border-radius: 20px; overflow: hidden;">
                            {{-- Image Section --}}
                            @if($level->image)
                                <div class="d-flex justify-content-center align-items-center p-0" style="min-height: 200px; height: 200px;">
                                    <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                                         class="img-fluid w-100 h-100"
                                         style="object-fit: cover; border-radius: 0;"
                                         alt="{{ $level->title }}">
                                </div>
                            @endif
                            
                            {{-- Content Section --}}
                            <div class="card-body d-flex flex-column p-4">
                                <h4 class="fw-bold mb-2" style="color: #2C3E50;">{{ $level->title }}</h4>
                                <p class="text-secondary mb-2" style="font-size: 1rem;">{{ $level->subtitle }}</p>
                                
                                @if($level->age_range)
                                    <div class="mb-3">
                                        <span class="badge rounded-4 px-3 py-2" style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); color: white; font-size: 0.9rem;">
                                            <i class="bi bi-person-fill me-1"></i>
                                            {{ $level->age_range }}
                                        </span>
                                    </div>
                                @endif
                                
                                <p class="text-dark mb-4 flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">
                                    {{ \Illuminate\Support\Str::limit($level->description, 150) }}
                                </p>
                                
                                <div class="text-center mt-auto">
                                    <span class="btn btn-sm rounded-4 px-4 py-2" style="background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%); border: none; color: white;">
                                        Learn More
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        {{-- Back to Home Button --}}
        <div class="text-center mt-5">
            <a href="{{ url('/') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake" 
               style="background-color: #4fc3f7; border: none; color: white;">
                <i class="bi bi-house-fill me-2"></i>
                Back to Home
            </a>
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