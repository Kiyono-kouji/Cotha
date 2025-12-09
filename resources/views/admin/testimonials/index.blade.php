@extends('layouts.app')

@section('title', 'Admin - Manage Testimonials')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Testimonials</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Testimonial
        </a>
    </div>
    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center mb-3">
            {{ session('success') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>School</th>
                    <th>City</th>
                    <th>Text</th>
                    <th>Photo</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->name }}</td>
                    <td>{{ $testimonial->school }}</td>
                    <td>{{ $testimonial->city }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($testimonial->text, 60) }}</td>
                    <td>
                        @if($testimonial->photo)
                            <img src="{{ asset('storage/images/StudentPictures/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" style="width: 60px; height: 60px; object-fit: cover;" class="rounded-circle">
                        @endif
                    </td>
                    <td>
                        @if($testimonial->isFeatured)
                            <span class="badge bg-success">Featured</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        @if($testimonial->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this testimonial?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center text-muted">No testimonials found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection