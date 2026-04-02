@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4" style="max-width: 720px;">
        <a href="{{ route('student.assignments.index') }}" class="text-decoration-none small">&larr; Back</a>
        <h4 class="dashboard-title mt-2 mb-1">{{ $assignment->title }}</h4>
        <p class="text-muted small mb-4">{{ $assignment->course->title ?? '' }} · Due {{ $assignment->deadline_at?->format('M j, Y g:i A') }}</p>

        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        @if($assignment->description)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="fw-bold">Instructions</h6>
                    <div class="text-muted" style="white-space: pre-wrap;">{{ $assignment->description }}</div>
                </div>
            </div>
        @endif

        @if($submission->graded_at)
            <div class="alert alert-info">
                <strong>Feedback:</strong>
                @if($submission->marks !== null)
                    <div>Marks: {{ $submission->marks }}</div>
                @endif
                <div class="mt-1" style="white-space: pre-wrap;">{{ $submission->feedback ?: '—' }}</div>
            </div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body">
                <h6 class="fw-bold mb-3">Your submission</h6>
                <form method="POST" action="{{ route('student.assignments.submit', $assignment) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Answer / description</label>
                        <textarea name="submission_text" class="form-control" rows="6">{{ old('submission_text', $submission->submission_text) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Attachment (optional)</label>
                        <input type="file" name="attachment" class="form-control">
                        @if($submission->attachment_path)
                            <a href="{{ asset('storage/'.$submission->attachment_path) }}" target="_blank" class="small d-inline-block mt-2">Current file</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Submit assignment</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
