@extends('layout.default-layout')

@section('title', 'Admin Dashboard - COTHA')

@section('main_content')
<div class="container my-5 px-4 px-md-5">
    <h1 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">Admin Dashboard</h1>
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-book fs-1 text-primary mb-3"></i>
                    <h4 class="fw-semibold mb-2">Manage Courses</h4>
                    <p class="text-secondary mb-3">View, add, edit, or delete courses offered at COTHA.</p>
                    <a href="{{ url('/admin/courses') }}" class="btn btn-primary rounded-pill px-4 py-2 animated-btn">Go to Courses</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-journal-code fs-1 text-success mb-3"></i>
                    <h4 class="fw-semibold mb-2">Manage Classes</h4>
                    <p class="text-secondary mb-3">Organize and update class details for each course.</p>
                    <a href="{{ url('/admin/classes') }}" class="btn btn-success rounded-pill px-4 py-2 animated-btn">Go to Classes</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-lg border-0 h-100">
                <div class="card-body text-center">
                    <i class="bi bi-stars fs-1 text-warning mb-3"></i>
                    <h4 class="fw-semibold mb-2">Manage Projects</h4>
                    <p class="text-secondary mb-3">Review and feature student projects for the website.</p>
                    <a href="{{ url('/admin/projects') }}" class="btn btn-warning rounded-pill px-4 py-2 animated-btn">Go to Projects</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection