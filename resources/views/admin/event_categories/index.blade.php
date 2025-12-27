@extends('layouts.app')

@section('title', 'Admin - Manage Event Categories')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Waves --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3"/>
        </svg>
    </div>
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3"/>
        </svg>
    </div>
    {{-- Hero Section --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 420px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 520px;">
                        Manage Event Categories
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 520px;">
                        Create, edit, and organize event categories at COTHA.
                    </p>
                </div>
                <div class="d-none d-lg-block col-lg-6"></div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-7">
                <form method="GET" action="{{ route('admin.event_categories.index') }}" class="d-flex gap-2 align-items-center">
                    <input type="text"
                           name="search"
                           class="form-control rounded-pill px-4 py-2 shadow-sm"
                           style="border: 2px solid #4fc3f7; background: #f8f9fa; color: #1976D2; font-size: 1rem;"
                           placeholder="Search by category name..."
                           value="{{ request('search') }}">
                    <button type="submit"
                            class="btn rounded-pill px-4 fw-semibold d-flex align-items-center"
                            style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); color: white; border: none;">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.event_categories.index') }}"
                           class="btn btn-secondary rounded-pill px-4 fw-semibold d-flex align-items-center"
                           style="background: #e3f2fd; color: #1976D2; border: none;">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
            <div class="col-12 col-md-5 text-end mt-3 mt-md-0">
                <a href="{{ route('admin.event_categories.create') }}"
                   class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                   style="background: #4fc3f7; border: none; color: white;">
                    <i class="bi bi-plus-lg me-2"></i> Add New Category
                </a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success rounded-pill text-center mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive bg-white rounded-4 shadow p-4">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                    <tr>
                        <td>{{ $cat->name }}</td>
                        <td>{{ $cat->description }}</td>
                        <td>
                            @if($cat->active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.event_categories.edit', $cat) }}" class="btn btn-sm btn-warning rounded-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.event_categories.destroy', $cat) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-3" onclick="return confirm('Delete this category?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $categories->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</section>
@endsection