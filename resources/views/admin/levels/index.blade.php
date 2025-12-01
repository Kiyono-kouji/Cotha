@extends('layouts.app')

@section('title', 'Admin - Manage Levels')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Levels</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.levels.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Level
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
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Age Range</th>
                    <th>Active</th>
                    <th>Featured</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($levels as $level)
                <tr>
                    <td>{{ $level->title }}</td>
                    <td>{{ $level->subtitle }}</td>
                    <td>{{ $level->age_range }}</td>
                    <td>
                        @if($level->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if($level->isFeatured)
                            <span class="badge bg-success">Featured</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.levels.edit', $level) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.levels.destroy', $level) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this level?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No levels found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection