@extends('layouts.app')

@section('title', 'Add New Class')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Class</h1>
    <form method="POST" action="{{ route('admin.classes.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Level</label>
            <input type="text" name="level" class="form-control" required value="{{ old('level') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Meeting Info</label>
            <input type="text" name="meeting_info" class="form-control" value="{{ old('meeting_info') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Requirements</label>
            <textarea name="requirements" class="form-control" rows="2" placeholder="One requirement per line">{{ old('requirements') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Note</label>
            <input type="text" name="note" class="form-control" value="{{ old('note') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Concepts</label>
            <textarea name="concepts" class="form-control" rows="2" placeholder="One concept per line">{{ old('concepts') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Projects</label>
            <textarea name="projects" class="form-control" rows="2" placeholder="One project per line">{{ old('projects') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Button Link</label>
            <input type="text" name="button_link" class="form-control" value="{{ old('button_link') }}">
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Save</button>
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