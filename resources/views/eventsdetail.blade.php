@extends('layouts.app')

@section('title', $event->title . ' - COTHA Events')

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
    <div class="container-fluid py-5 position-relative" style="min-height: 400px;">
        <div style="position: absolute; inset: 0; width: 100%; height: 100%; z-index: 0;">
            <img src="{{ asset('images/WelcomePage/MainBanner.jpg') }}"
                 alt="Hero Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; inset: 0; background: rgba(0,0,0,0.1);"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center pt-5 mt-5">
                <div class="col-12 text-white text-center">
                    <a href="{{ route('events.index') }}" class="btn btn-light rounded-pill px-4 py-2 mb-3">
                        <i class="bi bi-arrow-left me-2"></i>Back to Events
                    </a>
                    <h1 class="fw-bold mb-3" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
                        {{ $event->title }}
                    </h1>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); font-size: 0.9rem;">
                            <i class="bi bi-tag me-1"></i>{{ $event->category->name }}
                        </span>
                        <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); font-size: 0.9rem;">
                            <i class="bi bi-calendar3 me-1"></i>{{ $event->date->format('M j, Y') }}
                        </span>
                        <span class="badge rounded-pill px-3 py-2" style="background: rgba(255,255,255,0.2); backdrop-filter: blur(10px); font-size: 0.9rem;">
                            <i class="bi bi-clock me-1"></i>{{ $event->date->format('H:i') }} WIB
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Event Content --}}
    <div class="container py-5 position-relative" style="z-index: 2; margin-top: -80px;">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show rounded-4 shadow" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow d-flex align-items-center" role="alert">
                <i class="bi bi-exclamation-triangle me-3 fs-3 flex-shrink-0"></i>
                <div>
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="row g-4">
            {{-- Left Column: Event Details --}}
            <div class="col-12 col-lg-7">
                <div class="card border-0 shadow-lg rounded-4 p-4 mb-4">
                    {{-- Event Image --}}
                    <div class="mb-4 rounded-4 overflow-hidden">
                        <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/default_project.png') }}"
                             alt="{{ $event->title }}"
                             class="w-100"
                             style="max-height: 400px; object-fit: cover;"
                             onerror="this.onerror=null;this.src='{{ asset('images/default_project.png') }}';">
                    </div>

                    <h3 class="fw-bold mb-3" style="color: #2C3E50;">
                        <i class="bi bi-info-circle me-2" style="color: #4fc3f7;"></i>Event Details
                    </h3>
                    <p class="text-muted mb-4" style="line-height: 1.8;">
                        {{ $event->description }}
                    </p>

                    {{-- Event Info Grid --}}
                    <div class="row g-3 mb-4">
                        <div class="col-12 col-sm-6">
                            <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="bi bi-calendar-event" style="color: #4fc3f7; font-size: 1.2rem;"></i>
                                    <span class="fw-semibold" style="color: #2C3E50;">Date</span>
                                </div>
                                <p class="mb-0 text-muted">{{ $event->date->format('l, F j, Y') }}</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="bi bi-clock" style="color: #4fc3f7; font-size: 1.2rem;"></i>
                                    <span class="fw-semibold" style="color: #2C3E50;">Time</span>
                                </div>
                                <p class="mb-0 text-muted">{{ $event->date->format('H:i') }} WIB</p>
                            </div>
                        </div>
                        @if($event->location)
                            <div class="col-12">
                                <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                    <div class="d-flex align-items-center gap-2 mb-1">
                                        <i class="bi bi-geo-alt" style="color: #4fc3f7; font-size: 1.2rem;"></i>
                                        <span class="fw-semibold" style="color: #2C3E50;">Location</span>
                                    </div>
                                    <p class="mb-0 text-muted">{{ $event->location }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="col-12 col-sm-6">
                            <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="bi bi-{{ $event->isTeamBased() ? 'people' : 'person' }}" style="color: #4fc3f7; font-size: 1.2rem;"></i>
                                    <span class="fw-semibold" style="color: #2C3E50;">Registration Type</span>
                                </div>
                                <p class="mb-0 text-muted">
                                    {{ $event->isTeamBased() ? 'Team Based' : 'Individual' }}
                                    @if($event->isTeamBased())
                                        <br><small>(Max {{ $event->max_team_members }} members per team)</small>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="p-3 rounded-3" style="background: #f8f9fa;">
                                <div class="d-flex align-items-center gap-2 mb-1">
                                    <i class="bi bi-cash-coin" style="color: #4fc3f7; font-size: 1.2rem;"></i>
                                    <span class="fw-semibold" style="color: #2C3E50;">Price per Team</span>
                                </div>
                                <p class="mb-0 fw-bold" style="color: {{ $event->isFree() ? '#4caf50' : '#FF85A2' }}; font-size: 1.1rem;">
                                    {{ $event->isFree() ? 'FREE' : 'Rp ' . number_format($event->price_per_team, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>

                    @if($event->result)
                        <div class="alert alert-info rounded-4" role="alert">
                            <h5 class="alert-heading"><i class="bi bi-trophy me-2"></i>Results</h5>
                            <p class="mb-0">{!! nl2br(e($event->result)) !!}</p>
                        </div>
                    @endif

                    @if($event->last_registration_at)
                        <div class="d-flex align-items-center gap-2 text-muted" style="font-size: 0.9rem;">
                            <i class="bi bi-calendar-check" style="color: #4fc3f7;"></i>
                            <span>Last Registration: {{ $event->last_registration_at->format('D, M j, Y H:i') }}</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right Column: Registration Form --}}
            <div class="col-12 col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 p-4 sticky-top" style="top: 100px;">
                    <h3 class="fw-bold mb-4" style="color: #2C3E50;">
                        <i class="bi bi-pencil-square me-2" style="color: #4fc3f7;"></i>Register Now
                    </h3>

                    @if(!$event->last_registration_at || now()->lessThanOrEqualTo($event->last_registration_at))
                        {{-- Registration Form --}}
                        <form action="{{ route('events.register', $event) }}" method="POST" id="registrationForm">
                            @csrf
                            
                            {{-- Guardian Information --}}
                            <div class="mb-4">
                                <h5 class="fw-semibold mb-3" style="color: #2C3E50;">Guardian Information</h5>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Guardian Name <span class="text-danger">*</span></label>
                                    <input type="text" name="guardian_name" class="form-control rounded-3" value="{{ old('guardian_name') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Guardian Phone <span class="text-danger">*</span></label>
                                    <input
                                        type="tel"
                                        name="guardian_phone"
                                        class="form-control rounded-3"
                                        value="{{ old('guardian_phone') }}"
                                        required
                                        placeholder="+6281234332110"
                                        pattern="^\+?\d{9,15}$"
                                        inputmode="tel"
                                        title="Enter a valid phone number, e.g. +6281234332110">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Guardian Email <span class="text-danger">*</span></label>
                                    <input
                                        type="email"
                                        name="guardian_email"
                                        class="form-control rounded-3"
                                        value="{{ old('guardian_email') }}"
                                        required
                                        placeholder="parent@email.com"
                                        maxlength="255"
                                    >
                                </div>
                            </div>

                            <hr class="my-4">

                            {{-- Teams Container --}}
                            <div id="teamsContainer">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="fw-semibold mb-0" style="color: #2C3E50;">
                                        Teams
                                    </h5>
                                    <button type="button" class="btn btn-sm rounded-pill" style="background: #4fc3f7; color: white;" onclick="addTeam()">
                                        <i class="bi bi-plus-lg me-1"></i>Add Team
                                    </button>
                                </div>

                                {{-- Team Template (will be cloned) --}}
                                <div class="team-item mb-4 p-3 rounded-3" style="background: #f9f9fa; border: 2px solid #e9ecef;">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="fw-semibold mb-0" style="color: #2C3E50;">
                                            <span class="team-number">Team 1</span>
                                        </h6>
                                        <button type="button" class="btn btn-sm btn-danger rounded-pill remove-team" style="display: none;" onclick="removeTeam(this)">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Team Name <span class="text-danger">*</span></label>
                                        <input type="text" name="teams[0][team_name]" class="form-control rounded-3" required>
                                    </div>

                                    {{-- Team Members Container --}}
                                    <div class="participants-container">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <label class="form-label fw-semibold mb-0">Team Members</label>
                                            @if($event->isTeamBased())
                                                <button type="button" class="btn btn-sm btn-outline-primary rounded-pill add-participant">
                                                    <i class="bi bi-plus-lg me-1"></i>Add Team Member
                                                </button>
                                            @endif
                                        </div>

                                        <div class="participant-item mb-3 p-3 rounded-3" style="background: white; border: 1px solid #dee2e6;">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <small class="fw-semibold text-muted participant-number">Member 1</small>
                                                <button type="button" class="btn btn-sm btn-link text-danger remove-participant p-0" style="display: none;" onclick="removeParticipant(this)">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </div>
                                            <div class="mb-2">
                                                <input type="text" name="teams[0][participants][0][name]" class="form-control form-control-sm rounded-3 mb-2" placeholder="Full Name *" required>
                                            </div>
                                            <div class="mb-2">
                                                <input type="email" name="teams[0][participants][0][email]" class="form-control form-control-sm rounded-3 mb-2" placeholder="Email *" required>
                                            </div>
                                            <div>
                                                <input type="text" name="teams[0][participants][0][school]" class="form-control form-control-sm rounded-3" placeholder="School *" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Price Summary --}}
                            <div class="alert rounded-4 mb-4" style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); color: white; border: none;">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Estimated Total</h6>
                                        <small id="priceBreakdown">0 teams × Rp {{ number_format($event->price_per_team, 0, ',', '.') }}</small>
                                    </div>
                                    <h4 class="mb-0 fw-bold" id="totalPrice">Rp 0</h4>
                                </div>
                            </div>

                            <button type="submit" class="btn w-100 py-3 fw-semibold rounded-pill" style="background: linear-gradient(135deg, #FF85A2 0%, #FFA2B8 100%); border: none; color: white; font-size: 1.1rem;">
                                <i class="bi bi-check-circle me-2"></i>Complete Registration
                            </button>
                        </form>
                    @else
                        <div class="alert alert-warning rounded-4 text-center py-4">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            Registration for this event closed on
                            <strong>{{ $event->last_registration_at->format('D, M j, Y H:i') }}</strong>.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Contact Us Section --}}
    <div class="container py-5 mt-5">
        <div class="rounded-4 shadow-lg p-5 text-center" style="border: none;">
            <h2 class="fw-bold mb-4" style="color: #2C3E50; font-size: 2rem;">
                Need help or have questions?
            </h2>
            <p class="text-secondary mb-4 fs-5">
                Contact our team via WhatsApp for assistance or more information about this event.
            </p>
            <a href="https://api.whatsapp.com/send/?phone=%2B6281234332110&text=Hi+COTHA%2C%0A%0AI have a question about the event: {{ $event->title }}&app_absent=0"
               class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow"
               style="background-color: #4fc3f7; border: none; color: white;">
                <i class="bi bi-whatsapp me-2"></i>
                Contact Us on WhatsApp
            </a>
        </div>
    </div>
