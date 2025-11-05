@extends('layout.default-layout')

@section('title', $course->title . ' - COTHA')

@section('main_content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center mb-4">
            @if($course->image)
                <img src="{{ $course->image }}" class="img-fluid mb-3" style="max-width: 400px;" alt="{{ $course->title }}">
            @endif
            <h2 class="fw-bold" style="color: #4fc3f7;">{{ $course->title }}</h2>
            <div class="mb-2 text-secondary fs-5">
                {{ $course->subtitle }}
                @if($course->age_range)
                    <span class="ms-2 badge rounded-pill" style="background-color: #e3f6fd; color: #234567;">
                        {{ $course->age_range }}
                    </span>
                @endif
            </div>
            <p class="text-dark" style="line-height: 1.7;">
                {{ $course->description }}
            </p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4 justify-content-center">
        @foreach($classes as $class)
            <div class="col d-flex">
                <div class="card h-100 shadow-sm border-0 flex-fill">
                    @if($class->image)
                        <img src="{{ $class->image }}" class="card-img-top" alt="{{ $class->title }}" style="object-fit: contain; height: 120px; background: #f6f6f6;">
                    @endif
                    <div class="card-body">
                        <h4 class="fw-semibold mb-2">{{ $class->title }}</h4>
                        <div class="mb-1 text-secondary fw-bold">Level {{ $class->level }}</div>
                        <div class="mb-2 text-dark fw-semibold">Jumlah pertemuan: {{ $class->meeting_info }}</div>
                        <p class="mb-2 text-dark" style="font-size: 0.95rem;">
                            {{ $class->description }}
                        </p>
                        @if($class->requirements)
                            <div class="mb-2">
                                <b>Kebutuhan perangkat:</b>
                                <ul>
                                    @foreach($class->requirements as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($class->concepts)
                            <div class="mb-2">
                                <b>Konsep yang diajarkan:</b>
                                <ul>
                                    @foreach($class->concepts as $concept)
                                        <li>{{ $concept }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($class->projects)
                            <div class="mb-2">
                                <b>Contoh Project Game:</b>
                                <ul>
                                    @foreach($class->projects as $project)
                                        <li>{{ $project }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center">
                            <a href="{{ $class->button_link }}" target="_blank" class="btn btn-success px-3 py-2 mt-2" style="background-color: #b3e0f7; color: #234567; border: none;">
                                Register & More Info
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ url('/courses') }}" class="btn btn-outline-primary mt-4">
                Back to Courses
            </a>
        </div>
    </div>
</div>
@endsection