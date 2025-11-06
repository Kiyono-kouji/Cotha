@extends('layout.default-layout')

@section('title', 'COTHA - 1st CHOICE Coding & Technology Learning Center for KIDS')

@section('main_content')
<section style="overflow: hidden">
    <div class="container-fluid mb-3 d-flex justify-content-center" style="background-color: #9ad2e9;">
        <img 
            src="https://cotha.id/wp-content/uploads/2022/06/banner_cotha-4-scaled.jpg" 
            class="img-fluid w-100" 
            style="max-width: 900px;" 
            alt="Description"
        >
    </div>
    {{-- Data --}}
    <div class="container my-5 px-5 px-md-1">
        <div class="row g-4 justify-content-center">
            <div class="col-12 col-md-4">
                <div class="card border-2 border-pink shadow-sm h-100 text-center">
                    <div class="card-body d-flex flex-column align-items-center shadow">
                        <div class="mb-2">
                            <i class="bi bi-controller fs-1 text-danger"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-danger">9 dari 10</h3>
                        <hr class="w-25 mx-auto border-danger opacity-75">
                        <p class="mb-0 text-dark small">
                            Siswa Cotha Mampu<br>
                            Membuat Game Sendiri<br>
                            Setelah 1-2x Pertemuan<br>
                            Coding Class
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-2 border-pink shadow-sm h-100 text-center">
                    <div class="card-body d-flex flex-column align-items-center shadow">
                        <div class="mb-2">
                            <i class="bi bi-globe2 fs-1 text-primary"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-primary">80%</h3>
                        <hr class="w-25 mx-auto border-primary opacity-75">
                        <p class="mb-0 text-dark small">
                            Kurikulum Cotha Diadopsi<br>
                            Dari Jerman Dan India<br>
                            Dengan Sistem Pembelajaran<br>
                            Project Based Learning Yang Menarik
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="card border-2 border-pink shadow-sm h-100 text-center">
                    <div class="card-body d-flex flex-column align-items-center shadow">
                        <div class="mb-2">
                            <i class="bi bi-lightbulb fs-1 text-warning"></i>
                        </div>
                        <h3 class="fw-bold mb-2 text-warning">100%</h3>
                        <hr class="w-25 mx-auto border-warning opacity-75">
                        <p class="mb-0 text-dark small">
                            Materi Cotha Dirancang<br>
                            Untuk Meningkatkan<br>
                            Kemampuan Computational Thinking,<br>
                            Yang Berguna Untuk Mengembangkan<br>
                            Kecerdasan & Kreativitas
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Learning Methods --}}
    <div class="container-fluid my-5 mt-4 py-4 rounded-4" style="background-color: #e3f6fd;">
        <div class="row">
            <div class="col-12 text-center mb-2">
                <h2 class="fw-bold text-dark" style="letter-spacing: 1px;">COTHA Learning Methods</h2>
            </div>
            <div class="col-12 text-center mb-5">
                <p class="text-secondary mb-0 fs-6">Click the method cards below to see more information about each method.</p>
            </div>
        </div>
        <div class="row g-4 justify-content-center mx-3 mx-md-5">
            @foreach($methods as $method)
                <div class="col-10 col-sm-8 col-md-4 col-lg-3">
                    <div class="card info-card shadow-lg border-0 h-100 mx-auto" style="max-width: 270px; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#methodModal{{ $method->id }}">
                        <div class="ratio ratio-1x1 rounded-top overflow-hidden d-flex align-items-center justify-content-center" style="background-color: #ffffff;">
                            <img src="{{ asset('images/LearningMethods/' . $method->image) }}"
                                 alt="{{ $method->label }}"
                                 style="width: 100%; height: 100%; object-fit: contain; display: block;">
                        </div>
                        <div class="bg-dark text-white text-center py-4 rounded-bottom">
                            <span class="fs-5 fw-semibold letter-spacing-1">{{ $method->label }}</span>
                        </div>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="methodModal{{ $method->id }}" tabindex="-1" aria-labelledby="methodModalLabel{{ $method->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fw-bold" id="methodModalLabel{{ $method->id }}">{{ $method->label }}: {{ $method->title }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
    {{-- Testimonies --}}
    <div class="container my-5 pb-5" style="min-height: 420px; overflow: hidden">
        <div class="row align-items-end mb-5">
            <div class="col-12 text-center mb-3">
                <h2 class="fw-bold" style="color: #f48acb; font-size: 2.5rem;">What Students Say</h2>
                <h5 class="fw-semibold" style="color: #4fc3f7;">
                    Our goal is to enhance student's technology skill in a fun way
                </h5>
            </div>
        </div>
        <div class="position-relative mb-5 px-2 px-md-1" style="max-width: 1200px; margin: 0 auto; min-height: 300px; overflow: hidden">
            <div id="testimonialCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner pb-5">
                    @foreach($testimonials->chunk(3) as $chunkIndex => $testimonialChunk)
                        <div class="carousel-item {{ $chunkIndex === 0 ? 'active' : '' }}">
                            <div class="row g-4 justify-content-center align-items-stretch">
                                @foreach($testimonialChunk as $testimonial)
                                    <div class="col-12 col-md-4 d-flex justify-content-center">
                                        <div class="card border-0 shadow h-100 w-100 d-flex flex-column text-center p-4" style="width: 100%; max-width: 340px;">
                                            <p class="fst-italic text-dark mb-3 grow">
                                                "{{ $testimonial->text }}"
                                            </p>
                                            <img src="{{ asset('images/StudentPictures/' . $testimonial->photo) }}" alt="{{ $testimonial->name }}" class="rounded-circle border-3 border-dark mx-auto mb-2" style="width: 90px; height: 90px; object-fit: cover;">
                                            <div class="fw-bold fs-5 text-dark">{{ $testimonial->name }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev d-none d-md-block" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next d-none d-md-block" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true" style="filter: invert(1);"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ url('/testimonials') }}" class="btn btn-primary px-5 py-3 fw-semibold fs-4 rounded-pill shadow animated-btn" style="background-color: #4fc3f7; border: none;">
                See More Testimonials
            </a>
        </div>
    </div>
    {{-- Projects --}}
    <div class="container-fluid" style="background-color: #e3f6fd;">
        <div class="container mt-5 pt-4 px-5 pb-5 px-md-1">
            <h2 class="fw-bold text-center mb-2" style="letter-spacing: 1px; color: #4fc3f7;">Student Projects</h2>
            <p class="text-center fs-5 mb-5" style="color: #f48acb;">
                Explore creative games and apps made by our students during their learning journey at COTHA!
            </p>
            <div class="row g-5 justify-content-center">
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
            <div class="text-center mt-4">
                <a href="{{ url('/projects') }}" class="btn btn-primary px-5 py-3 fw-semibold fs-4 rounded-pill shadow animated-btn" style="background-color: #4fc3f7; border: none;">
                    See More Projects
                </a>
            </div>
        </div>
    </div>
    {{-- Courses & Contact Section --}}
    <div class="container-fluid py-5" style="background-color: #ffffff;">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Courses Section -->
                <div class="col-12 col-lg-6">
                    <div class="pe-lg-4">
                        <h2 class="fw-bold mb-3 text-dark" style="font-size: 2.5rem;">Explore Our Courses</h2>
                        <p class="fs-5 mb-4 text-secondary">
                            Discover a wide range of coding courses designed for kids. From game development to web design, find the perfect path for your child's tech journey!
                        </p>
                        <a href="{{ url('/courses') }}" class="btn btn-primary btn-lg px-5 py-3 fw-semibold shadow animated-btn" style="background-color: #4fc3f7; border: none;">
                            Browse Courses
                            <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Contact Section -->
                <div class="col-12 col-lg-6">
                    <div class="card border-0 shadow-lg h-100">
                        <div class="card-body p-5">
                            <h3 class="fw-bold mb-3" style="color: #4fc3f7;">Get In Touch</h3>
                            <p class="text-secondary mb-4">
                                Have questions or want to learn more about our programs? We're here to help!
                            </p>
                            <div class="d-flex flex-column gap-3">
                                <a href="mailto:hello@cotha.id" class="btn btn-lg d-flex align-items-center justify-content-center gap-2" style="background-color: #4fc3f7; border: none; color: white;">
                                    <i class="bi bi-envelope-fill"></i>
                                    Email Us
                                </a>
                                <a href="https://www.instagram.com/cotha_id/" target="_blank"
                                class="btn btn-lg d-flex align-items-center justify-content-center gap-2"
                                style="background: linear-gradient(45deg, #F58529, #FEDA77, #DD2A7B, #8134AF, #515BD4); border: none; color: white;">
                                    <i class="bi bi-instagram"></i>
                                    Instagram
                                </a>
                                <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0ASaya+ingin+bertanya+tentang&app_absent=0" target="_blank" class="btn btn-success btn-lg d-flex align-items-center justify-content-center gap-2" style="background-color: #25D366; border: none;">
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