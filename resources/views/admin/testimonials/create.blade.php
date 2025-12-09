@extends('layouts.app')

@section('title', 'Add New Testimonial')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Testimonial</h1>
    <form method="POST" action="{{ route('admin.testimonials.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label fw-semibold">Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Testimonial Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text') }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">School</label>
            <input type="text" name="school" class="form-control" value="{{ old('school') }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">City</label>
            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="isFeatured" class="form-check-input" id="isFeatured" {{ old('isFeatured', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="isFeatured">Featured</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active" {{ old('active', true) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Save</button>
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
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