@extends('layouts.app')

@section('title', 'COTHA - 1st CHOICE Coding & Technology Learning Center for KIDS')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Wave on Left Side --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <!-- Animated circles -->
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
            <circle cx="15" cy="0" r="6" fill="#80c7e4" opacity="0.25">
                <animate attributeName="cy" from="0" to="1000" dur="15s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.25;0.4;0.25" dur="4s" repeatCount="indefinite"/>
            </circle>
            <circle cx="40" cy="0" r="10" fill="#4fc3f7" opacity="0.2">
                <animate attributeName="cy" from="0" to="1000" dur="18s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.2;0.35;0.2" dur="5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Decorative Animated Wave on Right Side --}}
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <!-- Animated circles -->
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
            <circle cx="85" cy="0" r="6" fill="#FFB74D" opacity="0.25">
                <animate attributeName="cy" from="0" to="1000" dur="16s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.25;0.4;0.25" dur="4.5s" repeatCount="indefinite"/>
            </circle>
            <circle cx="60" cy="0" r="10" fill="#FF85A2" opacity="0.2">
                <animate attributeName="cy" from="0" to="1000" dur="19s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.2;0.35;0.2" dur="5.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Hero Section with Absolute Banner Image --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center">
                {{-- Left Content --}}
                <div class="col-12 col-lg-6 text-white mb-4 mb-lg-0 fade-in pt-5 mt-5 ms-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-4" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.15);">
                        A Fun Way to Learn Coding!
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12);">
                        Let's Learn Together!
                    </p>
                    <div class="d-flex gap-3 flex-wrap flex-md-row flex-column" style="z-index:2; position:relative; margin-bottom: 6rem;">
                        @auth
                            @if(auth()->user()->isAdmin)
                                <a href="{{ url('/admin/dashboard') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow mb-2 mb-md-0" style="background-color: #FF6B9D; border: none; color: white;">
                                    Admin Dashboard
                                </a>
                            @endif
                        @endauth
                        <a href="{{ route('registertrial') }}"
                           class="btn btn-lg px-5 py-3 fw-semibold shadow mb-2 mb-md-0 rounded-4"
                           style="background-color: #FF85A2; border: none; color: white">
                            Register Trial Class
                        </a>
                        <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+kelas+dan+sistem+belajar&app_absent=0"
                           class="btn btn-lg px-5 py-3 fw-semibold shadow rounded-4"
                           style="background-color: #4fc3f7; border: none; color: white">
                            Contact Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative Waves at Bottom -->
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Floating Level Cards Section --}}
    <div class="container" style="margin-top: -100px; z-index: 2; position: relative;">
        <div class="bg-white rounded-4 shadow p-4 p-md-5" style="max-width: 1200px; margin: 0 auto;">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Level yang Tersedia</h2>
                <p class="text-secondary fs-5">Pilih level yang sesuai dengan usia dan minat anak!</p>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($levels as $index => $level)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{ url('/levels/' . $level->slug) }}" class="text-decoration-none">
                            <div class="card border-0 shadow h-100 tilt-card fade-in-up delay-{{ ($index % 4) + 1 }}" 
                                 style="background: white; border-radius: 20px; transition: transform 0.3s;">
                                {{-- Colorful Icon Circle --}}
                                <div class="d-flex justify-content-center pt-4">
                                    @if($level->image)
                                        <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                                                style="width: 100%; height: 100%; object-fit: contain; background: #fff; display: block; border-radius: 32px"
                                                class="p-4"
                                                alt="{{ $level->title }}">
                                    @else
                                        <i class="bi bi-code-slash fs-1 text-secondary"></i>
                                    @endif
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
                <a href="{{ url('/levels') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake" 
                   style="background: #FF85A2; border: none; color: white;">
                    Lihat Semua Level
                </a>
            </div>
        </div>
    </div>

    {{-- Playful SVG shapes above stats --}}
    <div style="position: relative;">
        <div style="position: absolute; top: -40px; left: 0; width: 100%; height: 80px; pointer-events: none; z-index: 0;">
            <svg width="100%" height="80" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="80" cy="40" r="32" fill="#FF85A2" opacity="0.15"/>
                <circle cx="1360" cy="60" r="24" fill="#4fc3f7" opacity="0.15"/>
                <rect x="700" y="10" width="48" height="48" rx="16" fill="#FFB74D" opacity="0.12"/>
            </svg>
        </div>

        <div class="container py-5 position-relative mt-5" style="z-index: 1;">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Kenapa Pilih COTHA?</h2>
            </div>
            <div class="row g-4 justify-content-center align-items-stretch mt-5">
                <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center mb-5 mb-md-0">
                    <div class="mb-2 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; border-radius: 50%; background: #FF85A2;">
                        <i class="bi bi-controller fs-2 text-white"></i>
                    </div>
                    <div class="fw-bold" style="font-size: 2.5rem; color: #FF85A2;">9/10</div>
                    <div class="mt-2 text-secondary" style="font-size: 1rem; max-width: 220px;">Siswa Cotha Mampu Membuat Game Sendiri Setelah 1-2x Pertemuan</div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center mb-5 mb-md-0">
                    <div class="mb-2 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; border-radius: 50%; background: #FF85A2;">
                        <i class="bi bi-globe2 fs-2 text-white"></i>
                    </div>
                    <div class="fw-bold" style="font-size: 2.5rem; color: #FF85A2;">80%</div>
                    <div class="mt-2 text-secondary" style="font-size: 1rem; max-width: 220px;">Kurikulum Diadopsi Dari Jerman Dan India</div>
                </div>
                <div class="col-12 col-md-4 d-flex flex-column align-items-center text-center mb-5 mb-md-0">
                    <div class="mb-2 d-flex align-items-center justify-content-center" style="width: 64px; height: 64px; border-radius: 50%; background: #FF85A2;">
                        <i class="bi bi-lightbulb fs-2 text-white"></i>
                    </div>
                    <div class="fw-bold" style="font-size: 2.5rem; color: #FF85A2;">100%</div>
                    <div class="mt-2 text-secondary" style="font-size: 1rem; max-width: 220px;">Meningkatkan Computational Thinking & Kreativitas</div>
                </div>
            </div>
        </div>

        {{-- Playful SVG shapes below stats --}}
        <div style="position: absolute; bottom: -40px; left: 0; width: 100%; height: 80px; pointer-events: none; z-index: 0;">
            <svg width="100%" height="80" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="120" cy="40" r="24" fill="#9C27B0" opacity="0.12"/>
                <rect x="1280" y="20" width="48" height="48" rx="16" fill="#FF85A2" opacity="0.12"/>
            </svg>
        </div>
    </div>

    {{-- Methods Section --}}
    <div class="container py-5 mt-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Metode Pembelajaran COTHA</h2>
        </div>
        <div class="row g-4 justify-content-center mt-5">
            @foreach($methods as $index => $method)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow h-100 tilt-card" 
                         style="border-radius: 20px; cursor: pointer; background: white;"
                         data-bs-toggle="modal" data-bs-target="#methodModal{{ $method->id }}">
                        <div class="p-4 text-center">
                            @if($method->image)
                                <img src="{{ asset('storage/images/LearningMethods/' . $method->image) }}"
                                     class="img-fluid mb-3 rounded"
                                     style="max-height: 200px; object-fit: contain;">
                            @endif
                            <h5 class="fw-bold" style="color: #2C3E50;">{{ $method->title }}</h5>
                        </div>
                    </div>
                </div>
                
                {{-- Modal --}}
                <div class="modal fade" id="methodModal{{ $method->id }}" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0 shadow" style="border-radius: 20px;">
                            <div class="modal-header" style="background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%); border-radius: 20px 20px 0 0;">
                                <h5 class="modal-title fw-bold text-white">{{ $method->title }}</h5>
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

    {{-- Testimonials Section --}}
    <div style="position: relative; overflow: hidden;">
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 20px; left: 50px; width: 60px; height: 60px; border-radius: 50%; background: #FFB74D; opacity: 0.1; z-index: 0;"></div>
        <div style="position: absolute; bottom: 40px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #4fc3f7; opacity: 0.1; z-index: 0; transform: rotate(45deg);"></div>
        
        <div class="container py-5 mt-5 position-relative" style="z-index: 1;">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Apa Kata Murid COTHA?</h2>
                <p class="text-secondary fs-5">Dengarkan pengalaman siswa kami dalam belajar coding!</p>
            </div>

            <div class="row g-4 justify-content-center">
                @forelse($testimonials->take(6) as $index => $testimonial)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow h-100" style="border-radius: 20px; background: white;">
                            {{-- Quote icon --}}
                            <div class="position-absolute top-0 start-0 m-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle" 
                                     style="width: 40px; height: 40px; background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%);">
                                    <i class="bi bi-quote text-white fs-5"></i>
                                </div>
                            </div>

                            <div class="card-body d-flex flex-column text-center pt-5 px-4 pb-4">
                                {{-- Student Photo --}}
                                @if($testimonial->photo)
                                    <img src="{{ asset('storage/images/StudentPictures/' . $testimonial->photo) }}" 
                                         class="rounded-circle mx-auto mb-3 shadow" 
                                         width="90" height="90" 
                                         alt="{{ $testimonial->name }}"
                                         style="object-fit: cover; border: 4px solid #E3F2FD;">
                                @else
                                    <div class="rounded-circle mx-auto mb-3 shadow d-flex align-items-center justify-content-center" 
                                         style="width: 90px; height: 90px; background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: 4px solid #E3F2FD;">
                                        <span class="text-white fs-2 fw-bold">{{ substr($testimonial->name, 0, 1) }}</span>
                                    </div>
                                @endif
                                
                                {{-- Testimonial Text --}}
                                <p class="flex-grow-1 mb-3 fst-italic text-secondary" style="font-size: 0.95rem; line-height: 1.6;">
                                    "{{ $testimonial->text }}"
                                </p>
                                
                                {{-- Student Name --}}
                                <h6 class="fw-bold mb-0" style="color: #2C3E50;">{{ $testimonial->name }}</h6>
                                <small class="text-muted mb-4">{{ $testimonial->school ?? '-' }}{{ $testimonial->city ? ' • ' . $testimonial->city : '' }}</small>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="col-12">
                    <div class="alert alert-info rounded-4 text-center py-5 mb-0" style="border: none; background: transparent;">
                        <i class="bi bi-chat-left-quote fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted mb-0">No student testimonials available at the moment.</p>
                    </div>
                </div>
                @endforelse
            </div>

            {{-- View All Button --}}
            <div class="text-center mt-5">
                <a href="{{ url('/testimonials') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake" 
                   style="background: #4fc3f7; border: none; color: white;">
                    Lihat Semua Testimoni
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    {{-- Best Student Projects Section --}}
    <div style="position: relative; overflow: hidden;">
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 40px; right: 100px; width: 70px; height: 70px; border-radius: 50%; background: #FF85A2; opacity: 0.1; z-index: 0;"></div>
        <div style="position: absolute; bottom: 60px; left: 120px; width: 60px; height: 60px; border-radius: 30%; background: #FFB74D; opacity: 0.1; z-index: 0; transform: rotate(45deg);"></div>
        
        <div class="container py-5 mt-5 position-relative" style="z-index: 1;">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Best Student Projects</h2>
                <p class="text-secondary fs-5">Lihat karya-karya terbaik dari siswa COTHA!</p>
            </div>

            <div class="row g-4 justify-content-center">
                @foreach($projects->take(6) as $index => $project)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card border-0 shadow h-100" style="border-radius: 20px; background: white; overflow: hidden;">
                            {{-- Project Thumbnail --}}
                            <div class="position-relative" style="height: 200px; overflow: hidden;">
                                <img src="{{ $project->thumbnail ?? asset('images/default_project.png') }}"
                                     class="w-100 h-100"
                                     style="object-fit: cover;"
                                     alt="{{ $project->title }}">
                                {{-- Featured Badge --}}
                                @if($project->is_featured)
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge" style="background: linear-gradient(135deg, #FFB74D 0%, #FF9800 100%); font-size: 0.75rem;">
                                            <i class="bi bi-star-fill me-1"></i>Featured
                                        </span>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body d-flex flex-column p-4">
                                {{-- Project Title --}}
                                <h5 class="fw-bold mb-2" style="color: #2C3E50;">{{ $project->title }}</h5>
                                
                                {{-- Creator Info --}}
                                <div class="d-flex align-items-center mb-2">
                                    {{-- Profile Picture --}}
                                    @if(!empty($project->profile_picture))
                                        <img src="{{ $project->profile_picture }}"
                                             alt="{{ $project->creator }}"
                                             class="rounded-circle me-2"
                                             style="width: 56px; height: 56px; object-fit: cover; border: 3px solid #e3f2fd;">
                                    @else
                                        <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                             style="width: 56px; height: 56px; background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%);">
                                            <i class="bi bi-person-fill text-white fs-3"></i>
                                        </div>
                                    @endif
                                    <div>
                                        <small class="text-secondary d-block" style="font-size: 0.95rem;">
                                            <strong>{{ $project->creator }}</strong>
                                        </small>
                                        {{-- School --}}
                                        <small class="text-muted d-block" style="font-size: 0.85rem;">
                                            {{ $project->school ?? 'School not listed' }}
                                        </small>
                                    </div>
                                </div>

                                {{-- Project Date --}}
                                <small class="text-muted mb-3">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $project->project_date ? \Carbon\Carbon::parse($project->project_date)->format('F Y') : '-' }}
                                </small>

                                {{-- Play Button --}}
                                <a href="{{ $project->url }}" 
                                   target="_blank" 
                                   class="btn mt-auto rounded-pill" 
                                   style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                                    <i class="bi bi-play-circle me-2"></i>Play Project
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- View All Button --}}
            <div class="text-center mt-5">
                <a href="{{ url('/projects') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake" 
                   style="background: linear-gradient(135deg, #FF6B9D 0%, #FF85A2 100%); border: none; color: white;">
                    Lihat Semua Projects
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
    
    {{-- Partners Section --}}
    <div style="position: relative; overflow: hidden;">
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 30px; left: 80px; width: 50px; height: 50px; border-radius: 50%; background: #4fc3f7; opacity: 0.1; z-index: 0;"></div>
        <div style="position: absolute; bottom: 50px; right: 100px; width: 70px; height: 70px; border-radius: 30%; background: #FF85A2; opacity: 0.1; z-index: 0; transform: rotate(45deg);"></div>
        
        <div class="container py-5 mt-5 position-relative" style="z-index: 1;">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-3" style="color: #2C3E50; font-size: 2.5rem;">Our Trusted Partners</h2>
                <p class="text-secondary fs-5">Bekerja sama dengan institusi terpercaya untuk memberikan pendidikan terbaik</p>
            </div>

            @if($partners->count() > 0)
                <div class="row g-3 justify-content-center">
                    @foreach($partners as $partner)
                        <div class="col-6 col-sm-4 col-md-3 col-lg-2 col-xl-2">
                            <div class="rounded-3 d-flex flex-column align-items-center justify-content-center py-3 px-2 h-100"
                                 style="min-height: 120px; background: rgba(255,255,255,0.0);">
                                @if($partner->logo)
                                    <img src="{{ asset('storage/' . $partner->logo) }}"
                                         alt="{{ $partner->name }}"
                                         class="mb-2"
                                         style="max-height: 48px; max-width: 90px; object-fit: contain; border-radius:8px">
                                @else
                                    <div class="d-flex align-items-center justify-content-center rounded-circle mb-2"
                                         style="width: 48px; height: 48px; background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%);">
                                        <i class="bi bi-building fs-4 text-white"></i>
                                    </div>
                                @endif
                                <div class="fw-semibold text-center" style="color: #2C3E50; font-size: 0.9rem; word-break: break-word;">
                                    {{ $partner->name }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-people fs-1 text-muted mb-3 d-block"></i>
                    <p class="text-muted">No partners available at the moment.</p>
                </div>
            @endif
        </div>
    </div>

    {{-- Contact Us & Register Trial Class Section --}}
    <div class="container py-5 mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="rounded-4 shadow-lg p-5 text-center" style="border: none;">
                    <h2 class="fw-bold mb-4" style="color: #4fc3f7; font-size: 2.5rem;">
                        Want to learn more?
                    </h2>
                    <p class="text-secondary mb-4 fs-5">
                        Get in touch or try a free trial class to experience COTHA!
                    </p>
                    <div class="d-flex flex-column flex-md-row justify-content-center gap-3 mt-3">
                        <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+kelas+dan+sistem+belajar&app_absent=0"
                           class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow shake"
                           style="background-color: #4fc3f7; border: none; color: white;">
                            <i class="bi bi-whatsapp me-2"></i>
                            Contact Us
                        </a>
                        <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+daftar+trial,+nama+saya&app_absent=0"
                           class="btn btn-lg px-5 py-3 fw-semibold rounded-pill shadow shake"
                           style="background-color: #FF85A2; border: none; color: white;">
                            Register Trial Class
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</section>
@endsection