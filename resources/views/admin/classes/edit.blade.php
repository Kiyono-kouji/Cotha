@extends('layouts.app')

@section('title', 'Edit Class')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Class</h1>
    <form method="POST" action="{{ route('admin.classes.update', $class->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $class->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Level</label>
            <input type="text" name="level" class="form-control" required value="{{ old('level', $class->level) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Image</label>
            @if($class->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/ClassesResources/' . $class->image) }}" alt="{{ $class->title }}" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep current image.</small>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Meeting Info</label>
            <input type="text" name="meeting_info" class="form-control" value="{{ old('meeting_info', $class->meeting_info) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description', $class->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Requirements</label>
            <textarea name="requirements" class="form-control" rows="2" placeholder="One requirement per line">{{ old('requirements', is_array($class->requirements) ? implode("\n", $class->requirements) : $class->requirements) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Note</label>
            <input type="text" name="note" class="form-control" value="{{ old('note', $class->note) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Concepts</label>
            <textarea name="concepts" class="form-control" rows="2" placeholder="One concept per line">{{ old('concepts', is_array($class->concepts) ? implode("\n", $class->concepts) : $class->concepts) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Projects</label>
            <textarea name="projects" class="form-control" rows="2" placeholder="One project per line">{{ old('projects', is_array($class->projects) ? implode("\n", $class->projects) : $class->projects) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Button Link</label>
            <input type="text" name="button_link" class="form-control" value="{{ old('button_link', $class->button_link) }}">
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Update</button>
        <a href="{{ route('admin.classes.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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