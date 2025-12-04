@extends('layouts.app')

@section('title', 'COTHA - 1st CHOICE Coding & Technology Learning Center for KIDS')

@section('main_content')
<section style="overflow: hidden">
    {{-- Banner Section --}}
    <div class="container-fluid d-flex justify-content-center py-4" style="background: linear-gradient(180deg, #80c7e4 0%, #9ad2e9 100%);">
        <img 
            src="https://cotha.id/wp-content/uploads/2022/06/banner_cotha-4-scaled.jpg" 
            class="img-fluid w-100 rounded-4 shadow fade-in" 
            style="max-width: 900px;" 
            alt="COTHA Banner"
        >
    </div>

    {{-- Gradient Transition: Banner to Levels --}}
    <div style="height: 60px; background: linear-gradient(180deg, #9ad2e9 0%, #e3f6fd 100%);"></div>

    {{-- Levels Section --}}
    <div class="container-fluid py-5" style="background-color: #e3f6fd;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold gradient-text" style="letter-spacing: 1px;">Our Learning Levels</h2>
                    <p class="text-dark fs-5 mb-0 fade-in-up">
                        Choose the perfect learning path for your child's age and interests!
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($levels as $index => $level)
                    <div class="col-12 col-md-6 col-lg-3">
                        <a href="{{ url('/levels/' . $level->slug) }}" class="text-decoration-none">
                            <div class="card tilt-card h-100 shadow border-0 text-center fade-in-up delay-{{ ($index % 4) + 1 }}" style="background: #ffffff;">
                                @if($level->image)
                                    <div class="d-flex justify-content-center align-items-center p-3" style="background-color: #ffffff; border-radius: 0.5rem 0.5rem 0 0;">
                                        <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                                             class="img-fluid float"
                                             style="max-height: 150px; object-fit: contain;"
                                             alt="{{ $level->title }}">
                                    </div>
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="fw-bold mb-1" style="color: #234567;">{{ $level->title }}</h5>
                                    <p class="text-secondary mb-1" style="font-size: 0.95rem;">{{ $level->subtitle }}</p>
                                    <span class="badge rounded-pill mb-2 pulse" style="background-color: #4fc3f7; color: #ffffff; width: fit-content; margin: 0 auto;">
                                        {{ $level->age_range }}
                                    </span>
                                    <p class="text-dark small mb-0">
                                        {{ \Illuminate\Support\Str::limit($level->description, 80) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/levels') }}" class="btn btn-primary px-5 py-3 fw-semibold fs-5 rounded-pill shadow shake" style="background-color: #4fc3f7; border: none;">
                    View All Levels
                </a>
            </div>
        </div>
    </div>

    {{-- Gradient Transition: Levels to Stats --}}
    <div style="height: 60px; background: linear-gradient(180deg, #e3f6fd 0%, #ffffff 100%);"></div>

    {{-- Stats Section --}}
    <div class="container-fluid py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold gradient-text" style="letter-spacing: 1px;">Why Choose COTHA?</h2>
                    <p class="text-secondary fs-5 mb-0 fade-in-up">
                        Here's what makes us different
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow h-100 text-center tilt-card icon-spin scale-in delay-1" style="background: linear-gradient(135deg, #e3f6fd 0%, #ffffff 100%);">
                        <div class="card-body d-flex flex-column align-items-center py-5">
                            <div class="mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: #4fc3f7;">
                                <i class="bi bi-controller fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2 count-up" style="color: #234567;">9 dari 10</h3>
                            <p class="mb-0 text-dark">
                                Siswa Cotha Mampu<br>
                                Membuat Game Sendiri<br>
                                Setelah 1-2x Pertemuan<br>
                                Coding Class
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow h-100 text-center tilt-card icon-spin scale-in delay-2" style="background: linear-gradient(135deg, #e3f6fd 0%, #ffffff 100%);">
                        <div class="card-body d-flex flex-column align-items-center py-5">
                            <div class="mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: #f48acb;">
                                <i class="bi bi-globe2 fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2 count-up" style="color: #234567;">80%</h3>
                            <p class="mb-0 text-dark">
                                Kurikulum Cotha Diadopsi<br>
                                Dari Jerman Dan India<br>
                                Dengan Sistem Pembelajaran<br>
                                Project Based Learning
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="card border-0 shadow h-100 text-center tilt-card icon-spin scale-in delay-3" style="background: linear-gradient(135deg, #e3f6fd 0%, #ffffff 100%);">
                        <div class="card-body d-flex flex-column align-items-center py-5">
                            <div class="mb-3 rounded-circle d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; background-color: #80c7e4;">
                                <i class="bi bi-lightbulb fs-1 text-white"></i>
                            </div>
                            <h3 class="fw-bold mb-2 count-up" style="color: #234567;">100%</h3>
                            <p class="mb-0 text-dark">
                                Materi Dirancang Untuk<br>
                                Meningkatkan Kemampuan<br>
                                Computational Thinking &<br>
                                Kreativitas
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Gradient Transition: Stats to Methods --}}
    <div style="height: 60px; background: linear-gradient(180deg, #ffffff 0%, #e3f6fd 100%);"></div>

    {{-- Learning Methods Section --}}
    <div class="container-fluid py-5" style="background-color: #e3f6fd;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold gradient-text" style="letter-spacing: 1px;">COTHA Learning Methods</h2>
                    <p class="text-dark fs-5 mb-0 fade-in-up">
                        Click the method cards below to see more information about each method.
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @foreach($methods as $index => $method)
                    <div class="col-12 col-md-6 col-lg-4 d-flex">
                        <div class="card tilt-card shadow border-0 h-100 mx-auto flex-fill fade-in-up delay-{{ ($index % 3) + 1 }}" style="max-width: 340px; cursor:pointer; background: #ffffff;" data-bs-toggle="modal" data-bs-target="#methodModal{{ $method->id }}">
                            <div class="ratio ratio-1x1 rounded-top overflow-hidden d-flex align-items-center justify-content-center" style="background-color: #ffffff;">
                                <img src="{{ asset('storage/images/LearningMethods/' . $method->image) }}"
                                     alt="{{ $method->label }}"
                                     class="float"
                                     style="width: 100%; height: 100%; object-fit: contain; display: block;">
                            </div>
                            <div class="text-center py-4 rounded-bottom" style="background-color: #234567;">
                                <span class="fs-5 fw-semibold text-white">{{ $method->label }}</span>
                            </div>
                        </div>
                    </div>

                    {{-- Method Modal --}}
                    <div class="modal fade" id="methodModal{{ $method->id }}" tabindex="-1" aria-labelledby="methodModalLabel{{ $method->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0 shadow scale-in">
                                <div class="modal-header" style="background-color: #4fc3f7;">
                                    <h5 class="modal-title fw-bold text-white" id="methodModalLabel{{ $method->id }}">{{ $method->label }}: {{ $method->title }}</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" style="text-align: justify;">
                                    {{ $method->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Gradient Transition: Methods to Testimonials --}}
    <div style="height: 60px; background: linear-gradient(180deg, #e3f6fd 0%, #ffffff 100%);"></div>

    {{-- Testimonials Section --}}
    <div class="container-fluid py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold gradient-text" style="font-size: 2.5rem;">What Students Say</h2>
                    <p class="fs-5 fade-in-up" style="color: #234567;">
                        Our goal is to enhance student's technology skill in a fun way
                    </p>
                </div>
            </div>
            <div class="position-relative px-2 px-md-1" style="max-width: 1200px; margin: 0 auto;">
                <div id="testimonialCarousel" class="carousel slide" data-bs-ride="false">
                    <div class="carousel-inner pb-4">
                        @foreach($testimonials->chunk(3) as $chunkIndex => $testimonialChunk)
                            <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                                <div class="row g-4 justify-content-center align-items-stretch">
                                    @foreach($testimonialChunk as $index => $testimonial)
                                        <div class="col-12 col-md-4 d-flex justify-content-center">
                                            <div class="card border-0 shadow h-100 w-100 d-flex flex-column justify-content-between text-center p-4 tilt-card"
                                                 style="width: 340px; min-height: 340px; max-width: 340px; height: 340px; background: linear-gradient(135deg, #f8f9fa 0%, #ffffff 100%);">
                                                <div class="d-flex align-items-center justify-content-center flex-grow-1">
                                                    <p class="fst-italic text-dark mb-0">
                                                        "{{ \Illuminate\Support\Str::limit($testimonial->text, 120) }}"
                                                    </p>
                                                </div>
                                                <div class="mt-3">
                                                    <img src="{{ asset('storage/images/StudentPictures/' . $testimonial->photo) }}"
                                                         alt="{{ $testimonial->name }}"
                                                         class="rounded-circle mx-auto mb-2 shadow glow"
                                                         style="width: 90px; height: 90px; object-fit: cover; border: 3px solid #4fc3f7;">
                                                    <div class="fw-bold fs-5" style="color: #234567;">{{ $testimonial->name }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev d-none d-md-flex" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev" style="width: 50px;">
                        <span class="rounded-circle d-flex align-items-center justify-content-center pulse" style="width: 40px; height: 40px; background-color: #4fc3f7;">
                            <i class="bi bi-chevron-left text-white"></i>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next d-none d-md-flex" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next" style="width: 50px;">
                        <span class="rounded-circle d-flex align-items-center justify-content-center pulse" style="width: 40px; height: 40px; background-color: #4fc3f7;">
                            <i class="bi bi-chevron-right text-white"></i>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/testimonials') }}" class="btn btn-primary px-5 py-3 fw-semibold fs-5 rounded-pill shadow shake" style="background-color: #f48acb; border: none;">
                    See More Testimonials
                </a>
            </div>
        </div>
    </div>
    
    {{-- Gradient Transition: Testimonials to Projects --}}
    <div style="height: 60px; background: linear-gradient(180deg, #ffffff 0%, #e3f6fd 100%);"></div>

    {{-- Projects Section --}}
    <div class="container-fluid py-5" style="background-color: #e3f6fd;">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="fw-bold gradient-text" style="letter-spacing: 1px;">Student Projects</h2>
                    <p class="fs-5 fade-in-up" style="color: #f48acb;">
                        Explore creative games and apps made by our students during their learning journey at COTHA!
                    </p>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                @if(!empty($apiProjects) && count($apiProjects) > 0)
                    @foreach($apiProjects as $index => $project)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border-0 shadow h-100 tilt-card fade-in-up delay-{{ ($index % 3) + 1 }}" style="background: #ffffff;">
                                <img src="{{ $project['thumbnail'] ?? 'default.png' }}"
                                     class="card-img-top"
                                     style="height: 250px; object-fit: cover;"
                                     alt="{{ $project['title'] ?? 'Untitled' }}">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2" style="color: #234567;">{{ $project['title'] ?? 'Untitled' }}</h5>
                                    <p class="text-secondary mb-1">
                                        <i class="bi bi-person-fill me-1"></i> {{ $project['user']['name'] ?? 'Unknown' }}
                                    </p>
                                    <p class="text-secondary mb-0">
                                        <i class="bi bi-calendar-fill me-1"></i>
                                        {{ isset($project['created_at']) ? \Carbon\Carbon::parse($project['created_at'])->format('F Y') : '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    {{-- Fallback to local DB featured+active projects --}}
                    @foreach($projects as $index => $project)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card border-0 shadow h-100 tilt-card fade-in-up delay-{{ ($index % 3) + 1 }}" style="background: #ffffff;">
                                <img src="{{ asset('storage/images/StudentProjects/' . $project->image) }}"
                                     class="card-img-top"
                                     style="height: 250px; object-fit: cover;"
                                     alt="{{ $project->title }}">
                                <div class="card-body">
                                    <h5 class="fw-bold mb-2" style="color: #234567;">{{ $project->title }}</h5>
                                    <p class="text-secondary mb-1">
                                        <i class="bi bi-person-fill me-1"></i> {{ $project->creator }} {{ $project->creator_grade ? '(' . $project->creator_grade . ')' : '' }}
                                    </p>
                                    <p class="text-secondary mb-0">
                                        <i class="bi bi-calendar-fill me-1"></i>
                                        {{ $project->date ? \Carbon\Carbon::parse($project->date)->format('F Y') : '-' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="text-center mt-4">
                <a href="{{ url('/projects') }}" class="btn btn-primary px-5 py-3 fw-semibold fs-5 rounded-pill shadow shake glow" style="background-color: #4fc3f7; border: none;">
                    See More Projects
                </a>
            </div>
        </div>
    </div>

    {{-- Gradient Transition: Projects to Contact --}}
    <div style="height: 60px; background: linear-gradient(180deg, #e3f6fd 0%, #ffffff 100%);"></div>

    {{-- Contact Section --}}
    <div class="container-fluid py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row align-items-center g-5">
                {{-- CTA Section --}}
                <div class="col-12 col-lg-6 slide-in-left">
                    <div class="pe-lg-4">
                        <h2 class="fw-bold mb-3 gradient-text" style="font-size: 2.5rem;">Explore Our Levels</h2>
                        <p class="fs-5 mb-4 text-secondary">
                            Discover a wide range of coding courses designed for kids. From game development to web design, find the perfect path for your child's tech journey!
                        </p>
                        <a href="{{ url('/levels') }}" class="btn btn-lg px-5 py-3 fw-semibold shadow shake glow" style="background-color: #4fc3f7; border: none; color: white;">
                            Browse Levels
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                {{-- Contact Card --}}
                <div class="col-12 col-lg-6 slide-in-right">
                    <div class="card border-0 shadow-lg h-100 tilt-card" style="background: linear-gradient(135deg, #e3f6fd 0%, #ffffff 100%);">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-3" style="color: #234567;">Get In Touch</h3>
                            <p class="text-secondary mb-4">
                                Have questions or want to learn more about our programs? We're here to help!
                            </p>
                            <div class="d-flex flex-column gap-3">
                                <a href="mailto:hello@cotha.id" class="btn btn-lg d-flex align-items-center justify-content-center gap-2 shadow-sm shake" style="background-color: #4fc3f7; border: none; color: white;">
                                    <i class="bi bi-envelope-fill"></i>
                                    Email Us
                                </a>
                                <a href="https://www.instagram.com/cotha_id/" target="_blank"
                                   class="btn btn-lg d-flex align-items-center justify-content-center gap-2 shadow-sm shake"
                                   style="background: linear-gradient(45deg, #F58529, #FEDA77, #DD2A7B, #8134AF, #515BD4); border: none; color: white;">
                                    <i class="bi bi-instagram"></i>
                                    Instagram
                                </a>
                                <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang&app_absent=0" target="_blank" 
                                   class="btn btn-lg d-flex align-items-center justify-content-center gap-2 shadow-sm shake" 
                                   style="background-color: #25D366; border: none; color: white;">
                                    <i class="bi bi-whatsapp"></i>
                                    WhatsApp
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection