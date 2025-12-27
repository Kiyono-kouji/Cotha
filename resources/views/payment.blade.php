@extends('layouts.app')

@section('title', 'Event Payment')

@section('main_content')
<section style="overflow: hidden; position: relative;">
    <div class="container py-5">
        <div class="text-center mb-4">
            <h2 class="fw-bold mb-3" style="color: #2C3E50;">Complete Your Payment</h2>
            <p class="text-muted">Invoice: <strong>{{ $registration->invoice_number }}</strong></p>
            <p class="text-muted">Event: <strong>{{ $registration->event->title }}</strong></p>
            <h3 class="fw-bold" style="color: #4fc3f7;">Rp {{ number_format($registration->total_price, 0, ',', '.') }}</h3>
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
                
                // Optional: Make an AJAX call to verify status
                fetch('/api/check-payment-status/' + '{{ $registration->invoice_number }}')
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'paid') {
                            alert("Payment confirmed! Your registration is complete.");
                        }
                    });
                
                window.location.href = "{{ route('events.show', $registration->event_id) }}?payment=success";
            },
            onPending: function(result){
                console.log('Payment pending:', result);
                alert("Payment is being processed. We'll notify you once it's confirmed.");
                window.location.href = "{{ route('events.show', $registration->event_id) }}";
            },
            onError: function(result){
                console.log('Payment error:', result);
                alert("Payment failed. Please try again or contact support.");
            },
            onClose: function(){
                console.log('Payment popup closed');
                alert('You closed the payment window. Your registration is saved with invoice: {{ $registration->invoice_number }}');
            }
        });
    };
</script>
@endsection