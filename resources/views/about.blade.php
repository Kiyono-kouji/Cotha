@extends('layouts.app')

@section('title', 'About COTHA')

@section('main_content')
{{-- Hero Banner (same as welcome) --}}
<div class="container-fluid py-5 position-relative" 
     style="background: url('{{ asset('images/WelcomePage/MainBanner.jpg') }}') center center / cover no-repeat; min-height: 420px;">
    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0,0,0,0.08) 0%, rgba(0,0,0,0.02) 50%, rgba(0,0,0,0) 100%);"></div>
    <div class="container position-relative" style="z-index: 1;">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-white py-4 py-md-5">
                <p class="text-uppercase fw-semibold mb-2" style="letter-spacing: 2px; opacity: 0.9;">About Us</p>
                <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2;">About COTHA</h1>
                <p class="fs-5 mb-0">1st Choice Coding & Technology Learning Center for Kids</p>
            </div>
        </div>
    </div>
    <div class="position-absolute start-0 w-100" style="bottom: -1px; z-index: 0; pointer-events: none;">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
            <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
        </svg>
    </div>
</div>

{{-- Intro: text left, image right --}}
<div class="container py-5 px-4 px-md-5">
    <div class="row align-items-center g-5">
        <!-- Left: Text -->
        <div class="col-12 col-lg-6">
            <p class="text-uppercase text-secondary fw-semibold mb-2" style="letter-spacing: 2px;">About Us</p>
            <h1 class="fw-bold mb-3" style="color: #2C3E50; line-height: 1.2; font-size: 3rem;">
                Helping kids <span style="color:#4fc3f7;">succeed</span> through the power of coding.
            </h1>
            <p class="text-secondary fs-5 mb-4" style="max-width: 560px;">
                COTHA (COmputational THinking Academy) adalah pusat pendidikan teknologi untuk anak-anak,
                berbasis kurikulum Jerman dan India, diajarkan dengan metode Project Based Learning
                yang menyenangkan dan relevan di era digital.
            </p>
            <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+kelas+dan+sistem+belajar&app_absent=0"
               class="btn btn-lg px-5 py-3 fw-semibold rounded-4"
               style="background-color: #4fc3f7; border: none; color: white;">
               Sign Up for Free
            </a>
        </div>

        <!-- Right: Image with decorative shapes (card + soft pill) -->
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

{{-- Why & What: text left, stacked images right (match intro positions, keep all content) --}}
<div class="container my-5 px-4 px-md-5">
    <div class="row align-items-center g-5">
        <!-- Left: Combined text content -->
        <div class="col-12 col-lg-6">
            <p class="text-uppercase text-secondary fw-semibold mb-2" style="letter-spacing: 2px;">About Coding</p>

            <!-- Mengapa Coding Efektif? -->
            <h3 class="fw-bold mb-3" style="color: #4fc3f7; font-size: 3rem; line-height: 1.1;">
                Mengapa Coding Efektif?
            </h3>
            <ol class="fs-5 text-dark mb-4" style="line-height: 1.7; max-width: 560px;">
                <li><b>Logical Thinking:</b> melatih struktur berpikir sejak dini.</li>
                <li><b>Problem Solving:</b> menyelesaikan masalah lewat program.</li>
                <li><b>Critical Thinking:</b> menentukan langkah paling efektif.</li>
                <li><b>Computational Thinking:</b> analisa, pola, rumusan, algoritma.</li>
            </ol>

            <!-- Apa yang Dipelajari? -->
            <h3 class="fw-bold mb-3" style="color: #4fc3f7; font-size: 3rem; line-height: 1.1;">
                Apa yang Dipelajari?
            </h3>
            <p class="fs-5 text-dark mb-0" style="max-width: 560px;">
                Konsep dari basic hingga advanced, diterapkan pada proyek seperti game, animasi,
                aplikasi, dan berbagai karya digital.
            </p>
        </div>

        <!-- Right: Stacked images in card with soft pill -->
        <div class="col-12 col-lg-6 position-relative d-flex justify-content-center">
            <div class="position-absolute" 
                 style="right: -30px; top: -20px; width: 220px; height: 220px; border-radius: 50px; background: rgba(128,199,228,0.2); z-index: 0;">
            </div>
            <div class="bg-white rounded-4 shadow p-3" style="z-index: 1; max-width: 520px; width: 100%;">
                <img src="{{ asset('images/AboutResources/ThingsYouLearn.png') }}"
                     alt="Things You Learn in Coding Class"
                     class="img-fluid rounded-4 d-block mx-auto mb-3"
                     style="width: 100%; height: auto; object-fit: contain;">
                <img src="{{ asset('images/AboutResources/CothaCurriculum.png') }}"
                     alt="COTHA Curriculum"
                     class="img-fluid rounded-4 d-block mx-auto"
                     style="width: 100%; height: auto; object-fit: contain;">
            </div>
        </div>
    </div>
</div>

{{-- Sistem Belajar: match first paragraph layout (text left, image right) --}}
<div class="container my-5 px-4 px-md-5">
    <div class="row align-items-center g-5">
        <!-- Left: Text -->
        <div class="col-12 col-lg-6">
            <p class="text-uppercase text-secondary fw-semibold mb-2" style="letter-spacing: 2px;">Sistem Belajar</p>
            <h2 class="fw-bold mb-3" style="color: #4fc3f7; line-height: 1.2; font-size: 2.5rem;">
                Bagaimana sistem belajar di COTHA?
            </h2>
            <ul class="fs-5 text-dark mb-4" style="max-width: 700px; line-height: 1.7;">
                <li>Durasi per level: 6 bulan</li>
                <li>Jadwal: 1x seminggu</li>
                <li>Waktu: 75 menit</li>
                <li>Tempat: online Zoom</li>
                <li>Group: 5–10 orang</li>
                <li>
                    Biaya: mulai dari Rp 245.000/bulan.
                    <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang+sistem+belajar&app_absent=0"
                       target="_blank"
                       class="fw-semibold text-primary text-decoration-underline">
                       Hubungi kami untuk info lebih lanjut
                    </a>
                </li>
            </ul>
            <div>
                <a href="{{ url('/levels') }}" class="btn btn-primary btn-lg px-5 py-3 fw-semibold rounded-pill shadow shake" style="background-color: #4fc3f7; border: none;">
                    Explore Our Level
                    <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        </div>

        <!-- Right: Image card with soft pill -->
        <div class="col-12 col-lg-6 position-relative d-flex justify-content-center">
            <div class="position-absolute" 
                 style="right: -30px; top: -20px; width: 220px; height: 220px; border-radius: 50px; background: rgba(128,199,228,0.2); z-index: 0;">
            </div>
            <div class="bg-white rounded-4 shadow p-3" style="z-index: 1; max-width: 520px; width: 100%;">
                <img src="{{ asset('images/AboutResources/SistemBelajar.png') }}"
                     alt="Sistem Belajar di COTHA"
                     class="img-fluid rounded-4"
                     style="width: 100%; height: auto; object-fit: contain;">
            </div>
        </div>
    </div>
</div>
@endsection