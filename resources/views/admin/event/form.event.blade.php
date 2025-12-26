<div class="mb-3">
    <label class="form-label">Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $event->title ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
    @if(!empty($event->image))
        <img src="{{ asset('storage/'.$event->image) }}" alt="Event Image" style="max-width: 120px;" class="mt-2">
    @endif
</div>
<div class="mb-3">
    <label class="form-label">Category</label>
    <select name="category" class="form-control" required>
        @foreach(['offline','online','competition','workshop','seminar'] as $cat)
            <option value="{{ $cat }}" {{ old('category', $event->category ?? '') == $cat ? 'selected' : '' }}>{{ ucfirst($cat) }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Date & Time</label>
    <input type="datetime-local" name="date" class="form-control" value="{{ old('date', isset($event->date) ? \Carbon\Carbon::parse($event->date)->format('Y-m-d\TH:i') : '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Location</label>
    <input type="text" name="location" class="form-control" value="{{ old('location', $event->location ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Is this a Free Event?</label>
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="isFreeEvent"
               name="is_free"
               {{ old('is_free', (isset($event) && (strtolower($event->price) === 'free' || $event->price == '0' || $event->price == null)) ? 'checked' : '') }}>
        <label class="form-check-label" for="isFreeEvent">Yes, this event is free</label>
    </div>
</div>
<div class="mb-3" id="priceInputWrapper">
    <label class="form-label">Price (Rp)</label>
    <input type="text" name="price" id="priceInput" class="form-control"
           value="{{ old('price', (isset($event) && is_numeric($event->price)) ? $event->price : '') }}">
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const isFreeCheckbox = document.getElementById('isFreeEvent');
    const priceInputWrapper = document.getElementById('priceInputWrapper');
    const priceInput = document.getElementById('priceInput');
    function togglePrice() {
        if (isFreeCheckbox.checked) {
            priceInputWrapper.style.display = 'none';
            priceInput.value = '';
        } else {
            priceInputWrapper.style.display = '';
        }
    }
    isFreeCheckbox.addEventListener('change', togglePrice);
    togglePrice();
});
</script>
