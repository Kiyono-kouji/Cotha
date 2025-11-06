@extends('layouts.app')

@section('title', 'Courses - COTHA')

@section('main_content')
<div class="container my-5 px-5 px-md-1">
    <h2 class="fw-bold text-center mb-4" style="color: #4fc3f7; letter-spacing: 1px;">Our Courses</h2>
    <p class="text-center text-secondary fs-5 mb-5">
        Find the perfect course for your child's age and interests. Click a course to see more details!
    </p>
    <div class="row g-4 justify-content-center">
        @foreach($courses as $course)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ url('/courses/' . $course->slug) }}" class="text-decoration-none">
                    <div class="card info-card h-100 shadow-sm border-0">
                        @if($course->image)
                            <img src="{{ asset('images/CourseResources/' . $course->image) }}"
                                 class="img-fluid mb-3 d-block mx-auto"
                                 style="width: 100%; max-width: 400px; height: auto; object-fit: contain;"
                                 alt="{{ $course->title }}">
                        @endif
                        <div class="card-body d-flex flex-column shadow-sm">
                            <div class="mb-2 fw-bold" style="color: #80c7e4; font-size: 1.1rem;">
                                {{ $course->title }}
                            </div>
                            <div class="mb-1 text-secondary" style="font-size: 1rem;">
                                {{ $course->subtitle }}
                            </div>
                            <div class="mb-2 text-secondary small">
                                Age Range: {{ $course->age_range }}
                            </div>
                            <p class="mb-3 text-dark grow" style="font-size: 0.95rem;">
                                {{ \Illuminate\Support\Str::limit($course->description, 120) }}
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection