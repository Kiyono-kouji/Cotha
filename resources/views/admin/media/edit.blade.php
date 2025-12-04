@extends('layouts.app')
@section('title', 'Edit Media')
@section('main_content')
<div class="container my-5">
    <div class="card shadow border-0 rounded-4 p-4">
        <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Media</h1>
        <form method="POST" action="{{ route('admin.media.update', $media->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-semibold">Type</label>
                <select name="type" class="form-select" required disabled>
                    <option value="image" {{ $media->type === 'image' ? 'selected' : '' }}>Image</option>
                    <option value="video" {{ $media->type === 'video' ? 'selected' : '' }}>Video</option>
                </select>
                <small class="text-muted">Type cannot be changed.</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Current File</label>
                @if($media->type === 'image')
                    <img src="{{ asset('storage/' . $media->file) }}" class="img-fluid mb-2 rounded" style="max-width:200px;">
                @elseif($media->type === 'video')
                    <video controls class="w-100 mb-2 rounded" style="max-width:200px;">
                        <source src="{{ asset('storage/' . $media->file) }}">
                    </video>
                @endif
                <input type="file" name="file" class="form-control">
                <small class="text-muted">Leave blank to keep current file.</small>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Caption</label>
                <input type="text" name="caption" class="form-control" value="{{ old('caption', $media->caption) }}">
            </div>
            <button type="submit" class="btn btn-success rounded-pill shake">Update Media</button>
            <a href="{{ route('admin.albums.show', $media->album_id) }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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