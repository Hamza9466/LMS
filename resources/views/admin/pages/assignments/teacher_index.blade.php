@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <h4 class="dashboard-title mb-0">Assignments</h4>
            <a href="{{ route('teacher.assignments.create') }}" class="btn btn-primary">Create assignment</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="fw-bold">Create assignments</h6>
                        <p class="text-muted small mb-0">Add task title, description, and deadline for your courses.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="fw-bold">Check student submissions</h6>
                        <p class="text-muted small mb-0">Open an assignment to view work, marks, and feedback.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h6 class="fw-bold">Monitor students</h6>
                        <p class="text-muted small mb-2">Track lesson &amp; quiz progress.</p>
                        <a href="{{ route('teacher.students.monitor') }}" class="btn btn-sm btn-outline-primary">Open monitor</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Title</th>
                                <th>Course</th>
                                <th>Deadline</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assignments as $a)
                                <tr>
                                    <td class="fw-semibold">{{ $a->title }}</td>
                                    <td>{{ $a->course->title ?? '—' }}</td>
                                    <td>{{ $a->deadline_at?->format('M j, Y g:i A') }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('teacher.assignments.show', $a) }}" class="btn btn-sm btn-primary">Submissions</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">No assignments yet.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $assignments->links() }}
        </div>
    </div>
</div>
@endsection
