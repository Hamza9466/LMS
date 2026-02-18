@extends('admin.layouts.main')

@section('content')
<div class="container">
    <h2 class="mb-4">Edit About Icon</h2>

    <form action="{{ route('admin.about-icons.update', $aboutIcon->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Current Icon Preview --}}
        <div class="form-group mb-3">
            <label class="fw-bold">Current Icon</label><br>
            @if($aboutIcon->icon)
                <img src="{{ asset('storage/'.$aboutIcon->icon) }}"
                     alt="Icon"
                     class="border rounded shadow-sm mb-2"
                     width="80" height="80">
            @else
                <p class="text-muted">No Icon Uploaded</p>
            @endif
        </div>

        {{-- Upload New Icon --}}
        <div class="form-group mb-3">
            <label class="fw-bold">Upload New Icon (optional)</label>
            <input type="file" name="icon" class="form-control" accept="image/*">
            <small class="text-muted">Leave empty if you don't want to change the icon.</small>
        </div>

        {{-- Digits --}}
        <div class="form-group mb-3">
            <label class="fw-bold">Digits</label>
            <input type="text" name="digits" value="{{ $aboutIcon->digits }}" class="form-control">
        </div>

        {{-- Short Description --}}
        <div class="form-group mb-3">
            <label class="fw-bold">Short Description</label>
            <textarea name="shortdescription" class="form-control" rows="3">{{ $aboutIcon->shortdescription }}</textarea>
        </div>

        {{-- Buttons --}}
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.about-icons.index') }}" class="btn btn-secondary">Back</a>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
</div>
@endsection
