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
                    <img src="{{ asset('images/StudentProjects/' . $project->image) }}"
                                 class="img-fluid rounded mb-3 d-block mx-auto"
                                 style="width: 100%; height: 270px; object-fit: cover;"
                                 alt="{{ $project->title }}">
                    <h4 class="fw-semibold mb-2">{{ $project->title }}</h4>
                    <div class="mb-1 text-secondary">Creator: {{ $project->creator }} ({{ $project->creator_grade }})</div>
                    <div class="mb-2 text-secondary">Date: {{ \Carbon\Carbon::parse($project->date)->format('F Y') }}</div>
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