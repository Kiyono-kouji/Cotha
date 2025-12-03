@extends('layouts.app')
@section('title', 'Album Details')
@section('main_content')
<div class="container my-5">
    <div class="card shadow border-0 rounded-4 p-4 mb-4">
        <h1 class="fw-bold mb-3" style="color: #4fc3f7;">{{ $album->title }}</h1>
        <p class="mb-4 text-secondary">{{ $album->description }}</p>
        <div class="mb-4">
            <a href="{{ route('admin.media.create', ['album_id' => $album->id]) }}" class="btn btn-primary rounded-pill shake">
                <i class="bi bi-plus-lg"></i> Add Media
            </a>
            <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary rounded-pill ms-2">Back to Albums</a>
        </div>
    </div>
    <h4 class="fw-semibold mb-3">Media Gallery</h4>
    <div class="row g-4">
        @forelse($album->media as $media)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow border-0 h-100 rounded-4">
                    @if($media->type === 'image')
                        <img src="{{ asset('storage/' . $media->file) }}" class="card-img-top rounded-top" alt="{{ $media->caption }}">
                    @elseif($media->type === 'video')
                        <video controls class="w-100 rounded-top" style="height: 250px; object-fit: cover;">
                            <source src="{{ asset('storage/' . $media->file) }}">
                        </video>
                    @endif
                    <div class="card-body">
                        <p class="card-text text-secondary">{{ $media->caption }}</p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('admin.media.edit', $media->id) }}" class="btn btn-warning btn-sm rounded-pill">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.media.destroy', $media->id) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm rounded-pill" onclick="return confirm('Delete this media?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info rounded-3">No media found for this album.</div>
            </div>
        @endforelse
    </div>
</div>
@endsection