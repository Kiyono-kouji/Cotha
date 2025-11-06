@extends('layouts.app')

@section('title', 'Add New Method')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Method</h1>
    <form method="POST" action="{{ route('admin.methods.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Label</label>
            <input type="text" name="label" class="form-control" required value="{{ old('label') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="4" required>{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Image</label>
            <input type="file" name="image" class="form-control" accept="image/*">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active" {{ old('active', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Save</button>
        <a href="{{ route('admin.methods.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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