@extends('layouts.app')

@section('title', 'Edit Testimonial')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Testimonial</h1>
    <form method="POST" action="{{ route('admin.testimonials.update', $testimonial->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Name</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $testimonial->name) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Photo</label>
            @if($testimonial->photo)
                <div class="mb-2">
                    <img src="{{ asset('storage/images/StudentPictures/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="rounded-circle border-3 border-dark mx-auto mb-2" style="width: 90px; height: 90px; object-fit: cover;">
                </div>
            @endif
            <input type="file" name="photo" class="form-control" accept="image/*">
            <small class="text-muted">Leave blank to keep current photo.</small>
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Testimonial Text</label>
            <textarea name="text" class="form-control" rows="4" required>{{ old('text', $testimonial->text) }}</textarea>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="isFeatured" class="form-check-input" id="isFeatured"
                {{ old('isFeatured', $testimonial->isFeatured) ? 'checked' : '' }}>
            <label class="form-check-label" for="isFeatured">Featured</label>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" name="active" class="form-check-input" id="active"
                {{ old('active', $testimonial->active) ? 'checked' : '' }}>
            <label class="form-check-label" for="active">Active</label>
        </div>
        <button type="submit" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">Update</button>
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