@extends('layouts.app')

@section('title', $level->title . ' - COTHA')

@section('main_content')
<div class="container my-5">
    <div class="row justify-content-center px-5 px-md-1">
        <div class="col-12 text-center mb-4">
            @if($level->image)
                <img src="{{ asset('storage/images/LevelResources/' . $level->image) }}"
                    class="img-fluid mb-3 d-block mx-auto"
                    style="width: 100%; max-width: 600px; height: auto; object-fit: contain;"
                    alt="{{ $level->title }}">
            @endif
            <h2 class="fw-bold" style="color: #4fc3f7;">{{ $level->title }}</h2>
            <div class="mb-2 text-secondary fs-5">
                {{ $level->subtitle }}
                @if($level->age_range)
                    <span class="ms-2 badge rounded-pill" style="background-color: #e3f6fd; color: #234567;">
                        {{ $level->age_range }}
                    </span>
                @endif
            </div>
            <p class="text-dark" style="line-height: 1.7;">
                {{ $level->description }}
            </p>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4 justify-content-center px-5 px-md-1">
        @foreach($classes as $class)
            <div class="col d-flex">
                <div class="card h-100 shadow border-0 flex-fill d-flex flex-column">
                    @if($class->image)
                        <div class="d-flex justify-content-center align-items-center mb-3" style="height: 120px;">
                            <img src="{{ asset('storage/images/ClassesResources/' . $class->image) }}"
                                 alt="{{ $class->title }}"
                                 style="max-width: 100px; max-height: 100px; object-fit: contain;">
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h4 class="fw-semibold mb-2">{{ $class->title }}</h4>
                        <div class="mb-1 text-secondary fw-bold">Level {{ $class->level }}</div>
                        <div class="mb-2 text-dark fw-semibold">Jumlah pertemuan: {{ $class->meeting_info }}</div>
                        <p class="mb-2 text-dark" style="font-size: 0.95rem;">
                            {{ $class->description }}
                        </p>
                        @if(!empty($class->note))
                            <div class="mb-2 text-dark">
                                {{ $class->note }}
                            </div>
                        @endif
                        @if($class->requirements)
                            <div class="mb-2">
                                <b>Kebutuhan perangkat:</b>
                                <ul>
                                    @foreach($class->requirements as $req)
                                        <li>{{ $req }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($class->concepts)
                            <div class="mb-2">
                                <b>Konsep yang diajarkan:</b>
                                <ul>
                                    @foreach($class->concepts as $concept)
                                        <li>{{ $concept }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if($class->projects)
                            <div class="mb-2">
                                <b>Contoh Project Game:</b>
                                <ul>
                                    @foreach($class->projects as $project)
                                        <li>{{ $project }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="mt-auto d-flex justify-content-center mb-4">
                            <button
                                type="button"
                                class="btn px-3 py-2 mt-2 rounded-pill"
                                style="background-color: #4fc3f7; border: none; color: #ffffff;"
                                data-bs-toggle="modal"
                                data-bs-target="#registerModal{{ $class->id }}"

                            >
                                Register & More Info
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Registration Modal -->
            <div class="modal fade" id="registerModal{{ $class->id }}" tabindex="-1" aria-labelledby="registerModalLabel{{ $class->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content" style="border: none;">
                        <div class="modal-header" style="background-color: #4fc3f7; color: #ffffff; border: none;">
                            <h5 class="modal-title" id="registerModalLabel{{ $class->id }}">Register: {{ $class->title }} ({{ $class->level }})</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="background-color: #e3f6fd;">
                            <form method="POST" action="{{ route('public.register-class') }}">
                                @csrf
                                <input type="hidden" name="class_id" value="{{ $class->id }}">
                                <input type="hidden" name="class_title" value="{{ $class->title }}">
                                <input type="hidden" name="class_level" value="{{ $class->level }}">

                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Nama Anak</label>
                                    <input type="text" name="child_name" class="form-control" id="regName{{ $class->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Tanggal Lahir</label>
                                    <input type="date" name="dob" class="form-control" id="regDob{{ $class->id }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Sekolah</label>
                                    <input type="text" name="school" class="form-control" id="regSchool{{ $class->id }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Kota</label>
                                    <input type="text" name="city" class="form-control" id="regCity{{ $class->id }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Nomor telepon</label>
                                    <input type="tel" name="wa" class="form-control" id="regWa{{ $class->id }}" placeholder="+6281234332110" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Bahasa</label>
                                    <select name="language" class="form-select" id="regLang{{ $class->id }}">
                                        <option value="Bahasa">Bahasa</option>
                                        <option value="English">English</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Sudah pernah belajar coding?</label>
                                    <select name="coding_experience" class="form-select" id="regEver{{ $class->id }}">
                                        <option value="Belum pernah">Belum pernah</option>
                                        <option value="Pernah sedikit">Pernah sedikit</option>
                                        <option value="Sudah cukup">Sudah cukup</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold" style="color:#234567;">Catatan / Question</label>
                                    <textarea name="note" class="form-control" id="regNote{{ $class->id }}" rows="3" placeholder="Pertanyaan atau catatan tambahan"></textarea>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn rounded-pill" style="background-color: #4fc3f7; border: none; color: #ffffff;">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12 text-center">
            <a href="{{ url('/levels') }}" class="btn btn-primary btn-lg px-5 py-3 mt-4 fw-semibold rounded-pill shadow shake" style="background-color: #b3e0f7; border: none;">
                <i class="bi bi-arrow-left me-2"></i>
                Go Back to Levels
            </a>
        </div>
    </div>
</div>
@endsection