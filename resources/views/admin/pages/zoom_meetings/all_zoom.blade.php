@extends('admin.layouts.main')

@section('content')
@php
  $base = \Illuminate\Support\Facades\Route::has('admin.zoom-meetings.index')
    ? 'admin.zoom-meetings'
    : 'zoom-meetings';
@endphp

<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold mb-0 text-primary">Zoom Meetings</h4>
    <a href="{{ route($base.'.create') }}" class="btn btn-primary shadow-sm">
      <i class="fas fa-plus me-1"></i> Add Meeting
    </a>
  </div>

  @if(session('success'))
    <div class="alert alert-success shadow-sm border-0 rounded-3">
      <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
    </div>
  @endif

  <div class="card shadow-sm border-0 rounded-3">
    <div class="table-responsive">
      <table class="table align-middle mb-0">
        <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color: #fff;">
          <tr>
            <th class="px-3 py-3">ID</th>
            <th class="px-3 py-3">Image</th>
            <th class="px-3 py-3">Title</th>
            <th class="py-3">Meeting ID</th>
            <th class="py-3">Starts At</th>
            <th class="py-3">Duration</th>
            <th class="py-3">Status</th>
            <th class="py-3 text-center">Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($meetings as $meeting)
            <tr class="border-bottom">
              <td class="fw-semibold">{{ $loop->iteration }}</td>

              <td>
                <img src="{{ $meeting->image_path ? asset($meeting->image_path) : asset('assets/images/zoom-meetings/zoom-meeting-01.jpg') }}"
                     alt="{{ $meeting->title }}"
                     class="rounded shadow-sm"
                     style="width: 90px; height: 60px; object-fit: cover;">
              </td>

              <td class="fw-semibold">{{ $meeting->title }}</td>
              <td><code>{{ $meeting->meeting_id }}</code></td>
              <td>{{ optional($meeting->starts_at)->format('M d, Y g:i A') ?? '—' }}</td>
              <td>{{ $meeting->duration_minutes ?? '—' }} min</td>
              <td>
                @if($meeting->is_published)
                  <span class="badge bg-success"><i class="fas fa-check me-1"></i>Published</span>
                @else
                  <span class="badge bg-secondary"><i class="fas fa-clock me-1"></i>Draft</span>
                @endif
              </td>

              <td class="text-center">
                {{-- Edit --}}
                <a href="{{ route($base.'.edit', $meeting) }}" class="text-primary me-2" title="Edit Meeting">
                  <i class="fas fa-edit fa-lg"></i>
                </a>

                {{-- Delete --}}
                <form action="{{ route($base.'.destroy', $meeting) }}" method="POST" class="d-inline">
                  @csrf @method('DELETE')
                  <button type="submit" class="btn btn-link text-danger p-0 m-0" title="Delete Meeting"
                          onclick="return confirm('Delete this meeting?')">
                    <i class="fas fa-trash-alt fa-lg"></i>
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center text-muted py-4">
                <i class="fas fa-info-circle me-2"></i> No meetings found.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    @if($meetings instanceof \Illuminate\Pagination\AbstractPaginator)
      <div class="d-flex justify-content-center mt-3">
        {{ $meetings->links() }}
      </div>
    @endif
  </div>
</div>
@endsection
