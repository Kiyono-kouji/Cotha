<!doctype html>
<html>
<head>
  <title>Checkout</title>
  <script type="text/javascript"
          src="https://app.sandbox.midtrans.com/snap/snap.js"
          data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
  <style>
    .btn { padding: 10px 16px; border-radius: 8px; border: none; color: #fff; cursor: pointer; }
    .btn-primary { background: #4fc3f7; }
    .btn-dark { background: #333; }
    .hidden { display: none; }
  </style>
</head>
<body>
  <p>Order: {{ $transaction_details['order_id'] }}</p>

  <div id="status" class="hidden"></div>

  <div id="actions">
    <button id="payBtn" class="btn btn-primary">Pay</button>
    <button id="payAgainBtn" class="btn btn-dark hidden">Pay again</button>
  </div>

  <script>
    const snapToken = "{{ $snapToken }}";
    const statusEl = document.getElementById('status');
    const payBtn = document.getElementById('payBtn');
    const payAgainBtn = document.getElementById('payAgainBtn');

    function openSnap() {
      window.snap.pay(snapToken, {
        onSuccess: function(result) {
          statusEl.classList.remove('hidden');
          statusEl.textContent = 'Payment successful';
          payAgainBtn.classList.remove('hidden'); // let user re-open popup
        },
        onPending: function(result) {
          statusEl.classList.remove('hidden');
          statusEl.textContent = 'Payment pending';
        },
        onError: function(result) {
          statusEl.classList.remove('hidden');
          statusEl.textContent = 'Payment failed. Try again.';
          payAgainBtn.classList.remove('hidden');
        },
        onClose: function() {
          // Popup closed; allow re-open
          payAgainBtn.classList.remove('hidden');
        }
      });
    }

    payBtn.addEventListener('click', openSnap);
    payAgainBtn.addEventListener('click', openSnap);
  </script>
</body>
</html>