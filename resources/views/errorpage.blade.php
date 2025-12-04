@extends('layouts.app')

@section('title', 'Error')

@section('main_content')
<div class="container py-5 text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="display-4 text-danger mb-4">Oops! Something went wrong.</h1>
            @if(isset($error))
                <div class="alert alert-danger mb-4">
                    {{ $error }}
                </div>
            @else
                <p class="lead text-secondary mb-4">
                    We couldn't process your request. Please try again later.
                </p>
            @endif
            <a href="{{ url('/') }}" class="btn btn-primary px-4 py-2 rounded-pill shadow">
                Go Home
            </a>
        </div>
    </div>
</div>
@endsection