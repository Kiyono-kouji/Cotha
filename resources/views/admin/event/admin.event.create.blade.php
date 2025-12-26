@extends('layouts.app')

@section('title', 'Add New Event')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Add New Event</h1>
    <form action="{{ route('admin.events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('admin.events.form')
        <button type="submit" class="btn btn-success">Create Event</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection