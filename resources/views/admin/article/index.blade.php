@extends('layouts.app')

@section('title', 'Manage Articles')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Wave on Left Side --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold mb-0" style="font-size: 2.2rem;">Manage Articles</h1>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
               style="background: #4fc3f7; border: none; color: white;">
                <i class="bi bi-plus-lg me-2"></i> Add New Article
            </a>
        </div>
        @if(session('success'))
            <div class="alert alert-success rounded-pill text-center mb-3">
                {{ session('success') }}
            </div>
        @endif
        <div class="table-responsive bg-white rounded-4 shadow p-4">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Headline</th>
                        <th>Images</th>
                        <th>Active</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($articles as $article)
                    <tr>
                        <td>{{ $article->headline }}</td>
                        <td>
                            @if($article->image1)
                                <img src="{{ asset('storage/' . $article->image1) }}" alt="Image 1" style="max-width: 60px;">
                            @endif
                            @if($article->image2)
                                <img src="{{ asset('storage/' . $article->image2) }}" alt="Image 2" style="max-width: 60px;">
                            @endif
                        </td>
                        <td>
                            @if($article->active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-sm btn-warning rounded-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger rounded-3" onclick="return confirm('Delete this article?')">
                                    <i class="bi bi-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No articles found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-4">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</section>
@endsection