</section>

<script>
let teamIndex = 0;
const maxTeamMembers = {{ $event->max_team_members ?? 1 }};
const isTeamBased = {{ $event->isTeamBased() ? 'true' : 'false' }};
const pricePerTeam = {{ $event->price_per_team }};

function addTeam() {
    teamIndex++;
    const container = document.getElementById('teamsContainer');
    const template = container.querySelector('.team-item').cloneNode(true);

    // Update team number (will be corrected by updateTeamNumbers)
    template.querySelector('.team-number').textContent = `Team ${teamIndex + 1}`;

    // Update input names for team name
    const teamNameInput = template.querySelector('input[name*="team_name"]');
    teamNameInput.name = `teams[${teamIndex}][team_name]`;
    teamNameInput.value = '';

    // Clear and update participant inputs: keep only the first participant
    const participantInputs = template.querySelectorAll('.participant-item');
    participantInputs.forEach((item, idx) => {
        if (idx > 0) item.remove();
    });

    // Update the first participant's input names and values
    const firstParticipant = template.querySelector('.participant-item');
    firstParticipant.querySelectorAll('input').forEach((input, idx) => {
        const fieldName = idx === 0 ? 'name' : idx === 1 ? 'email' : 'school';
        input.name = `teams[${teamIndex}][participants][0][${fieldName}]`;
        input.value = '';
    });

    // Reset member number label
    firstParticipant.querySelector('.participant-number').textContent = 'Member 1';

    // Hide remove button for the first participant
    firstParticipant.querySelector('.remove-participant').style.display = 'none';

    // Show remove team button
    template.querySelector('.remove-team').style.display = 'inline-block';

    container.appendChild(template);
    updateTeamNumbers();
    updatePriceCalculation();
    updateRemoveButtons();
    updateAddMemberButtons();
}

function removeTeam(button) {
    button.closest('.team-item').remove();
    updateTeamNumbers();
    updatePriceCalculation();
    updateRemoveButtons();
    updateAddMemberButtons();
}

function removeParticipant(button) {
    const participantsContainer = button.closest('.participants-container');
    const participants = participantsContainer.querySelectorAll('.participant-item');

    if (participants.length <= 1) {
        alert('At least one team member is required');
        return;
    }

    button.closest('.participant-item').remove();
    updateParticipantNumbers(participantsContainer);
    updatePriceCalculation();
    updateRemoveButtons();
    updateAddMemberButtons();
}

function updateTeamNumbers() {
    document.querySelectorAll('.team-item').forEach((team, idx) => {
        team.querySelector('.team-number').textContent = isTeamBased ? `Team ${idx + 1}` : `Team ${idx + 1}`;
    });
}

function updateParticipantNumbers(container) {
    container.querySelectorAll('.participant-item').forEach((item, idx) => {
        item.querySelector('.participant-number').textContent = `Member ${idx + 1}`;
    });
}

function updatePriceCalculation() {
    const teams = document.querySelectorAll('.team-item').length;
    const total = teams * pricePerTeam;
    
    document.getElementById('priceBreakdown').textContent =
        `${teams} team${teams !== 1 ? 's' : ''} × Rp ${pricePerTeam.toLocaleString('id-ID')}`;
    document.getElementById('totalPrice').textContent = `Rp ${total.toLocaleString('id-ID')}`;
}

