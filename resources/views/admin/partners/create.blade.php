@extends('layouts.app')
@section('title', 'Add New Partner')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Add New Partner</h1>
    <div class="card shadow border-0 rounded-4 p-4">
        <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Name</label>
                <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Logo</label>
                <input type="file" name="logo" class="form-control" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success rounded-pill shake">Save Partner</button>
            <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary rounded-pill ms-2">Cancel</a>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger mt-3 rounded-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
@endsection