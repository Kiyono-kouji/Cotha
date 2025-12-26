@extends('layouts.app')

@section('title', 'Add New Event')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Add New Event</h1>
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        {{-- Add your event form fields here --}}
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select name="category" class="form-control" required>
                <option value="offline">Offline</option>
                <option value="online">Online</option>
                <option value="competition">Competition</option>
                <option value="workshop">Workshop</option>
                <option value="seminar">Seminar</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Date & Time</label>
            <input type="datetime-local" name="date" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Location</label>
            <input type="text" name="location" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input type="text" name="price" class="form-control">
        </div>
        <button type="submit" class="btn btn-success">Create Event</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection