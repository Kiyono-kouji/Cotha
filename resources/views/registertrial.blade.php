@extends('layouts.app')

@section('title', 'Register Trial Class - COTHA')

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

    {{-- Hero Section with Absolute Banner Image --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            {{-- Extra Decorative Shapes --}}
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 2;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-center text-lg-start ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                        Register Trial Class
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                        Join a free trial and experience learning at COTHA!
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

    <div class="container my-5 position-relative" style="z-index: 2;">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98); position: relative;">
                    <form method="POST" action="{{ route('public.register-class') }}">
                        @csrf
                        <h2 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">Register Trial Class</h2>
                        <div class="row g-3">
                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Choose Class <span class="text-danger">*</span>
                                </label>
                                <select name="class_id" class="form-select rounded-3 border-2" style="border-color: #4fc3f7;" required>
                                    <option value="" disabled selected>Select a class</option>
                                    <option value="0">I don't know / Let COTHA recommend</option>
                                    @foreach($classes as $class)
                                        <option value="{{ $class->id }}">
                                            {{ $class->title }} ({{ $class->level }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Child's Name <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="child_name" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Date of Birth <span class="text-danger">*</span>
                                </label>
                                <input type="date"
                                       name="dob"
                                       class="form-control rounded-3 border-2"
                                       style="border-color: #4fc3f7;"
                                       required
                                       max="{{ date('Y-m-d') }}"
                                       title="Date of birth cannot be in the future">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    School <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="school" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    City <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="city" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    WhatsApp Number <span class="text-danger">*</span>
                                </label>
                                <input type="tel"
                                       name="wa"
                                       class="form-control rounded-3 border-2"
                                       style="border-color: #4fc3f7;"
                                       placeholder="+6281234332110"
                                       required
                                       pattern="^\+?\d{9,15}$"
                                       inputmode="tel"
                                       title="Enter a valid phone number, e.g. +6281234332110">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Language <span class="text-danger">*</span>
                                </label>
                                <select name="language" class="form-select rounded-3 border-2" style="border-color: #4fc3f7;" required>
                                    <option value="" disabled selected>Select language</option>
                                    <option value="Bahasa">Bahasa</option>
                                    <option value="English">English</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Coding Experience <span class="text-danger">*</span>
                                </label>
                                <select name="coding_experience" class="form-select rounded-3 border-2" style="border-color: #4fc3f7;" required>
                                    <option value="" disabled selected>Select experience</option>
                                    <option value="Never">Never</option>
                                    <option value="A Little">A Little</option>
                                    <option value="Quite a Lot">Quite a Lot</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-semibold" style="color:#2C3E50;">
                                    Notes / Questions
                                </label>
                                <textarea name="note" class="form-control rounded-3 border-2" rows="3" placeholder="Any questions or additional notes?" style="border-color: #4fc3f7;"></textarea>
                            </div>
                            <div class="text-center mt-4">
                                <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold rounded-3 shadow"
                                        style="background-color: #4fc3f7; border: none; color: white;">
                                    Submit Registration
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- Extra Decorative Shape on Card --}}
                    <div style="position: absolute; top: -30px; right: -30px; width: 60px; height: 60px; border-radius: 50%; background: #FF85A2; opacity: 0.12; z-index: 0;"></div>
                    <div style="position: absolute; bottom: -30px; left: -30px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 0;"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection