@extends('layouts.app')

@section('title', 'Articles - COTHA')

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

    {{-- Decorative Animated Wave on Right Side --}}
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Hero Section with Banner Image Background --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 550px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 40px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                        Articles
                    </h1>
                    <p class="fs-4 mb-4" style="color: #ffffff; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                        Read the latest news, tips, and stories from COTHA.
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

    {{-- Articles Section --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center">
            @forelse($articles as $article)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow h-100" style="border-radius: 20px; background: white; overflow: hidden;">
                        {{-- Article Thumbnail --}}
                        <div class="position-relative" style="height: 220px; overflow: hidden;">
                            <img src="{{ $article->thumbnail ? asset('storage/images/Articles/' . $article->thumbnail) : ($article->image1 ? asset('storage/images/Articles/' . $article->image1) : asset('images/default_project.png')) }}"
                                 class="w-100 h-100"
                                 style="object-fit: cover;"
                                 alt="{{ $article->headline }}"
                                 loading="lazy"
                                 onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                            
                            {{-- Date Badge --}}
                            <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge rounded-pill px-3 py-2" style="background: rgba(0,0,0,0.6); color: #fff; font-size: 0.85rem;">
                                    <i class="bi bi-calendar3 me-1"></i>
                                    {{ $article->created_at->format('M j, Y') }}
                                </span>
                            </div>
                        </div>

                        <div class="card-body d-flex flex-column p-4">
                            {{-- Article Headline --}}
                            <h5 class="fw-bold mb-2" style="color: #2C3E50;">{{ $article->headline }}</h5>

                            {{-- Article Preview --}}
                            <p class="text-muted mb-3 flex-grow-1" style="font-size: 0.95rem; line-height: 1.6;">
                                {{ Str::limit(strip_tags($article->body), 120) }}
                            </p>

                            {{-- Read More Button --}}
                            <a href="{{ route('articles.show', $article->id) }}" 
                               class="btn mt-auto rounded-3" 
                               style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                                <i class="bi bi-book me-2"></i>Read More
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info rounded-4 text-center py-5 mb-0" style="border: none; background: transparent;">
                        <i class="bi bi-file-earmark-text fs-1 text-muted mb-3 d-block"></i>
                        <p class="text-muted mb-0">No articles available at the moment.</p>
                    </div>
                </div>
            @endforelse
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
                            $pages = collect([1]);
                            
                            for ($i = $current - $window; $i <= $current + $window; $i++) {
                                if ($i > 1 && $i < $last) {
                                    $pages->push($i);
                                }
                            }
                            
                            if ($last > 1) {
                                $pages->push($last);
                            }
                            
                            $pages = $pages->unique()->sort()->values();
                            $display = collect();
                            $prev = null;
                            
                            foreach ($pages as $p) {
                                if ($prev !== null && $p > $prev + 1) {
                                    $display->push('...');
                                }
                                $display->push($p);
                                $prev = $p;
                            }
                        @endphp
                        
                        @foreach ($display as $item)
                            @if ($item === '...')
                                <li class="page-item disabled"><span class="page-link">...</span></li>
                            @elseif ($item == $current)
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
                                       href="{{ $articles->url($item) }}">
                                        {{ $item }}
                                    </a>
                                </li>
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

    {{-- Decorative Shapes at Bottom --}}
    <div style="position: relative; margin-top: 60px;">
        <div style="position: absolute; bottom: 0; left: 0; width: 100%; height: 80px; pointer-events: none; z-index: 0;">
            <svg width="100%" height="80" viewBox="0 0 1440 80" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="120" cy="40" r="24" fill="#4fc3f7" opacity="0.12"/>
                <circle cx="1320" cy="50" r="32" fill="#FF85A2" opacity="0.12"/>
                <rect x="700" y="20" width="48" height="48" rx="16" fill="#FFB74D" opacity="0.10"/>
            </svg>
        </div>
    </div>
</section>
@endsection