@extends('layouts.app')

@section('title', 'Albums - COTHA')

@section('main_content')
<div class="container my-5">
    <h2 class="fw-bold mb-4" style="color: #4fc3f7;">Albums</h2>
    <div class="row g-4">
        @foreach($albums as $album)
            <div class="col-12 col-md-6 col-lg-4">
                <a href="{{ route('albums.show', $album->id) }}" class="card tilt-card h-100 shadow border-0 text-decoration-none text-dark">
                    <div class="card-body">
                        <h4 class="fw-bold mb-2">{{ $album->title }}</h4>
                        <p class="text-secondary">{{ \Illuminate\Support\Str::limit($album->description, 100) }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection