@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <h4 class="dashboard-title mb-0">Monitor students</h4>
            <a href="{{ route('teacher.assignments.index') }}" class="btn btn-outline-secondary btn-sm">Assignments</a>
        </div>

        <p class="text-muted mb-3">Lesson completion and passed quizzes per enrolled student.</p>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Course</th>
                                <th>Student</th>
                                <th>Email</th>
                                <th>Lessons done</th>
                                <th>Quizzes passed</th>
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
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No data yet.</td>
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
