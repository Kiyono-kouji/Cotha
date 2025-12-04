@extends('layouts.app')
@section('title', 'Admin - Manage Partners')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Manage Partners</h1>
    <div class="mb-4 text-end">
        <a href="{{ route('admin.partners.create') }}" class="btn btn-primary rounded-pill" style="background-color: #4fc3f7; border: none;">
            <i class="bi bi-plus-lg"></i> Add New Partner
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
                    <th>Logo</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                <tr>
                    <td>{{ $partner->name }}</td>
                    <td>
                        @if($partner->logo)
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" style="height: 40px;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-sm btn-warning rounded-pill">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                        <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger rounded-pill" onclick="return confirm('Delete this partner?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center text-muted">No partners found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection