@extends('layouts.app')

@section('title', 'Forgot Password - COTHA')

@section('main_content')
<div class="container my-5 px-4 px-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">Forgot Your Password?</h2>
                    <p class="mb-4 text-secondary text-center">
                        Enter your email address and we'll send you a link to reset your password.
                    </p>
                    @if (session('status'))
                        <div class="alert alert-success mb-4 rounded-pill text-center">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary fw-semibold rounded-pill animated-btn" style="background-color: #4fc3f7; border: none;">
                                Send Password Reset Link
                            </button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('login') }}" class="text-decoration-none" style="color: #4fc3f7;">Back to Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection