@extends('layouts.app')

@section('title', 'Events')

@section('main_content')
<section class="py-4" style="background: #f8f9fa;">
  <div class="container">

    <div class="p-4 text-center">
      <!-- Make header like the pic -->
      <h1 class="fw-bold text-info mb-1" style="letter-spacing: 1px;">Events</h1>
      <p class="text-muted mb-0">Discover upcoming activities and sessions</p>
    </div>

    <div class="mt-4 bg-white border rounded p-3">
      <ul class="nav nav-pills overflow-auto flex-nowrap">
        <li class="nav-item">
          <a class="nav-link {{ empty($category) ? 'active' : '' }}" href="{{ route('events.index') }}">All</a>
        </li>
        @foreach(['offline','online','competition','workshop','seminar'] as $cat)
          <li class="nav-item">
            <a class="nav-link {{ ($category === $cat) ? 'active' : '' }}" href="{{ route('events.index', ['category' => $cat]) }}">
              {{ ucfirst($cat) }}
            </a>
          </li>
        @endforeach
      </ul>
    </div>

    <div class="mt-4">
      <h2 class="h5 text-dark">Latest Events</h2>
      @if($events->count() === 0)
        <div class="bg-white border rounded p-4 text-center text-muted">
          No events found{{ $category ? " for ".ucfirst($category) : '' }}.
        </div>
      @else
        <div class="row g-4 mt-1">
          @foreach($events as $event)
            <div class="col-12 col-sm-6 col-lg-4">
              <div class="card h-100 shadow-sm border-0">
                <div class="ratio ratio-16x9 bg-light">
                  <img src="{{ $event->image }}" alt="{{ $event->title }}" class="img-fluid rounded-top object-fit-cover">
                </div>
                <div class="card-body">
                  <div class="small text-uppercase text-muted">{{ $event->category }}</div>
                  <h3 class="h6 mt-1 text-dark mb-2">{{ $event->title }}</h3>
                  <div class="d-flex flex-column gap-1 small text-muted">
                    <span class="d-inline-flex align-items-center gap-2">
                      <i class="bi bi-calendar-event"></i>
                      {{ optional($event->date)->format('D, M j, Y') }}
                    </span>
                    <span class="d-inline-flex align-items-center gap-2">
                      <i class="bi bi-wifi"></i>
                      {{ in_array($event->category, ['online','offline']) ? ucfirst($event->category) : 'Offline' }}
                    </span>
                  </div>
                  <div class="mt-2 text-danger fw-semibold">{{ $event->price }}</div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
        <div class="mt-4 d-flex justify-content-center">
          {{ $events->links() }}
        </div>
      @endif
    </div>

  </div>
</section>
@endsection