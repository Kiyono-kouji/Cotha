@extends('layouts.app')

@section('title', 'Event Payment')

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
                 alt="Payment Banner"
                 style="width: 100%; height: 100%; object-fit: cover; object-position: center center;" />
            <div style="position: absolute; top: 40px; left: 60px; width: 60px; height: 60px; border-radius: 50%; background: #4fc3f7; opacity: 0.12; z-index: 1;"></div>
            <div style="position: absolute; top: 120px; right: 80px; width: 80px; height: 80px; border-radius: 30%; background: #FF85A2; opacity: 0.10; z-index: 1; transform: rotate(45deg);"></div>
            <div style="position: absolute; bottom: 30px; left: 120px; width: 50px; height: 50px; border-radius: 50%; background: #FFB74D; opacity: 0.10; z-index: 1;"></div>
        </div>
        <div class="container position-relative" style="z-index: 1;">
            <div class="row align-items-center justify-content-center">
                <div class="col-12 col-lg-8 text-white pt-5 mt-5 text-center" style="margin-top: 6rem !important;">
                    <h1 class="fw-bold mb-3" style="font-size: 2.2rem; line-height: 1.2; text-shadow: 1px 1px 2px rgba(0,0,0,0.18); max-width: 700px; margin: 0 auto;">
                        Complete Your Payment
                    </h1>
                    <p class="fs-5 mb-4" style="font-size: 1.1rem; text-shadow: 1px 1px 2px rgba(0,0,0,0.12); max-width: 600px; margin: 0 auto;">
                        Please review your registration details and proceed to payment to confirm your spot.
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

    {{-- Payment Summary and Button --}}
    <div class="container py-5">
        <div class="text-center mb-4">
            <p class="text-muted">Invoice: <strong>{{ $registration->invoice_number }}</strong></p>
            <p class="text-muted">Event: <strong>{{ $registration->event->title }}</strong></p>
            <h3 class="fw-bold" style="color: #4fc3f7;">Rp {{ number_format($registration->total_price, 0, ',', '.') }}</h3>
        </div>

        {{-- Registration Summary --}}
        <div class="card shadow-lg border-0 rounded-4 mb-5" style="background: rgba(255,255,255,0.98);">
            <div class="card-body">
                <h4 class="fw-bold mb-3" style="color: #1976D2;">Registration Summary</h4>
                <dl class="row mb-0">
                    <dt class="col-sm-4 fw-semibold text-secondary">Guardian Name</dt>
                    <dd class="col-sm-8">{{ $registration->guardian_name }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Guardian Email</dt>
                    <dd class="col-sm-8">{{ $registration->guardian_email }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Guardian Phone</dt>
                    <dd class="col-sm-8">{{ $registration->guardian_phone }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Event</dt>
                    <dd class="col-sm-8">{{ $registration->event->title }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Teams</dt>
                    <dd class="col-sm-8">{{ $registration->total_teams }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Total Price</dt>
                    <dd class="col-sm-8">Rp {{ number_format($registration->total_price, 0, ',', '.') }}</dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Payment Status</dt>
                    <dd class="col-sm-8">
                        @if($registration->payment_status === 'paid')
                            <span class="badge bg-success">Paid</span>
                        @elseif($registration->payment_status === 'failed')
                            <span class="badge bg-danger">Failed</span>
                        @else
                            <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                    </dd>
                    <dt class="col-sm-4 fw-semibold text-secondary">Registered At</dt>
                    <dd class="col-sm-8">{{ $registration->created_at->setTimezone('Asia/Jakarta')->format('Y-m-d H:i') }}</dd>
                </dl>
                @if($registration->teams && count($registration->teams))
                    <hr>
                    <h5 class="fw-bold mb-3">Teams & Members</h5>
                    @foreach($registration->teams as $team)
                        <div class="mb-3">
                            <strong>Team {{ $loop->iteration }}</strong>
                            <ul class="mb-0">
                                @foreach($team['participants'] as $member)
                                    <li>
                                        {{ $member['name'] ?? '-' }}
                                        @if(!empty($member['email']))
                                            ({{ $member['email'] }})
                                        @endif
                                        @if(!empty($member['school']))
                                            - {{ $member['school'] }}
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="text-center">
            <button id="pay-button" class="btn btn-lg px-5 py-3 fw-semibold rounded-4 shadow" 
                    style="background: linear-gradient(135deg, #4fc3f7 0%, #80c7e4 100%); border: none; color: white;">
                <i class="bi bi-credit-card me-2"></i>Pay Now
            </button>
        </div>
    </div>
</section>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script type="text/javascript">
    document.getElementById('pay-button').onclick = function(){
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                console.log('Payment success:', result);
                
                // Build WhatsApp message
                const message = encodeURIComponent(
                    "Hi COTHA,\n\n" +
                    "I have successfully completed payment for:\n" +
                    "Event: {{ $registration->event->title }}\n" +
                    "Invoice: {{ $registration->invoice_number }}\n" +
                    "Total Teams: {{ $registration->total_teams }}\n" +
                    "Total Price: Rp {{ number_format($registration->total_price, 0, ',', '.') }}\n\n" +
                    "Guardian Name: {{ $registration->guardian_name }}\n" +
                    "Email: {{ $registration->guardian_email }}\n" +
                    "Phone: {{ $registration->guardian_phone }}\n\n" +
                    "Please confirm my registration. Thank you!"
                );
                
                const phone = encodeURIComponent('+6281234332110');
                const whatsappUrl = `https://api.whatsapp.com/send/?phone=${phone}&text=${message}&app_absent=0`;
                
                // Open WhatsApp in new tab
                window.open(whatsappUrl, '_blank');
                
                // Redirect to event page after a short delay
                setTimeout(function() {
                    window.location.href = "{{ route('events.show', $registration->event_id) }}?payment=success";
                }, 1000);
            },
            onPending: function(result){
                console.log('Payment pending:', result);
                alert("Payment is being processed. We'll notify you once it's confirmed.");
                window.location.href = "{{ route('events.show', $registration->event_id) }}";
            },
            onError: function(result){
                console.log('Payment error:', result);
                alert("Payment failed. Please try again or contact support.");
            }
        });
    };
</script>
@endsection