@extends('layouts.app')
@section('title', 'Add New Album')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Album</h1>
    <div class="card shadow border-0 rounded-4 p-4">
        <form method="POST" action="{{ route('admin.albums.store') }}" enctype="multipart/form-data" id="albumForm">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Title</label>
                <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Description</label>
                <textarea name="description" class="form-control" rows="3">{{ old('description') }}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Partners</label>
                <select name="partners[]" class="form-select" multiple>
                    @foreach($allPartners as $partner)
                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                    @endforeach
                </select>
                <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple partners.</small>
            </div>
            <hr>
            <h5 class="fw-bold mb-3">Add Media</h5>
            <div id="media-fields">
                <div class="media-group mb-3 border rounded p-3">
                    <div class="mb-2">
                        <label class="form-label">Type</label>
                        <select name="media[0][type]" class="form-select" required>
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">File</label>
                        <input type="file" name="media[0][file]" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Caption</label>
                        <input type="text" name="media[0][caption]" class="form-control">
                    </div>
                    <button type="button" class="btn btn-danger btn-sm rounded-pill remove-media">Remove</button>
                </div>
            </div>
            <button type="button" class="btn btn-info rounded-pill mb-3" id="addMediaBtn">
                <i class="bi bi-plus-lg"></i> Add Another Media
            </button>
            <br>
            <button type="submit" class="btn btn-success rounded-pill shake">Save Album & Media</button>
            <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    let mediaIndex = 1;
    document.getElementById('addMediaBtn').addEventListener('click', function () {
        const mediaFields = document.getElementById('media-fields');
        const newGroup = document.createElement('div');
        newGroup.className = 'media-group mb-3 border rounded p-3';
        newGroup.innerHTML = `
            <div class="mb-2">
                <label class="form-label">Type</label>
                <select name="media[${mediaIndex}][type]" class="form-select" required>
                    <option value="image">Image</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div class="mb-2">
                <label class="form-label">File</label>
                <input type="file" name="media[${mediaIndex}][file]" class="form-control" required>
            </div>
            <div class="mb-2">
                <label class="form-label">Caption</label>
                <input type="text" name="media[${mediaIndex}][caption]" class="form-control">
            </div>
            <button type="button" class="btn btn-danger btn-sm rounded-pill remove-media">Remove</button>
        `;
        mediaFields.appendChild(newGroup);
        mediaIndex++;
    });

    document.getElementById('media-fields').addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-media')) {
            e.target.closest('.media-group').remove();
        }
    });
});
</script>
@endsection