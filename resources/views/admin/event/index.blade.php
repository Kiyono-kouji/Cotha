@extends('layouts.app')

@section('title', 'Admin - Manage Events')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Manage Events</h1>
    <a href="{{ route('admin.events.create') }}" class="btn btn-primary mb-3">Add New Event</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Category</th>
                <th>Location</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events as $event)
            <tr>
                <td>{{ $event->title }}</td>
                <td>{{ \Carbon\Carbon::parse($event->date)->format('D, M j, Y H:i') }}</td>
                <td>{{ ucfirst($event->category) }}</td>
                <td>{{ $event->location }}</td>
                <td>{{ $event->price }}</td>
                <td>
                    <a href="{{ route('admin.events.edit', $event) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.events.destroy', $event) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Delete this event?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No events found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $events->links('pagination::bootstrap-5') }}
</div>
@endsection