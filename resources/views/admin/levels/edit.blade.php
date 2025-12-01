@extends('layouts.app')

@section('title', 'Edit Level')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Level</h1>
    <form method="POST" action="{{ route('admin.levels.update', $level->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $level->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Subtitle</label>
            <input type="text" name="subtitle" class="form-control" value="{{ old('subtitle', $level->subtitle) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Age Range</label>
            <input type="text" name="age_range" class="form-control" value="{{ old('age_range', $level->age_range) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $level->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control" required value="{{ old('slug', $level->slug) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Image</label>
            @if($level->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}" alt="{{ $level->title }}" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep current image.</small>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active" {{ old('active', $level->active) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Link Classes</label>
            <select name="classes[]" class="form-select" multiple>
                @foreach($allClasses as $class)
                    <option value="{{ $class->id }}" {{ in_array($class->id, old('classes', $linkedClasses)) ? 'selected' : '' }}>
                        {{ $class->title }} ({{ $class->level }})
                    </option>
                @endforeach
            </select>
            <small class="text-muted">Hold Ctrl (Windows) or Command (Mac) to select multiple classes.</small>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Update</button>
        <a href="{{ route('admin.levels.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection