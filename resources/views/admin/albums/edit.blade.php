@extends('layouts.app')
@section('title', 'Edit Album')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Edit Album</h1>
    <form method="POST" action="{{ route('admin.albums.update', $album->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label fw-semibold">Title</label>
            <input type="text" name="title" class="form-control" required value="{{ old('title', $album->title) }}">
        </div>
        <div class="mb-3">
            <label class="form-label fw-semibold">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $album->description) }}</textarea>
        </div>
        <button type="submit" class="btn btn-success shake">Update</button>
        <a href="{{ route('admin.albums.index') }}" class="btn btn-secondary ms-2">Cancel</a>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
@endsection