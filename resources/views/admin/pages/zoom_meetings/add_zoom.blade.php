@extends('admin.layouts.main')

@section('content')
@php
  // Use admin.* routes if they exist, else fall back to non-prefixed names
  $base = \Illuminate\Support\Facades\Route::has('admin.zoom-meetings.index')
    ? 'admin.zoom-meetings'
    : 'zoom-meetings';
@endphp

<div class="container py-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Create Zoom Meeting</h3>
    <a href="{{ route($base.'.index') }}" class="btn btn-outline-secondary">Back</a>
  </div>

  @if ($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
      </ul>
    </div>
  @endif

  <form method="POST" action="{{ route($base.'.store') }}" enctype="multipart/form-data" class="mt-3">
    @csrf

    {{-- Row 1: Title | Meeting ID --}}
    <div class="row g-3">
      <div class="col-md-6">
        <label class="form-label">Title</label>
        <input type="text" name="title" value="{{ old('title') }}"
               class="form-control border-1 bg-white" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Meeting ID</label>
        <input type="text" name="meeting_id" value="{{ old('meeting_id') }}"
               class="form-control border-1 bg-white" required>
      </div>
    </div>

    {{-- Row 2: Starts At | Duration --}}
    <div class="row g-3 mt-2">
      <div class="col-md-6">
        <label class="form-label">Starts At</label>
        <input type="datetime-local" name="starts_at" value="{{ old('starts_at') }}"
               class="form-control border-1 bg-white" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Duration (minutes)</label>
        <input type="number" name="duration_minutes" min="1" max="1440"
               value="{{ old('duration_minutes') }}"
               class="form-control border-1 bg-white" required>
      </div>
    </div>

    {{-- Row 3: Thumbnail | Published --}}
    <div class="row g-3 mt-2">
      <div class="col-md-6">
        <label class="form-label">Thumbnail (optional)</label>
        <input type="file" name="thumbnail" accept="image/*"
               class="form-control border-1 bg-white">
      </div>

      <div class="col-md-6 d-flex align-items-end">
        <div class="form-check mt-4">
          <input class="form-check-input" type="checkbox" value="1" id="is_published"
                 name="is_published" {{ old('is_published', true) ? 'checked' : '' }}>
          <label class="form-check-label" for="is_published">
            Published
          </label>
        </div>
      </div>
    </div>

    {{-- Row 4 (full width): Description --}}
    <div class="mt-3">
      <label class="form-label">Description (optional)</label>
      <textarea name="description" rows="4"
                class="form-control border-1 bg-white"
                placeholder="Add details about the meeting...">{{ old('description') }}</textarea>
    </div>

    <div class="mt-4">
      <button class="btn btn-primary">Save</button>
      <a href="{{ route($base.'.index') }}" class="btn btn-secondary">Cancel</a>
    </div>
  </form>
</div>
@endsection
