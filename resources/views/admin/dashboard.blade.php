@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Admin Dashboard</h1>
    <div class="row g-4">
        <div class="col-md-4">
            <a href="{{ route('admin.courses.index') }}" class="card shadow border-0 text-decoration-none text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Courses</h5>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.classes.index') }}" class="card shadow border-0 text-decoration-none text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Classes</h5>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.projects.index') }}" class="card shadow border-0 text-decoration-none text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Projects</h5>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.methods.index') }}" class="card shadow border-0 text-decoration-none text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Methods</h5>
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.testimonials.index') }}" class="card shadow border-0 text-decoration-none text-dark">
                <div class="card-body text-center">
                    <h5 class="card-title">Manage Testimonials</h5>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection