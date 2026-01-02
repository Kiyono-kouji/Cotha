@extends('layouts.app')

@section('title', 'Edit Article')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Waves --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    <div class="container py-5 position-relative" style="z-index: 2; max-width: 700px;">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98);">
            <form method="POST" action="{{ route('admin.articles.update', $article->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label fw-semibold">Headline <span class="text-danger">*</span></label>
                    <input type="text" name="headline" class="form-control rounded-3 border-2" required value="{{ old('headline', $article->headline) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image 1</label>
                    @if($article->image1)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->image1) }}" alt="Image 1" style="max-width: 200px;">
                        </div>
                    @endif
                    <input type="file" name="image1" class="form-control rounded-3 border-2" accept="image/*">
                    <small class="text-muted">Leave blank to keep current image.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image 2</label>
                    @if($article->image2)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $article->image2) }}" alt="Image 2" style="max-width: 200px;">
                        </div>
                    @endif
                    <input type="file" name="image2" class="form-control rounded-3 border-2" accept="image/*">
                    <small class="text-muted">Leave blank to keep current image.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Body <span class="text-danger">*</span></label>
                    <textarea name="body" class="form-control rounded-3 border-2" rows="6" required>{{ old('body', $article->body) }}</textarea>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" name="active" class="form-check-input mt-0" id="active" {{ old('active', $article->active) ? 'checked' : '' }}>
                    <label class="form-check-label fw-semibold ms-2" for="active">Active</label>
                </div>
                <div class="text-center mt-4 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                    <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold rounded-3 shadow"
                            style="background: #4fc3f7; border: none; color: white;">
                        <i class="bi bi-save me-2"></i>Update Article
                    </button>
                    <a href="{{ route('admin.articles.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-3 shadow"
                       style="background: #FF85A2; border: none; color: white;">
                        Cancel
                    </a>
                </div>
            </form>
            @if ($errors->any())
                <div class="alert alert-danger mt-4 rounded-3">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
