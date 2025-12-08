@extends('layouts.app')

@section('title', 'Admin - Manage Projects')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Projects</h1>
    <div class="mb-4 d-flex justify-content-between">
        <form method="POST" action="{{ route('admin.projects.sync') }}">
            @csrf
            <button type="submit" class="btn btn-outline-primary rounded-pill">
                <i class="bi bi-cloud-download"></i> Sync From API
            </button>
        </form>
    </div>
    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center mb-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger rounded-pill text-center mb-3">
            {{ session('error') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Creator</th>
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
                    <td>{{ $project->date ? \Carbon\Carbon::parse($project->date)->format('d M Y') : '-' }}</td>
                    <td>
                        @if($project->is_featured)
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
                    <td class="d-flex gap-2">
                        <form action="{{ route('admin.projects.toggleFeatured', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm btn-info rounded-pill">
                                <i class="bi bi-star"></i> {{ $project->is_featured ? 'Unfeature' : 'Feature' }}
                            </button>
                        </form>

                        <form action="{{ route('admin.projects.toggleActive', $project) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-sm {{ $project->active ? 'btn-secondary' : 'btn-success' }} rounded-pill">
                                <i class="bi bi-eye{{ $project->active ? '-slash' : '' }}"></i> {{ $project->active ? 'Hide' : 'Activate' }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">No projects found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection