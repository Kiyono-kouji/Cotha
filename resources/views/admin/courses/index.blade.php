@extends('layouts.app')

@section('title', 'Admin - Manage Courses')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Courses</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.courses.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Course
        </a>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Age Range</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($courses as $course)
                <tr>
                    <td>{{ $course->title }}</td>
                    <td>{{ $course->subtitle }}</td>
                    <td>{{ $course->age_range }}</td>
                    <td>
                        @if($course->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.courses.edit', $course) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.courses.destroy', $course) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this course?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No courses found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection