@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div>
                <h4 class="dashboard-title mb-1">Manage assignments</h4>
                <p class="text-muted small mb-0">View every assignment, open submissions, and grade like a teacher.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.assignments.teacher-activity') }}" class="btn btn-outline-secondary btn-sm">Teacher activity</a>
                <a href="{{ route('admin.assignments.performance') }}" class="btn btn-outline-secondary btn-sm">Performance</a>
                <a href="{{ route('teacher.assignments.create') }}" class="btn btn-primary btn-sm">Create assignment</a>
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
                                <th>Teacher</th>
                                <th>Deadline</th>
                                <th>Submissions</th>
                                <th>Graded</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assignments as $a)
                                @php
                                    $t = $a->teacher;
                                    $tname = $t?->teacherDetail
                                        ? trim($t->teacherDetail->first_name.' '.$t->teacherDetail->last_name)
                                        : ($t?->email ?? '—');
                                @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $a->title }}</td>
                                    <td>{{ $a->course->title ?? '—' }}</td>
                                    <td class="small">{{ $tname }}</td>
                                    <td class="small">{{ $a->deadline_at?->format('M j, Y g:i A') }}</td>
                                    <td>{{ $a->submissions_count }}</td>
                                    <td>{{ $a->graded_submissions_count }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('teacher.assignments.show', $a) }}" class="btn btn-sm btn-primary">Open</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">No assignments yet.</td>
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
