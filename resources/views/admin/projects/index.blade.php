@extends('layouts.app')

@section('title', 'Admin - Manage Projects')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Projects</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Project
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
                    <th>Creator</th>
                    <th>Grade</th>
                    <th>Date</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->creator }}</td>
                    <td>{{ $project->creator_grade }}</td>
                    <td>{{ $project->date ? \Carbon\Carbon::parse($project->date)->format('d M Y') : '-' }}</td>
                    <td>
                        @if($project->isFeatured)
                            <span class="badge bg-success">Featured</span>
                        @else
                            <span class="badge bg-secondary">No</span>
                        @endif
                    </td>
                    <td>
                        @if($project->active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this project?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection