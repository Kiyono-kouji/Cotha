@extends('layouts.app')

@section('title', 'Student Projects - COTHA')

@section('main_content')
<div class="container my-5">
    <h2 class="fw-bold text-dark text-center mb-2" style="letter-spacing: 1px;">COTHA Student Projects</h2>
    <p class="text-center text-secondary fs-5 mb-4">
        Explore all creative games and apps made by our students during their learning journey at COTHA!
    </p>
    <div class="row g-5 justify-content-center px-5 px-md-1">
        @foreach($projects as $project)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="bg-white rounded-3 shadow p-3 h-100 d-flex flex-column">
                    <img src="{{ $project['thumbnail'] ?? 'default.png' }}"
                         class="img-fluid rounded mb-3 d-block mx-auto"
                         style="width: 100%; height: 270px; object-fit: cover;"
                         alt="{{ $project['title'] ?? 'Untitled' }}">
                    <h4 class="fw-semibold mb-2">{{ $project['title'] ?? 'Untitled' }}</h4>
                    <div class="mb-1 text-secondary">
                        Creator: {{ $project['user']['name'] ?? 'Unknown' }}
                    </div>
                    <div class="mb-2 text-secondary">
                        Date: {{ isset($project['created_at']) ? \Carbon\Carbon::parse($project['created_at'])->format('F Y') : '-' }}
                    </div>
                    <a href="{{ $project['url'] }}" target="_blank" class="btn btn-primary mt-auto">Play Project</a>
                </div>
            </div>
        @endforeach
    </div>
    @if ($projects->hasPages())
        <div class="text-center mt-5">
            <p class="text-muted mb-3">
                Page {{ $projects->currentPage() }} of {{ $projects->lastPage() }}
            </p>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($projects->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $projects->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif

                    @php
                        $current = $projects->currentPage();
                        $last = $projects->lastPage();
                        $window = 2; // how many pages to show on each side of current
                        $pages = [];

                        // Always include first and last
                        $pages[] = 1;
                        for ($i = $current - $window; $i <= $current + $window; $i++) {
                            if ($i > 1 && $i < $last) {
                                $pages[] = $i;
                            }
                        }
                        if ($last > 1) {
                            $pages[] = $last;
                        }

                        // Unique and sorted
                        $pages = array_values(array_unique($pages));
                        sort($pages);

                        // Build display with ellipses
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
                            @php $url = $projects->url($item); @endphp
                            @if ($item == $current)
                                <li class="page-item active"><span class="page-link">{{ $item }}</span></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $item }}</a></li>
                            @endif
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($projects->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $projects->nextPageUrl() }}" rel="next">Next</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link">Next</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    @endif
</div>
@endsection