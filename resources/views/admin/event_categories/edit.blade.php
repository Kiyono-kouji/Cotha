@extends('layouts.app')

@section('title', 'Edit Event Category')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Waves --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3"/>
        </svg>
    </div>
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3"/>
        </svg>
    </div>
    {{-- Hero Section --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 420px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto;">
                        Edit Event Category
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Update the details for this event category.
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
    <div class="container py-5 position-relative" style="z-index: 2; max-width: 600px;">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98);">
            <form action="{{ route('admin.event_categories.update', $event_category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required value="{{ old('name', $event_category->name) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <input type="text" name="description" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" value="{{ old('description', $event_category->description) }}">
                </div>
                <div class="mb-3 form-check">
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" class="form-check-input" id="activeCheck" value="1" {{ old('active', $event_category->active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="activeCheck">Active</label>
                </div>
                <div class="text-center mt-4 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                    <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                            style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                        <i class="bi bi-check-circle me-2"></i>Update Category
                    </button>
                    <a href="{{ route('admin.event_categories.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                       style="background: #e3f2fd; color: #1976D2; border: none;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection