@extends('layouts.app')

@section('title', 'Admin - Manage Classes')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Classes</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.classes.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Class
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
                    <th>Level</th>
                    <th>Meeting Info</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                <tr>
                    <td>{{ $class->title }}</td>
                    <td>{{ $class->level }}</td>
                    <td>{{ $class->meeting_info }}</td>
                    <td>
                        <a href="{{ route('admin.classes.edit', $class) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.classes.destroy', $class) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this class?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No classes found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection