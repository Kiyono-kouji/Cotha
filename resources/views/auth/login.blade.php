@extends('layouts.app')

@section('title', 'Login - COTHA')

@section('main_content')
<div class="container my-5 px-4 px-md-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6 col-lg-5">
            <div class="card shadow rounded-4 border-0">
                <div class="card-body p-5">
                    <h2 class="fw-bold mb-4 text-center" style="color: #4fc3f7;">Login to COTHA</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email address</label>
                            <input type="email" name="email" id="email" class="form-control" required autofocus value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3 form-check">
                            <input type="checkbox" name="remember" id="remember" class="form-check-input">
                            <label class="form-check-label" for="remember">Remember Me</label>
                        </div>

                        <div class="d-grid mb-3">
                            <button type="submit" class="btn btn-primary fw-semibold rounded-pill" style="background-color: #4fc3f7; border: none;">Login</button>
                        </div>

                        <div class="text-center">
                            <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #4fc3f7;">Forgot Your Password?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection