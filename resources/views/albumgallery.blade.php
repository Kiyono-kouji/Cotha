@extends('layouts.app')

@section('title', $album->title . ' - Gallery')

@section('main_content')
<div class="container py-5" style="padding-top: 9rem !important; padding-bottom: 5rem;">
    {{-- Header --}}
    <div class="text-center mb-5">
        <h1 class="fw-bold mb-2" style="color: #2C3E50;">{{ $album->title }}</h1>
        @if(!empty($album->description))
            <p class="text-secondary mb-0" style="max-width: 720px; margin: 0 auto; line-height: 1.7;">
                {{ $album->description }}
            </p>
        @endif
    </div>

    {{-- Media Grid --}}
    <div class="row g-4 justify-content-center">
        @forelse($album->media as $media)
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card border-0 shadow h-100" style="border-radius: 20px; overflow: hidden; background: white;">
                    <div class="position-relative" style="aspect-ratio: 16/10; overflow: hidden;">
                        @if($media->type === 'image')
                            <img src="{{ asset('storage/' . $media->file) }}"
                                 alt="{{ $media->caption ?? $album->title }}"
                                 class="w-100 h-100" style="object-fit: cover;">
                        @elseif($media->type === 'video')
                            <video controls class="w-100 h-100" style="object-fit: cover;">
                                <source src="{{ asset('storage/' . $media->file) }}">
                                Your browser does not support the video tag.
                            </video>
                        @elseif($media->type === 'youtube')
                            <iframe 
                                class="w-100 h-100" 
                                src="https://www.youtube.com/embed/{{ $media->file }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen>
                            </iframe>
                        @endif
                        <div class="position-absolute bottom-0 start-0 w-100" style="height: 60px; background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.35) 100%); pointer-events: none;"></div>
                    </div>

                    @if(!empty($media->caption))
                        <div class="card-body p-4">
                            <p class="text-secondary mb-0" style="line-height: 1.6;">{{ $media->caption }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="text-center py-5">
                    <i class="bi bi-images fs-1 text-muted d-block mb-3"></i>
                    <p class="text-muted">No media in this album yet.</p>
                </div>
            </div>
        @endforelse
    </div>

    {{-- Partners --}}
    @if($album->partners->count())
        <div class="mt-5 mb-4">
            <h5 class="fw-bold text-center mb-4" style="color:#2C3E50;">Partners</h5>
            <div class="d-flex flex-wrap justify-content-center gap-4">
                @foreach($album->partners as $partner)
                    <div class="text-center">
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}"
                                 alt="{{ $partner->name }}"
                                 style="height: 70px; max-width: 180px; object-fit: contain; border-radius: 12px; background: #fff;">
                        @endif
                        <div class="fw-semibold mt-2" style="font-size: 0.95rem; color:#2C3E50;">{{ $partner->name }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection