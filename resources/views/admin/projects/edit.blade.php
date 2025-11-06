@extends('layouts.app')

@section('title', 'Edit Project')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Project</h1>
    <form method="POST" action="{{ route('admin.projects.update', $project->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $project->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Creator</label>
            <input type="text" name="creator" class="form-control" required value="{{ old('creator', $project->creator) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Creator Grade</label>
            <input type="text" name="creator_grade" class="form-control" value="{{ old('creator_grade', $project->creator_grade) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Date</label>
            <input type="date" name="date" class="form-control" value="{{ old('date', $project->date) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Image</label>
            @if($project->image)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/StudentProjects/' . $project->image) }}" alt="{{ $project->title }}" style="max-width: 200px;">
                </div>
            @endif
            <input type="file" name="image" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep current image.</small>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="isFeatured" class="form-check-input" id="isFeatured" {{ old('isFeatured', $project->isFeatured) ? 'checked' : '' }}>
            <label class="form-check-label" for="isFeatured">Featured</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active" {{ old('active', $project->active) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Update</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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