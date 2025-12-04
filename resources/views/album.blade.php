@extends('layouts.app')

@section('title', 'Albums - COTHA')

@section('main_content')
<div class="container my-5">
    <div class="row align-items-center mb-3">
        <div class="col-12 text-center">
            <h2 class="fw-bold mb-0" style="color: #4fc3f7;">Albums</h2>
        </div>
    </div>
    <div class="row g-4 justify-content-center">
        @foreach($albums as $album)
            <div class="col-12 col-md-6 col-lg-4 d-flex">
                <a href="{{ route('albums.show', $album->id) }}" class="card tilt-card h-100 shadow border-0 text-decoration-none text-dark w-100 mx-auto" style="max-width: 520px;">
                    <div class="card-body text-center">
                        <h4 class="fw-bold mb-2">{{ $album->title }}</h4>
                        <p class="text-secondary">{{ \Illuminate\Support\Str::limit($album->description, 100) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection