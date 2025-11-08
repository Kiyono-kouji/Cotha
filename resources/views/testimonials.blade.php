@extends('layouts.app')

@section('title', 'Testimonials - COTHA')

@section('main_content')
<div class="container py-5 px-5 px-md-1">
    <h2 class="fw-bold text-center mb-5 text-info">Student Testimonials</h2>
    
    <div class="row g-4 justify-content-center">
        @forelse ($testimonials as $t)
            <div class="col-md-6 col-xl-4">
                <div class="card h-100 border-0 shadow-sm bg-light position-relative">
                    <!-- Quote Icon -->
                    <div class="position-absolute top-0 start-0 m-3">
                        <div class="bg-info bg-gradient text-white d-flex align-items-center justify-content-center rounded-3 shadow-sm" style="width: 45px; height: 45px; font-size: 28px;">
                            ❝
                        </div>
                    </div>
                    
                    <div class="card-body d-flex flex-column text-center pt-5 px-4 pb-4">
                        <!-- Photo -->
                        @if($t->photo)
                            <img src="{{ asset('storage/images/StudentPictures/' . $t->photo) }}" 
                                 class="rounded-circle mx-auto mb-3 mt-3 shadow" 
                                 width="110" height="110" 
                                 alt="{{ $t->name }}"
                                 style="object-fit: cover">
                        @else
                            <div class="rounded-circle mx-auto mb-3 mt-3 shadow bg-info bg-gradient d-flex align-items-center justify-content-center" style="width: 110px; height: 110px;">
                                <span class="text-white fs-1 fw-bold">{{ substr($t->name, 0, 1) }}</span>
                            </div>
                        @endif
                        
                        <!-- Testimonial Text -->
                        <p class="flex-grow-1 mb-4 fst-italic text-muted lh-lg">
                            "{{ $t->text }}"
                        </p>
                        
                        <!-- Name and Title -->
                        <h5 class="fw-bold mb-1 text-dark">{{ $t->name }}</h5>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info mb-0 text-center border-0 shadow-sm">
                    <i class="fas fa-info-circle me-2"></i>No testimonials available at the moment.
                </div>
            </div>
        @endforelse
    </div>

    @if ($testimonials->hasPages())
        <div class="text-center mt-5">
            <p class="text-muted mb-3">
                Page {{ $testimonials->currentPage() }} of {{ $testimonials->lastPage() }}
            </p>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{-- Previous Page Link --}}
                    @if ($testimonials->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link">Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $testimonials->previousPageUrl() }}" rel="prev">Previous</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($testimonials->getUrlRange(1, $testimonials->lastPage()) as $page => $url)
                        @if ($page == $testimonials->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($testimonials->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $testimonials->nextPageUrl() }}" rel="next">Next</a>
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