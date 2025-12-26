@extends('layouts.app')

@section('title', 'Edit Event')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Edit Event</h1>
    <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $event->title) }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image URL</label>
            <input type="text" name="image" class="form-control" value="{{ old('image', $event->image) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-select" required>
                @foreach(['offline','online','competition','workshop','seminar'] as $cat)
                    <option value="{{ $cat }}" {{ old('category', $event->category) === $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Event Date & Time</label>
            <input type="datetime-local" name="date" class="form-control"
                   value="{{ old('date', isset($event->date) ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Last Registration Date & Time</label>
            <input type="datetime-local" name="last_registration_at" class="form-control"
                   value="{{ old('last_registration_at', isset($event->last_registration_at) ? $event->last_registration_at->format('Y-m-d\TH:i') : '') }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control" value="{{ old('location', $event->location) }}">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control" value="{{ old('price', $event->price) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update Event</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection