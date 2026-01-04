@extends('layouts.app')

@section('title', 'Add New Article')

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

    {{-- Hero Section --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 320px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 520px;">
                        Add New Article
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Fill in the details below to create a new article for COTHA.
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

    {{-- Form Card Overlay --}}
    <div class="container position-relative" style="z-index: 2; margin-top: -100px; margin-bottom: 80px;">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8">
                <div class="card rounded-4 border-0 shadow-lg p-4" style="background: #fff; border-radius: 32px;">
                    <form method="POST" action="{{ route('admin.articles.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Headline --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Headline <span class="text-danger">*</span></label>
                            <input type="text" name="headline" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required>
                        </div>

                        {{-- Image 1 --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Image 1</label>
                            <input type="file" name="image1" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;">
                        </div>

                        {{-- Image 2 --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Image 2</label>
                            <input type="file" name="image2" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;">
                        </div>

                        {{-- Body --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Body <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" rows="6" required></textarea>
                        </div>

                        {{-- Active --}}
                        <div class="mb-3 form-check">
                            <input type="checkbox" name="active" class="form-check-input" id="activeCheck" checked>
                            <label class="form-check-label fw-semibold" for="activeCheck" style="color:#2C3E50;">Active</label>
                        </div>

                        {{-- Action Buttons --}}
                        <div class="text-center mt-4 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                            <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold rounded-3 shadow"
                                    style="background: #4fc3f7; border: none; color: white;">
                                <i class="bi bi-save me-2"></i>Save Article
                            </button>
                            <a href="{{ route('admin.articles.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-3 shadow"
                               style="background: #FF85A2; border: none; color: white;">
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection