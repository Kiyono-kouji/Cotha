@extends('layouts.app')
@section('title', 'Admin - Manage Registrations')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Registrations</h1>

    <form method="GET" action="{{ route('admin.registrations.index') }}" class="card card-body mb-4 shadow-sm">
        <div class="row g-2">
            <div class="col-12 col-md-3">
                <input type="text" name="class_title" class="form-control" placeholder="Class title"
                       value="{{ request('class_title') }}">
            </div>
            <div class="col-12 col-md-2">
                <input type="text" name="class_level" class="form-control" placeholder="Level"
                       value="{{ request('class_level') }}">
            </div>
            <div class="col-12 col-md-3">
                <input type="text" name="child_name" class="form-control" placeholder="Child name"
                       value="{{ request('child_name') }}">
            </div>
            {{-- REMOVED City filter --}}
        </div>
        <div class="mt-2 text-end">
            <button class="btn btn-primary rounded-pill" style="background-color:#4fc3f7;border:none;">Search</button>
            <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary rounded-pill ms-2">Reset</a>
        </div>
    </form>

    @if(session('success'))
        <div class="alert alert-success rounded-pill text-center mb-3">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Child Name</th>
                    <th>Class</th>
                    <th>Level</th>
                    <th>WhatsApp</th>
                    <th>City</th>
                    <th>Submitted</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($registrations as $reg)
                <tr>
                    <td>{{ $reg->child_name }}</td>
                    <td>{{ $reg->class_title }}</td>
                    <td>{{ $reg->class_level }}</td>
                    <td>{{ $reg->wa }}</td>
                    <td>{{ $reg->city }}</td>
                    <td>{{ $reg->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.registrations.show', $reg->id) }}" class="btn btn-sm btn-info rounded-pill">
                            <i class="bi bi-eye"></i> View
                        </a>
                        <form action="{{ route('admin.registrations.destroy', $reg->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this registration?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">No registrations found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-3">
        {{ $registrations->links() }}
    </div>
</div>
@endsection