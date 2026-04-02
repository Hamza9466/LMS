@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div>
                <h4 class="dashboard-title mb-1">Performance &amp; progress</h4>
                <p class="text-muted small mb-0">All enrolled students: lessons, quizzes, and average assignment marks.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.assignments.manage') }}" class="btn btn-outline-secondary btn-sm">Manage assignments</a>
                <a href="{{ route('admin.assignments.teacher-activity') }}" class="btn btn-outline-secondary btn-sm">Teacher activity</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Course</th>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Lessons</th>
                                <th>Quizzes passed</th>
                                <th>Avg assignment marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td class="fw-semibold">{{ $row->course_title }}</td>
                                    <td>{{ $row->student_name }}</td>
                                    <td class="small text-muted">{{ $row->student_email }}</td>
                                    <td>{{ $row->lessons_completed }} / {{ $row->lessons_total }}</td>
                                    <td>{{ $row->quizzes_passed }}</td>
                                    <td>{{ $row->assignment_avg_marks !== null ? $row->assignment_avg_marks : '—' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">No enrollment data yet.</td>
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
