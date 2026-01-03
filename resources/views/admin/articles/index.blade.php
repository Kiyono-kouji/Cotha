@extends('layouts.app')

@section('title', 'Admin - Manage Articles')

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

    {{-- Hero Section with Banner Image Background --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 420px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Admin Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 520px;">
                        Manage Articles
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Create, edit, and organize articles or blog posts for your site.
                    </p>
                </div>
                <div class="d-none d-lg-block col-lg-6"></div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Search and Add New Article Row --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row align-items-center mb-4">
            <div class="col-12 col-md-7">
                <form method="GET" action="{{ route('admin.articles.index') }}" class="d-flex gap-2 align-items-center">
                    <input type="text"
                           name="search"
                           class="form-control rounded-pill px-4 py-2 shadow-sm"
                           style="border: 2px solid #ffb74d; background: #f8f9fa; color: #ffb74d; font-size: 1rem;"
                           placeholder="Search articles..."
                           value="{{ request('search') }}">
                    <button type="submit"
                            class="btn rounded-pill px-4 fw-semibold d-flex align-items-center"
                            style="background: linear-gradient(135deg, #ffb74d 0%, #ffe0b2 100%); color: white; border: none;">
                        <i class="bi bi-search me-1"></i> Search
                    </button>
                    @if(request('search'))
                        <a href="{{ route('admin.articles.index') }}"
                           class="btn btn-secondary rounded-pill px-4 fw-semibold d-flex align-items-center"
                           style="background: #fff3e0; color: #ffb74d; border: none;">
                            Reset
                        </a>
                    @endif
                </form>
            </div>
            <div class="col-12 col-md-5 text-end mt-3 mt-md-0">
                <a href="{{ route('admin.articles.create') }}"
                   class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                   style="background: #ffb74d; border: none; color: white;">
                    <i class="bi bi-plus-lg me-2"></i> Add New Article
                </a>
            </div>
        </div>

        {{-- Articles Table --}}
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
                            {{-- Show image thumbnails if available --}}
                            @if($article->images)
                                <img src="{{ asset('storage/' . $article->images) }}" alt="Article Image" style="width: 60px; height: 40px; object-fit: cover; border-radius: 8px;">
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                        <td>
                            @if($article->active)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>{{ $article->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-warning rounded-3">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline">
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
        </div>

        {{-- Pagination --}}
        @if ($articles->hasPages())
            <div class="text-center mt-5">
                <p class="text-muted mb-3">
                    Page {{ $articles->currentPage() }} of {{ $articles->lastPage() }}
                </p>
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center" style="gap: 8px;">
                        {{-- Previous Page Link --}}
                        @if ($articles->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $articles->previousPageUrl() }}" rel="prev">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $current = $articles->currentPage();
                            $last = $articles->lastPage();
                            $window = 2;
                            $pages = [];
                            $pages[] = 1;
                            for ($i = $current - $window; $i <= $current + $window; $i++) {
                                if ($i > 1 && $i < $last) {
                                    $pages[] = $i;
                                }
                            }
                            if ($last > 1) {
                                $pages[] = $last;
                            }
                            $pages = array_values(array_unique($pages));
                            sort($pages);
                            $display = [];
                            $prev = null;
                            foreach ($pages as $p) {
                                if ($prev !== null && $p > $prev + 1) {
                                    $display[] = '...';
                                }
                                $display[] = $p;
                                $prev = $p;
                            }
                        @endphp
                        @foreach ($display as $item)
                            @if ($item === '...')
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @else
                                @php $url = $articles->url($item); @endphp
                                @if ($item == $current)
                                    <li class="page-item active">
                                        <span class="page-link border-0 shadow-sm"
                                              style="background: #FF85A2; color: #fff; font-weight: bold; border-radius: 12px;">
                                            {{ $item }}
                                        </span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link border-0 shadow-sm"
                                           style="background: #fff; color: #4fc3f7; border: 2px solid #4fc3f7; border-radius: 12px;"
                                           href="{{ $url }}">
                                            {{ $item }}
                                        </a>
                                    </li>
                                @endif
                            @endif
                        @endforeach

                        {{-- Next Page Link --}}
                        @if ($articles->hasMorePages())
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $articles->nextPageUrl() }}" rel="next">
                                    <i class="bi bi-chevron-right"></i>
                                </a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-right"></i>
                                </span>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</section>
@endsection