@extends('layouts.app')
@section('title', 'Add Media')
@section('main_content')
<div class="container my-5">
    <div class="card shadow border-0 rounded-4 p-4">
        <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add Media to Album</h1>
        <form method="POST" action="{{ route('admin.media.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="album_id" value="{{ request('album_id') ?? $album->id }}">
            <div class="mb-3">
                <label class="form-label fw-semibold">Type</label>
                <select name="type" class="form-select" required>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">File</label>
                <input type="file" name="file" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Caption</label>
                <input type="text" name="caption" class="form-control">
            </div>
            <button type="submit" class="btn btn-success rounded-pill shake">Add Media</button>
            <a href="{{ route('admin.albums.show', request('album_id') ?? $album->id) }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3 rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection