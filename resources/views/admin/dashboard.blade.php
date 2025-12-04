@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('main_content')
<div class="container my-5 px-5 px-md-1">
    <h1 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">Admin Dashboard</h1>
    <div class="row g-4 justify-content-center">
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.levels.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-journal-code fs-1 mb-3" style="color: #4fc3f7;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Levels</h5>
                    <p class="text-secondary mb-0">Create, edit, and delete courses offered at COTHA.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.classes.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-easel2 fs-1 mb-3" style="color: #f48acb;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Classes</h5>
                    <p class="text-secondary mb-0">Organize and update class details and schedules.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.projects.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-controller fs-1 mb-3" style="color: #80c7e4;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Projects</h5>
                    <p class="text-secondary mb-0">Review and feature student projects.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.methods.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-lightbulb fs-1 mb-3" style="color: #feda77;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Methods</h5>
                    <p class="text-secondary mb-0">Edit learning methods and approaches.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.testimonials.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-chat-quote fs-1 mb-3" style="color: #b3e0f7;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Testimonials</h5>
                    <p class="text-secondary mb-0">Approve and display student testimonials.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.albums.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-images fs-1 mb-3" style="color: #f48acb;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Albums</h5>
                    <p class="text-secondary mb-0">Create, edit, and organize photo/video albums.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.partners.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-people fs-1 mb-3" style="color: #80c7e4;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Partners</h5>
                    <p class="text-secondary mb-0">Add, edit, and organize partner logos and connections.</p>
                </div>
            </a>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('admin.registrations.index') }}" class="card shadow border-0 text-decoration-none text-dark h-100">
                <div class="card-body text-center py-5">
                    <i class="bi bi-clipboard-check fs-1 mb-3" style="color: #80c7e4;"></i>
                    <h5 class="card-title fw-bold mb-2">Manage Registrations</h5>
                    <p class="text-secondary mb-0">Review and contact registered users.</p>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection