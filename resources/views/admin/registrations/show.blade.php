@extends('layouts.app')
@section('title', 'Registration Detail')
@section('main_content')
<div class="container my-5">
    <h1 class="fw-bold mb-4" style="color: #4fc3f7;">Registration Detail</h1>
    <div class="card shadow border-0 rounded-4 p-4">
        <dl class="row">
            <dt class="col-sm-3">Child Name</dt><dd class="col-sm-9">{{ $registration->child_name }}</dd>
            <dt class="col-sm-3">DOB</dt><dd class="col-sm-9">{{ $registration->dob }}</dd>
            <dt class="col-sm-3">Class</dt><dd class="col-sm-9">{{ $registration->class_title }} ({{ $registration->class_level }})</dd>
            <dt class="col-sm-3">School</dt><dd class="col-sm-9">{{ $registration->school }}</dd>
            <dt class="col-sm-3">City</dt><dd class="col-sm-9">{{ $registration->city }}</dd>
            <dt class="col-sm-3">WhatsApp</dt><dd class="col-sm-9">{{ $registration->wa }}</dd>
            <dt class="col-sm-3">Language</dt><dd class="col-sm-9">{{ $registration->language }}</dd>
            <dt class="col-sm-3">Coding Experience</dt><dd class="col-sm-9">{{ $registration->coding_experience }}</dd>
            <dt class="col-sm-3">Note</dt><dd class="col-sm-9">{{ $registration->note }}</dd>
            <dt class="col-sm-3">Status</dt><dd class="col-sm-9">{{ $registration->status }}</dd>
        </dl>
        <a href="{{ route('admin.registrations.index') }}" class="btn btn-secondary rounded-pill">Back</a>
    </div>
</div>
@endsection