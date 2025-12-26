@extends('layouts.app')

@section('title', 'Edit Event')

@section('main_content')
<div class="container py-5">
    <h1 class="mb-4">Edit Event</h1>
    <form action="{{ route('admin.events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('admin.events.form')
        <button type="submit" class="btn btn-primary">Update Event</button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection