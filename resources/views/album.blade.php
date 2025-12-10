@extends('layouts.app')

@section('title', 'Albums - COTHA')

@section('main_content')
{{-- Hero Section with Absolute Banner Image (match Levels/About) --}}
<div class="container-fluid py-5 position-relative" style="min-height: 550px;">
    {{-- Background banner image --}}
    <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
        <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
             alt="Hero Banner"
             style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
        {{-- Decorative shapes --}}
        <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
        <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
        <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
    </div>

    {{-- Hero text --}}
    <div class="container position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 text-white mb-4 pt-5 mt-5 text-lg-start text-center ms-lg-5 ps-lg-0" style="margin-top: 8rem !important;">
                <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                    Albums
                </h1>
                <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                    Browse photo and video collections from our activities and classes.
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

{{-- Albums Grid (margins consistent) --}}
<div class="container py-5 px-3 px-md-1">
    @if($albums->isEmpty())
        <div class="text-center py-5">
            <i class="bi bi-images fs-1 text-muted mb-3 d-block"></i>
            <p class="text-muted">No albums available yet.</p>
        </div>
    @else
        <div class="row g-4 justify-content-center">
            @foreach($albums as $album)
                @php
                    $cover = $album->media->first();
                    $mediaCount = $album->media->count();
                @endphp
                <div class="col-12 col-sm-6 col-lg-4">
                    <a href="{{ route('albums.show', $album->id) }}" class="text-decoration-none">
                        <div class="card border-0 shadow h-100" style="border-radius: 20px; overflow: hidden;">
                            {{-- Cover --}}
                            <div class="position-relative" style="height: 230px; overflow: hidden;">
                                @if($cover && $cover->type === 'image')
                                    <img src="{{ asset('storage/' . $cover->file) }}"
                                         class="w-100 h-100" style="object-fit: cover;"
                                         alt="{{ $album->title }}">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center"
                                         style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%);">
                                        <i class="bi bi-collection-play fs-1 text-white"></i>
                                    </div>
                                @endif
                                <div class="position-absolute bottom-0 start-0 w-100 p-3" style="background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.55) 100%);">
                                    <h5 class="fw-bold mb-0 text-white" style="text-shadow: 0 1px 2px rgba(0,0,0,.2);">
                                        {{ $album->title }}
                                    </h5>
                                </div>
                            </div>

                            {{-- Body --}}
                            <div class="card-body d-flex flex-column p-4">
                                <p class="text-secondary mb-3" style="min-height: 3rem;">
                                    {{ \Illuminate\Support\Str::limit($album->description, 110) }}
                                </p>
                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <span class="badge rounded-pill" style="background:#eaf6ff; color:#0077b6;">
                                        <i class="bi bi-images me-1"></i>{{ $mediaCount }} media
                                    </span>
                                    <span class="btn btn-sm rounded-pill fw-semibold"
                                          style="background-color:#4fc3f7; border:none; color:white;">
                                        View Gallery <i class="bi bi-arrow-right ms-1"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection