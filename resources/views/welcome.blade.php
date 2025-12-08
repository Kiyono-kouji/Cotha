@extends('layouts.app')

@section('title', 'COTHA - 1st CHOICE Coding & Technology Learning Center for KIDS')

@section('main_content')
<section style="overflow: hidden">
    {{-- Hero Section with Banner Image Background --}}
    <div class="container-fluid py-5 position-relative" style="background: url('{{ asset('images/WelcomePage/MainBanner.jpg') }}') center center / cover no-repeat; min-height: 500px;">
        {{-- Overlay for better text readability --}}
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(74, 144, 226, 0.15);"></div>
        
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center">
                {{-- Left Content --}}
                <div class="col-12 col-lg-6 text-white mb-4 mb-lg-0 fade-in">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Belajar Coding Jadi Seru!
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">
                        Yuk, belajar ngoding lewat game seru dari nol!
                    </p>
                    <div class="d-flex gap-3 flex-wrap">
                        @auth
                            @if(auth()->user()->isAdmin)
                                <a href="{{ url('/admin/dashboard') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow" style="background-color: #FF6B9D; border: none; color: white;">
                                    Admin Dashboard
                                </a>
                            @endif
                        @endauth
                        <a href="{{ url('/levels') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow shake" style="background-color: #FF85A2; border: none; color: white;">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- {{-- Decorative Waves at Bottom --}}
        <div style="position: absolute; bottom: 0; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div> -->
    </div>

    {{-- Level Cards Section with Colorful Icons --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Level yang Tersedia</h2>
            <p class="text-secondary fs-5">Pilih level yang sesuai dengan usia dan minat anak!</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            @foreach($levels as $index => $level)
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="{{ url('/levels/' . $level->slug) }}" class="text-decoration-none">
                        <div class="card border-0 shadow-lg h-100 tilt-card fade-in-up delay-{{ ($index % 4) + 1 }}" 
                             style="background: white; border-radius: 20px; transition: transform 0.3s;">
                            {{-- Colorful Icon Circle --}}
                            <div class="d-flex justify-content-center pt-4">
                                <div class="rounded-circle d-flex align-items-center justify-content-center pulse" 
                                     style="width: 100px; height: 100px; background: {{ ['#FF6B9D', '#FFB74D', '#9C27B0', '#4CAF50'][$index % 4] }};">
                                    @if($level->image)
                                        <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                                             class="img-fluid"
                                             style="max-width: 70px; max-height: 70px; object-fit: contain;"
                                             alt="{{ $level->title }}">
                                    @else
                                        <i class="bi bi-code-slash fs-1 text-white"></i>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="card-body text-center px-3">
                                <h5 class="fw-bold mb-2" style="color: #2C3E50;">{{ $level->title }}</h5>
                                <p class="text-secondary small mb-2">{{ $level->subtitle }}</p>
                                <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color: #E3F2FD; color: #1976D2; font-size: 0.9rem;">
                                    {{ $level->age_range }}
                                </span>
                                <p class="text-muted small mb-0" style="font-size: 0.85rem;">
                                    {{ \Illuminate\Support\Str::limit($level->description, 60) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        
        <div class="text-center mt-5">
            <a href="{{ url('/levels') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow shake" 
               style="background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%); border: none; color: white;">
                Lihat Semua Level
            </a>
        </div>
    </div>

    {{-- Stats Section --}}
    <div class="container-fluid py-5" style="background: linear-gradient(135deg, #E3F2FD 0%, #BBDEFB 100%);">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Kenapa Pilih COTHA?</h2>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-lg h-100 text-center tilt-card" style="border-radius: 20px; background: white;">
                        <div class="card-body py-5">
                            <div class="mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background-color: #FF6B9D;">
                                <i class="bi bi-controller fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2" style="color: #2C3E50;">9 dari 10</h3>
                            <p class="text-secondary">
                                Siswa Cotha Mampu Membuat Game Sendiri Setelah 1-2x Pertemuan
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-lg h-100 text-center tilt-card" style="border-radius: 20px; background: white;">
                        <div class="card-body py-5">
                            <div class="mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background-color: #FFB74D;">
                                <i class="bi bi-globe2 fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2" style="color: #2C3E50;">80%</h3>
                            <p class="text-secondary">
                                Kurikulum Diadopsi Dari Jerman Dan India
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow-lg h-100 text-center tilt-card" style="border-radius: 20px; background: white;">
                        <div class="card-body py-5">
                            <div class="mb-3 rounded-circle d-inline-flex align-items-center justify-content-center" 
                                 style="width: 80px; height: 80px; background-color: #9C27B0;">
                                <i class="bi bi-lightbulb fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2" style="color: #2C3E50;">100%</h3>
                            <p class="text-secondary">
                                Meningkatkan Computational Thinking & Kreativitas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Methods Section --}}
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Metode Pembelajaran COTHA</h2>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach($methods as $index => $method)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow-lg h-100 tilt-card" 
                         style="border-radius: 20px; cursor: pointer; background: white;"
                         data-bs-toggle="modal" data-bs-target="#methodModal{{ $method->id }}">
                        <div class="p-4 text-center">
                            @if($method->image)
                                <img src="{{ asset('storage/images/LearningMethods/' . $method->image) }}"
                                     class="img-fluid mb-3 rounded"
                                     style="max-height: 200px; object-fit: contain;"
                                     alt="{{ $method->label }}">
                            @endif
                            <h5 class="fw-bold" style="color: #2C3E50;">{{ $method->label }}</h5>
                        </div>
                    </div>
                </div>
                
                {{-- Modal --}}
                <div class="modal fade" id="methodModal{{ $method->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow" style="border-radius: 20px;">
                            <div class="modal-header" style="background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%); border-radius: 20px 20px 0 0;">
                                <h5 class="modal-title fw-bold text-white">{{ $method->label }}: {{ $method->title }}</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body p-4">
                                {{ $method->description }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</section>
@endsection