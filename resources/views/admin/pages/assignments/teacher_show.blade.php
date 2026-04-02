@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('teacher.assignments.index') }}" class="text-decoration-none small">&larr; Back</a>
            <h4 class="dashboard-title mt-2 mb-1">{{ $assignment->title }}</h4>
            <p class="text-muted mb-0">{{ $assignment->course->title ?? '' }} · Due {{ $assignment->deadline_at?->format('M j, Y g:i A') }}</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($assignment->description)
            <div class="card border-0 shadow-sm mb-4">
                <div class="card-body">
                    <h6 class="fw-bold">Description</h6>
                    <div class="text-muted" style="white-space: pre-wrap;">{{ $assignment->description }}</div>
                </div>
            </div>
        @endif

        <h5 class="mb-3">Student submissions</h5>
        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Submitted</th>
                                <th>Work</th>
                                <th style="min-width: 220px;">Marks &amp; feedback</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($enrolledStudents as $st)
                                @php
                                    $sub = $submissionsByUserId->get($st->id);
                                    $name = $st->studentDetail
                                        ? trim($st->studentDetail->first_name.' '.$st->studentDetail->last_name)
                                        : ($st->email ?? '—');
                                @endphp
                                <tr>
                                    <td>
                                        <div class="fw-semibold">{{ $name }}</div>
                                        <div class="small text-muted">{{ $st->email }}</div>
                                    </td>
                                    <td>
                                        @if($sub?->submitted_at)
                                            {{ $sub->submitted_at->diffForHumans() }}
                                        @else
                                            <span class="text-muted">Not submitted</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($sub?->submitted_at && ($sub->submission_text || $sub->attachment_path))
                                            @if($sub->submission_text)
                                                <div class="small" style="max-width: 280px; white-space: pre-wrap;">{{ \Illuminate\Support\Str::limit($sub->submission_text, 200) }}</div>
                                            @endif
                                            @if($sub->attachment_path)
                                                <a href="{{ asset('storage/'.$sub->attachment_path) }}" target="_blank" class="small d-inline-block mt-1">Download file</a>
                                            @endif
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($sub && $sub->submitted_at)
                                            <form method="POST" action="{{ route('teacher.assignments.submissions.grade', $sub) }}" class="d-flex flex-column gap-2">
                                                @csrf
                                                <input type="number" name="marks" class="form-control form-control-sm" placeholder="Marks" step="0.01" min="0" value="{{ old('marks', $sub->marks) }}">
                                                <textarea name="feedback" class="form-control form-control-sm" rows="2" placeholder="Feedback">{{ old('feedback', $sub->feedback) }}</textarea>
                                                <button type="submit" class="btn btn-sm btn-primary">Save grade</button>
                                            </form>
                                        @else
                                            <span class="text-muted small">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No enrolled students in this course.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
