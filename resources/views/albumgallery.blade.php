@extends('layouts.app')

@section('title', $album->title . ' - Gallery')

@section('main_content')
<div class="container my-5">
    <h2 class="fw-bold mb-3" style="color: #4fc3f7;">{{ $album->title }}</h2>
    <p class="mb-4 text-secondary">{{ $album->description }}</p>
    <div class="row g-4 justify-content-center">
        @foreach($album->media as $media)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <div class="card shadow border-0 h-100 w-100">
                    @if($media->type === 'image')
                        <img src="{{ asset('storage/' . $media->file) }}" class="card-img-top" alt="{{ $media->caption }}">
                    @elseif($media->type === 'video')
                        <video controls class="w-100" style="height: 250px; object-fit: cover;">
                            <source src="{{ asset('storage/' . $media->file) }}">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                    @if($media->caption)
                        <div class="card-body">
                            <p class="card-text text-secondary">{{ $media->caption }}</p>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection