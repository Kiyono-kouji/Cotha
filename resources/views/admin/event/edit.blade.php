@extends('layouts.app')

@section('title', 'Edit Event')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    {{-- Decorative Animated Waves --}}
    <div style="position: fixed; left: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="30" cy="0" r="8" fill="#4fc3f7" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="12s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>
    <div style="position: fixed; right: 0; top: 10%; height: 80%; width: 100px; z-index: 0; pointer-events: none;">
        <svg viewBox="0 0 100 1000" fill="none" xmlns="http://www.w3.org/2000/svg" style="width: 100%; height: 100%;">
            <circle cx="70" cy="0" r="8" fill="#FF85A2" opacity="0.3">
                <animate attributeName="cy" from="0" to="1000" dur="13s" repeatCount="indefinite"/>
                <animate attributeName="opacity" values="0.3;0.5;0.3" dur="3.5s" repeatCount="indefinite"/>
            </circle>
        </svg>
    </div>

    {{-- Hero Section --}}
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
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto;">
                        Edit Event
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Update the details for this event.
                    </p>
                </div>
            </div>
        </div>
        <div style="position: absolute; bottom: -1px; left: 0; width: 100%;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 120" style="display: block;">
                <path fill="#ffffff" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,58.7C960,64,1056,64,1152,58.7C1248,53,1344,43,1392,37.3L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </div>

    {{-- Form Section --}}
    <div class="container py-5 position-relative" style="z-index: 2; max-width: 700px;">
        <div class="card shadow-lg border-0 rounded-4 p-4" style="background: rgba(255,255,255,0.98);">
            <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-semibold">Category <span class="text-danger">*</span></label>
                    <select name="event_category_id" class="form-select rounded-3 border-2" style="border-color: #4fc3f7;" required>
                        <option value="" disabled>Select category</option>
                        @foreach(\App\Models\EventCategory::where('active', true)->orderBy('name')->get() as $cat)
                            <option value="{{ $cat->id }}" {{ old('event_category_id', $event->event_category_id) == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Title <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" required value="{{ old('title', $event->title) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Description</label>
                    <textarea name="description" class="form-control rounded-3 border-2" rows="3" style="border-color: #4fc3f7;">{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Image</label>
                    <input type="file" name="image" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;">
                    @if($event->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" style="max-width: 120px;" class="rounded-3 border">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Registration Type <span class="text-danger">*</span></label>
                    <select name="registration_type" class="form-select rounded-3 border-2" style="border-color: #4fc3f7;" required>
                        <option value="individual" {{ old('registration_type', $event->registration_type) == 'individual' ? 'selected' : '' }}>Individual</option>
                        <option value="team" {{ old('registration_type', $event->registration_type) == 'team' ? 'selected' : '' }}>Team</option>
                    </select>
                </div>
                <div class="mb-3" id="maxTeamMembersWrapper" style="display: none;">
                    <label class="form-label fw-semibold">Max Team Members</label>
                    <input type="number" name="max_team_members" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" min="2" max="20" value="{{ old('max_team_members', $event->max_team_members) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Price per Team (Rp) <span class="text-danger">*</span></label>
                    <input type="number" name="price_per_team" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" min="0" value="{{ old('price_per_team', $event->price_per_team) }}" required>
                    <small class="text-muted">Enter 0 for free events.</small>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Event Date & Time <span class="text-danger">*</span></label>
                    <input type="datetime-local" name="date" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" value="{{ old('date', $event->date ? $event->date->format('Y-m-d\TH:i') : '') }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Last Registration Date & Time</label>
                    <input type="datetime-local" name="last_registration_at" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" value="{{ old('last_registration_at', $event->last_registration_at ? $event->last_registration_at->format('Y-m-d\TH:i') : '') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Location</label>
                    <input type="text" name="location" class="form-control rounded-3 border-2" style="border-color: #4fc3f7;" value="{{ old('location', $event->location) }}">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-semibold">Result</label>
                    <textarea name="result" class="form-control rounded-3 border-2" rows="2" style="border-color: #4fc3f7;">{{ old('result', $event->result) }}</textarea>
                    <small class="text-muted">Fill this after the event if you want to display winners/results.</small>
                </div>
                <div class="text-center mt-4 d-flex flex-column flex-md-row align-items-center justify-content-center gap-3">
                    <button type="submit" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                            style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                        <i class="bi bi-check-circle me-2"></i>Update Event
                    </button>
                    <a href="{{ route('admin.events.index') }}" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
                       style="background: #e3f2fd; color: #1976D2; border: none;">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</section>
<script>
    // Show/hide max team members input based on registration type
    document.addEventListener('DOMContentLoaded', function() {
        const regType = document.querySelector('select[name="registration_type"]');
        const maxTeamWrapper = document.getElementById('maxTeamMembersWrapper');
        function toggleMaxTeam() {
            if (regType.value === 'team') {
                maxTeamWrapper.style.display = '';
            } else {
                maxTeamWrapper.style.display = 'none';
            }
        }
        regType.addEventListener('change', toggleMaxTeam);
        toggleMaxTeam();
    });
</script>
@endsection