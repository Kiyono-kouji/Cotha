@extends('layouts.app')

@section('title', $level->title . ' - COTHA')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Wave on Left Side --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.1"/>
        </svg>
    </div>
    {{-- Decorative Animated Wave on Right Side --}}
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.1"/>
        </svg>
    </div>

    {{-- Hero Section --}}
    <div class="container-fluid py-5 position-relative" style="min-height: 340px; margin-top: 80px;">
        <div class="container position-relative" style="z-index: 1;">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-5 text-center mb-4 mb-md-0 d-flex align-items-center justify-content-center">
                    @if($level->image)
                        <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                            class="img-fluid w-100 h-100"
                            style="object-fit: cover; max-width: 100%; max-height: 340px; border-radius: 16px;"
                            alt="{{ $level->title }}">
                    @else
                        <img src="{{ asset('images/default_project.png') }}"
                            class="img-fluid w-100 h-100"
                            style="object-fit: cover; max-width: 100%; max-height: 340px; border-radius: 16px;"
                            alt="Default Level Image">
                    @endif
                </div>
                <div class="col-12 col-md-7">
                    <h1 class="fw-bold mb-2" style="color: #2C3E50; font-size: 2.2rem;">{{ $level->title }}</h1>
                    <h4 class="text-secondary mb-2">{{ $level->subtitle }}</h4>
                    @if($level->age_range)
                        <div class="mb-2">
                            <span class="badge rounded-pill px-3 py-2" style="background: #4fc3f7; color: white; font-size: 1rem;">
                                <i class="bi bi-person-fill me-2"></i>{{ $level->age_range }}
                            </span>
                        </div>
                    @endif
                    <p class="fs-6 mb-0" style="line-height: 1.7; color: #2C3E50;">
                        {{ $level->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Decorative shapes for hero section --}}
    <div style="position: absolute; top: 30px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 0;"></div>
    <div style="position: absolute; top: 80px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 0; transform: rotate(45deg);"></div>
    <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 0;"></div>

    {{-- Classes Section with Tabs --}}
    <div class="container py-5 mt-3">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-2" style="color: #2C3E50; font-size: 2rem;">Available Classes</h2>
            <p class="text-secondary fs-6">Choose the class that fits your learning journey!</p>
        </div>

        @if($classes->count() > 0)
            {{-- Tab Navigation --}}
            <ul class="nav nav-tabs justify-content-center mb-4" id="classesTab" role="tablist" style="border-bottom: 2px solid #e3f2fd;">
                @foreach($classes as $index => $class)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $index === 0 ? 'active' : '' }} px-4 py-2"
                                id="class-tab-{{ $class->id }}"
                                data-bs-toggle="tab"
                                data-bs-target="#class-content-{{ $class->id }}"
                                type="button"
                                role="tab"
                                style="font-weight: 500; color: #1976D2;">
                            {{ $class->level }}
                        </button>
                    </li>
                @endforeach
            </ul>

            {{-- Tab Content --}}
            <div class="tab-content" id="classesTabContent">
                @foreach($classes as $index => $class)
                    {{-- Class Detail Tab Content --}}
                    <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                         id="class-content-{{ $class->id }}"
                         role="tabpanel">
                        <div class="row justify-content-center align-items-center g-4">
                            @if($class->image)
                                <div class="col-12 col-md-3 text-center d-flex align-items-center justify-content-center">
                                    <div class="w-100" style="aspect-ratio: 1/1; max-width: 120px; background: #E3F2FD; border-radius: 16px; overflow: hidden;">
                                        <img src="{{ asset('storage/images/ClassesResources/' . $class->image) }}"
                                             alt="{{ $class->title }}"
                                             class="w-100 h-100"
                                             style="object-fit: cover;">
                                    </div>
                                </div>
                            @endif
                            <div class="col">
                                <h3 class="fw-bold mb-2" style="color: #2C3E50;">{{ $class->title }}</h3>
                                <span class="badge rounded-pill px-3 py-2 mb-2" style="background-color: #4fc3f7; color: #fff; font-size: 1rem;">
                                    Level {{ $class->level }}
                                </span>
                                <span class="ms-2 text-secondary small">
                                    <i class="bi bi-calendar-check me-1"></i>{{ $class->meeting_info }}
                                </span>
                                <p class="text-secondary mt-2 mb-2" style="font-size: 1rem;">
                                    {{ $class->description }}
                                </p>
                                @if(!empty($class->note))
                                    <div class="alert mt-2 py-2 px-3" style="background-color: #E3F2FD; border: none; border-radius: 10px; font-size: 0.95rem; color: #1976D2;">
                                        <i class="bi bi-info-circle me-2"></i>{{ $class->note }}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-4 g-4 justify-content-center">
                            @if($class->requirements && count($class->requirements))
                                <div class="col-12">
                                    <div class="card rounded-4 border shadow-lg p-4" style="background: #f8fbfd; border: 2px solid #4fc3f7;">
                                        <h3 class="fw-bold text-center mb-4" style="color: #4fc3f7; font-size: 2rem;">
                                            <i class="bi bi-laptop me-2"></i>Requirements
                                        </h3>
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 justify-content-center">
                                            @foreach($class->requirements as $req)
                                                <div class="col d-flex">
                                                    <div class="card w-100 h-100 rounded-3 border shadow-sm d-flex align-items-center justify-content-center p-3"
                                                         style="background: #fff; border: 2px solid #e3f2fd;">
                                                        <span class="fw-semibold text-dark text-center" style="font-size: 1.15rem;">{{ $req }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($class->concepts && count($class->concepts))
                                <div class="col-12">
                                    <div class="card rounded-4 border shadow-lg p-4" style="background: #f8fbfd; border: 2px solid #4fc3f7;">
                                        <h3 class="fw-bold text-center mb-4" style="color: #4fc3f7; font-size: 2rem;">
                                            <i class="bi bi-gear me-2"></i>Concepts
                                        </h3>
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 justify-content-center">
                                            @foreach($class->concepts as $concept)
                                                <div class="col d-flex">
                                                    <div class="card w-100 h-100 rounded-3 border shadow-sm d-flex align-items-center justify-content-center p-3"
                                                         style="background: #fff; border: 2px solid #e3f2fd;">
                                                        <span class="fw-semibold text-dark text-center" style="font-size: 1.15rem;">{{ $concept }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($class->projects && count($class->projects))
                                <div class="col-12">
                                    <div class="card rounded-4 border shadow-lg p-4" style="background: #f8fbfd; border: 2px solid #4fc3f7;">
                                        <h3 class="fw-bold text-center mb-4" style="color: #4fc3f7; font-size: 2rem;">
                                            <i class="bi bi-controller me-2"></i>Sample Projects
                                        </h3>
                                        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3 justify-content-center">
                                            @foreach($class->projects as $project)
                                                <div class="col d-flex">
                                                    <div class="card w-100 h-100 rounded-3 border shadow-sm d-flex align-items-center justify-content-center p-3"
                                                         style="background: #fff; border: 2px solid #e3f2fd;">
                                                        <span class="fw-semibold text-dark text-center" style="font-size: 1.15rem;">{{ $project }}</span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="bi bi-inbox fs-1 text-muted mb-3 d-block"></i>
                <p class="text-muted">No classes available for this level yet.</p>
            </div>
        @endif
    </div>

    {{-- Back Button --}}
    <div class="container pb-5">
        <div class="text-center d-flex flex-column flex-md-row justify-content-center align-items-center gap-3">
            <a href="{{ url('/levels') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake w-100 w-md-auto"
               style="background-color: #4fc3f7; border: none; color: white;">
                <i class="bi bi-arrow-left me-2"></i>
                Back to Levels
            </a>
            <a href="{{ route('registertrial') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow shake w-100 w-md-auto"
               style="background-color: #FF85A2; border: none; color: white;">
                <i class="bi bi-pencil-square me-2"></i>Register & More Info
            </a>
        </div>
    </div>

    {{-- General Registration Modal --}}
    <div class="modal fade" id="registerModalGeneral" tabindex="-1" aria-labelledby="registerModalGeneralLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow" style="border-radius: 16px;">
                <div class="modal-header" style="background: #4fc3f7; border-radius: 16px 16px 0 0;">
                    <h5 class="modal-title text-white fw-bold" id="registerModalGeneralLabel">
                        Register for a Class
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4" style="background-color: #F5F5F5;">
                    <form method="POST" action="{{ route('public.register-class') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Child's Name</label>
                            <input type="text" name="child_name" class="form-control rounded-pill" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Date of Birth</label>
                            <input type="date" name="dob" class="form-control rounded-pill" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">School</label>
                            <input type="text" name="school" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">City</label>
                            <input type="text" name="city" class="form-control rounded-pill">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">WhatsApp Number</label>
                            <input type="tel" name="wa" class="form-control rounded-pill" placeholder="+6281234332110" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Language</label>
                            <select name="language" class="form-select rounded-pill">
                                <option value="Bahasa">Bahasa</option>
                                <option value="English">English</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Coding Experience</label>
                            <select name="coding_experience" class="form-select rounded-pill">
                                <option value="Belum pernah">Never</option>
                                <option value="Pernah sedikit">A Little</option>
                                <option value="Sudah cukup">Quite a Lot</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color:#2C3E50;">Notes / Questions</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="Any questions or additional notes?" style="border-radius: 12px;"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-lg px-4 py-2 fw-semibold rounded-pill shadow"
                                    style="background-color: #4fc3f7; border: none; color: white;">
                                Submit Registration
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Decorative shapes for bottom section --}}
    <div style="position: absolute; bottom: 40px; right: 100px; width: 70px; height: 70px; border-radius: 30%; background: #FF85A2; opacity: 0.1; z-index: 0; transform: rotate(45deg);"></div>
    <div style="position: absolute; bottom: 60px; left: 120px; width: 60px; height: 60px; border-radius: 30%; background: #FFB74D; opacity: 0.1; z-index: 0; transform: rotate(45deg);"></div>
</section>
@endsection