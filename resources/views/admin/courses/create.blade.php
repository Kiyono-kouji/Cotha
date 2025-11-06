@extends('layouts.app')

@section('title', 'Add New Course')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Course</h1>
    <form method="POST" action="{{ route('admin.courses.store') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Subtitle</label>
            <input type="text" name="subtitle" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Age Range</label>
            <input type="text" name="age_range" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active" checked>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Save</button>
        <a href="{{ route('admin.courses.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
    </form>
</div>
@endsection