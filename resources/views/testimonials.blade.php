@extends('layouts.app')

@section('title', 'Testimonials - COTHA')

@section('main_content')
<section class="overflow-hidden" style="background-color: #3082e5;">
    <!-- Hero with home banner -->
    <div class="container-fluid py-5 position-relative" 
         style="background: url('{{ asset('images/WelcomePage/MainBanner.jpg') }}') center center / cover no-repeat; min-height: 320px;">
        <div class="position-absolute top-0 start-0 w-100 h-100 bg-primary bg-opacity-10"></div>
        <div class="container position-relative" style="z-index: 1;">
            <!-- Left-aligned hero text (like reference) -->
            <div class="row align-items-center">
                <div class="col-12 col-lg-6 text-white py-4 py-md-5">
                    <h2 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        Student Testimonials
                    </h2>
                    <p class="fs-4 mb-0" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.3);">
                        Cerita nyata dari siswa COTHA tentang pengalaman belajar coding yang seru.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Top banner like About page -->
    <div class="bg-white">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8 text-center">
                    <h1 class="fw-bold mb-3" style="color: #4fc3f7;">Testimonials</h1>
                    <p class="fs-5 text-dark mb-0">
                        Cerita dari siswa dan orang tua tentang pengalaman belajar di COTHA.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Cards -->
    <div class="container py-5">
        <div class="row g-4 justify-content-center">
            @forelse ($testimonials as $t)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow rounded-4">
                        <div class="card-body p-4 text-center">
                            <!-- Avatar -->
                            <div class="d-flex justify-content-center mb-3">
                                <div class="rounded-circle d-flex align-items-center justify-content-center bg-info bg-opacity-25" style="width: 96px; height: 96px;">
                                    @if($t->photo)
                                        <img src="{{ asset('storage/images/StudentPictures/' . $t->photo) }}"
                                             class="rounded-circle img-fluid"
                                             style="width: 84px; height: 84px; object-fit: cover;"
                                             alt="{{ $t->name }}">
                                    @else
                                        <span class="fw-bold text-dark fs-2">
                                            {{ substr($t->name, 0, 1) }}
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <!-- Quote -->
                            <figure class="mb-3">
                                <blockquote class="blockquote">
                                    <p class="fst-italic text-muted mb-0">{{ '“'.$t->text.'”' }}</p>
                                </blockquote>
                            </figure>

                            <!-- Name + tag -->
                            <h5 class="fw-bold mb-1 text-dark">{{ $t->name }}</h5>
                            <span class="badge rounded-pill text-bg-info bg-opacity-25 text-primary px-3 py-2">COTHA Student</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info text-center mb-0 rounded-3">
                        <i class="bi bi-info-circle me-2"></i>No testimonials available at the moment.
                    </div>
                </div>
            @endforelse
        </div>

        @if ($testimonials->hasPages())
            <div class="text-center mt-4">
                <div class="text-muted small mb-2">
                    Showing {{ $testimonials->firstItem() }}–{{ $testimonials->lastItem() }} of {{ $testimonials->total() }}
                </div>
                {{ $testimonials->links('pagination::bootstrap-5') }}
            </div>
        @endif
    </div>
</section>
@endsection