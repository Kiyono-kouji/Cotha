@extends('layouts.app')

@section('title', 'About COTHA')

@section('main_content')
<div class="about-page-font">
{{-- Hero Section with Absolute Banner Image --}}
<div class="container-fluid py-5 position-relative" style="min-height: 550px;">
    {{-- Background banner image --}}
    <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
        <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
             alt="Hero Banner"
             style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
        {{-- Decorative shapes (subtle) --}}
        <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
        <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
        <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
    </div>

    {{-- Hero content aligned like the pic --}}
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-center text-lg-start ps-lg-5" style="margin-top: 8rem !important;">
                <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                    About COTHA
                </h1>
                <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                    1st Choice Coding & Technology Learning Center for Kids
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

{{-- Intro: text left, image right --}}
<div class="container py-5 px-3 px-md-1">
    <div class="row align-items-center g-5">
        <!-- Left: Text -->
        <div class="col-12 col-lg-6">
            <p class="text-uppercase text-secondary fw-semibold mb-2">About Us</p>
            <h1 class="fw-bold mb-3">
                Helping kids <span style="color:#4fc3f7;">succeed</span> through the power of coding.
            </h1>
            <p class="text-dark fs-5 mb-4" style="color: #2C3E50;">
                COTHA (COmputational THinking Academy) adalah pusat pendidikan teknologi untuk anak-anak,
                berbasis kurikulum Jerman dan India, diajarkan dengan metode Project Based Learning
                yang menyenangkan dan relevan di era digital.
            </p>
            <a href="{{ route('registertrial') }}"
               class="btn btn-lg px-5 py-3 fw-semibold rounded-4"
               style="background-color: #4fc3f7; border: none; color: white;">
               Register Trial Class
            </a>
        </div>
        <!-- Right: Image with decorative shapes -->
        <div class="col-12 col-lg-6 position-relative d-flex justify-content-center">
            <div class="position-absolute" 
                 style="right: -30px; top: -20px; width: 220px; height: 220px; border-radius: 50px; background: rgba(128,199,228,0.2); z-index: 0;">
            </div>
            <div class="bg-white rounded-4 shadow" style="padding: 16px; z-index: 1; max-width: 520px;">
                <img src="{{ asset('images/AboutResources/EnhanceCT.jpg') }}"
                     alt="Enhance Computational Thinking"
                     class="img-fluid rounded-4"
                     style="width: 100%; object-fit: cover;">
            </div>
        </div>
    </div>
</div>

{{-- Why & What: images left, text right --}}
<div class="container py-5 px-3 px-md-1">
    <div class="row align-items-center g-5">
        <!-- Left: Stacked images -->
        <div class="col-12 col-lg-6 position-relative d-flex justify-content-center order-2 order-lg-1">
            <div class="position-absolute" 
                 style="left: -30px; top: -20px; width: 220px; height: 220px; border-radius: 50px; background: rgba(128,199,228,0.2); z-index: 0;"></div>
            <div class="bg-white rounded-4 shadow p-3" style="z-index: 1; max-width: 520px; width: 100%;">
                <img src="{{ asset('images/AboutResources/ThingsYouLearn.png') }}" class="img-fluid rounded-4 d-block mx-auto mb-3" style="width: 100%; height: auto; object-fit: contain;" alt="Things You Learn in Coding Class">
                <img src="{{ asset('images/AboutResources/CothaCurriculum.png') }}" class="img-fluid rounded-4 d-block mx-auto" style="width: 100%; height: auto; object-fit: contain;" alt="COTHA Curriculum">
            </div>
        </div>

        <!-- Right: Combined text content -->
        <div class="col-12 col-lg-6 order-1 order-lg-2">
            <p class="text-uppercase text-secondary fw-semibold mb-2">About Coding</p>
            <h2 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; color: #2C3E50;">
                Mengapa <span style="color:#4fc3f7;">Coding</span> Efektif?
            </h2>
            <ol class="fs-5 text-dark mb-4">
                <li><b>Logical Thinking:</b> melatih struktur berpikir sejak dini.</li>
                <li><b>Problem Solving:</b> menyelesaikan masalah lewat program.</li>
                <li><b>Critical Thinking:</b> menentukan langkah paling efektif.</li>
                <li><b>Computational Thinking:</b> analisa, pola, rumusan, algoritma.</li>
            </ol>
            <h2 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; color: #2C3E50;">
                Apa yang <span style="color:#4fc3f7;">Dipelajari</span>?
            </h2>
            <p class="fs-5 text-dark mb-0">
                Konsep dari basic hingga advanced, diterapkan pada proyek seperti game, animasi,
                aplikasi, dan berbagai karya digital.
            </p>
        </div>
    </div>
</div>

{{-- Sistem Belajar: text left, image right --}}
<div class="container py-5 px-3 px-md-1">
    <div class="row align-items-center g-5">
        <div class="col-12 col-lg-6">
            <p class="text-uppercase text-secondary fw-semibold mb-2">Sistem Belajar</p>
            <h2 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; color: #2C3E50;">
                Bagaimana sistem belajar di <span style="color:#4fc3f7;">COTHA</span>?
            </h2>
            <ul class="fs-5 text-dark mb-4">
                <li>Durasi per level: 6 bulan</li>
                <li>Jadwal: 1x seminggu</li>
                <li>Waktu: 75 menit</li>
                <li>Tempat: online Zoom</li>
                <li>Group: 5–10 orang</li>
                <li>
                    Biaya: mulai dari Rp 245.000/bulan.
                    <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+sistem+belajar&app_absent=0" target="_blank" class="fw-semibold text-primary text-decoration-underline">Hubungi kami untuk info lebih lanjut</a>
                </li>
            </ul>
            <div>
                <a href="{{ url('/levels') }}" class="btn btn-primary btn-lg px-5 py-3 fw-semibold rounded-4 shadow" style="background-color: #4fc3f7; border: none;">
                    Explore Our Level <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
        <div class="col-12 col-lg-6 position-relative d-flex justify-content-center">
            <div class="position-absolute" style="right: -30px; top: -20px; width: 220px; height: 220px; border-radius: 50px; background: rgba(128,199,228,0.2); z-index: 0;"></div>
            <div class="bg-white rounded-4 shadow p-3" style="z-index: 1; max-width: 520px; width: 100%;">
                <img src="{{ asset('images/AboutResources/SistemBelajar.png') }}" alt="Sistem Belajar di COTHA" class="img-fluid rounded-4" style="width: 100%; height: auto; object-fit: contain;">
            </div>
        </div>
    </div>
</div>
</div> {{-- /about-page-font --}}
@endsection