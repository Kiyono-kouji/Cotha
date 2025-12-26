@extends('layouts.app')

@section('title', 'Student Projects - COTHA')

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
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-6 text-white pt-5 mt-5 text-lg-start text-center ps-lg-5" style="margin-top: 8rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 3rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.2); max-width: 520px;">
                        Student Projects
                    </h1>
                    <p class="fs-4 mb-4" style="font-size: 1.5rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.15); max-width: 520px;">
                        Explore creative games and apps made by our students at COTHA!
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

    {{-- Projects Section --}}
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="row g-4 justify-content-center">
            @foreach($projects as $project)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card border-0 shadow h-100" style="border-radius: 20px; background: white; overflow: hidden;">
                        {{-- Project Thumbnail --}}
                        <div class="position-relative" style="height: 200px; overflow: hidden;">
                            <img src="{{ $project['thumbnail'] ?? asset('images/default_project.png') }}"
                                 class="w-100 h-100"
                                 style="object-fit: cover;"
                                 alt="{{ $project['title'] ?? 'Untitled' }}"
                                 onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                            {{-- Featured Badge --}}
                            @if(!empty($project['is_featured']))
                                <div class="position-absolute top-0 end-0 m-2">
                                    <span class="badge" style="background: linear-gradient(135deg, #FFB74D 0%, #FF9800 100%); font-size: 0.75rem;">
                                        <i class="bi bi-star-fill me-1"></i>Featured
                                    </span>
                                </div>
                            @endif
                        </div>
                        <div class="card-body d-flex flex-column p-4">
                            {{-- Project Title --}}
                            <h5 class="fw-bold mb-2" style="color: #2C3E50;">{{ $project['title'] ?? 'Untitled' }}</h5>
                            {{-- Creator Info --}}
                            <div class="d-flex align-items-center mb-2">
                                {{-- Profile Picture --}}
                                @if(!empty($project['user']['profile_picture']))
                                    <img src="{{ $project['user']['profile_picture'] }}"
                                         alt="{{ $project['user']['name'] ?? 'Student' }}"
                                         class="rounded-circle me-2"
                                         style="width: 56px; height: 56px; object-fit: cover; border: 3px solid #e3f2fd;">
                                @else
                                    <div class="rounded-circle d-flex align-items-center justify-content-center me-2"
                                         style="width: 56px; height: 56px; background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%);">
                                        <i class="bi bi-person-fill text-white fs-3"></i>
                                    </div>
                                @endif
                                <div>
                                    <small class="text-secondary d-block" style="font-size: 0.95rem;">
                                        <strong>{{ $project['user']['name'] ?? 'Unknown' }}</strong>
                                    </small>
                                    <small class="text-muted d-block" style="font-size: 0.85rem;">
                                        {{ $project['user']['school'] ?? 'School not listed' }}
                                        @if(!empty($project['user']['age']))
                                            <span class="ms-2 badge rounded-pill" style="background: #e3f2fd; color: #1976D2;">
                                                Age: {{ $project['user']['age'] }}
                                            </span>
                                        @endif
                                    </small>
                                </div>
                            </div>
                            {{-- Project Date --}}
                            <small class="text-muted mb-3">
                                <i class="bi bi-calendar3 me-1"></i>
                                {{ isset($project['created_at']) ? \Carbon\Carbon::parse($project['created_at'])->format('F Y') : '-' }}
                            </small>
                            {{-- Play Button --}}
                            <a href="{{ $project['url'] }}" 
                               target="_blank" 
                               class="btn mt-auto rounded-3" 
                               style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                                <i class="bi bi-play-circle me-2"></i>Play Project
                            </a>
                        </div>
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
                    <ul class="pagination justify-content-center" style="gap: 8px;">
                        {{-- Previous Page Link --}}
                        @if ($projects->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link border-0 shadow-sm" style="background: #e3f2fd; color: #b0bec5; border-radius: 12px;">
                                    <i class="bi bi-chevron-left"></i>
                                </span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $projects->previousPageUrl() }}" rel="prev">
                                    <i class="bi bi-chevron-left"></i>
                                </a>
                            </li>
                        @endif

                        {{-- Pagination Elements --}}
                        @php
                            $current = $projects->currentPage();
                            $last = $projects->lastPage();
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
                                @php $url = $projects->url($item); @endphp
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
                        @if ($projects->hasMorePages())
                            <li class="page-item">
                                <a class="page-link border-0 shadow-sm"
                                   style="background: #FF85A2; color: #fff; border-radius: 12px;"
                                   href="{{ $projects->nextPageUrl() }}" rel="next">
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