function updateRemoveButtons() {
    const teams = document.querySelectorAll('.team-item');
    teams.forEach((team) => {
        const removeBtn = team.querySelector('.remove-team');
        removeBtn.style.display = teams.length > 1 ? 'inline-block' : 'none';
        
        const participants = team.querySelectorAll('.participant-item');
        participants.forEach((participant) => {
            const removeParticipantBtn = participant.querySelector('.remove-participant');
            if (removeParticipantBtn) {
                removeParticipantBtn.style.display = participants.length > 1 ? 'inline-block' : 'none';
            }
        });
    });
}

function updateAddMemberButtons() {
    document.querySelectorAll('.team-item').forEach((team) => {
        const addBtn = team.querySelector('.add-participant');
        if (!addBtn) return;
        const members = team.querySelectorAll('.participant-item').length;
        if (members >= maxTeamMembers) {
            addBtn.disabled = true;
            addBtn.classList.add('disabled');
        } else {
            addBtn.disabled = false;
            addBtn.classList.remove('disabled');
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    // Add participant button handler
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('add-participant') || e.target.closest('.add-participant')) {
            const button = e.target.closest('.add-participant');
            const teamItem = button.closest('.team-item');
            const participantsContainer = teamItem.querySelector('.participants-container');
            const currentParticipants = participantsContainer.querySelectorAll('.participant-item').length;

            if (currentParticipants >= maxTeamMembers) {
                alert(`Maximum ${maxTeamMembers} members per team`);
                return;
            }

            const teamIdx = Array.from(document.querySelectorAll('.team-item')).indexOf(teamItem);
            const participantIdx = currentParticipants;

            // Always clone only the FIRST participant-item as a template
            const participantTemplate = participantsContainer.querySelector('.participant-item').cloneNode(true);

            // Clear input values and update names
            participantTemplate.querySelector('.participant-number').textContent = `Member ${participantIdx + 1}`;
            participantTemplate.querySelectorAll('input').forEach((input, idx) => {
                const fieldName = idx === 0 ? 'name' : idx === 1 ? 'email' : 'school';
                input.name = `teams[${teamIdx}][participants][${participantIdx}][${fieldName}]`;
                input.value = '';
            });

            participantTemplate.querySelector('.remove-participant').style.display = 'inline-block';
            participantsContainer.appendChild(participantTemplate);
            updatePriceCalculation();
            updateRemoveButtons();
            updateAddMemberButtons();
        }
    });

    // Initial setup
    updatePriceCalculation();
    updateAddMemberButtons();
    updateRemoveButtons();

    // Update price when inputs change
    document.getElementById('teamsContainer').addEventListener('input', function() {
        updatePriceCalculation();
    });
});
</script>
@endsection