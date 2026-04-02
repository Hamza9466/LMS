@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
            <div>
                <h4 class="dashboard-title mb-1">Teacher activity</h4>
                <p class="text-muted small mb-0">Courses, assignments, and submission workload per teacher.</p>
            </div>
            <div class="d-flex flex-wrap gap-2">
                <a href="{{ route('admin.assignments.manage') }}" class="btn btn-outline-secondary btn-sm">Manage assignments</a>
                <a href="{{ route('admin.assignments.performance') }}" class="btn btn-outline-secondary btn-sm">Performance</a>
            </div>
        </div>

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Teacher</th>
                                <th>Email</th>
                                <th>Courses</th>
                                <th>Assignments</th>
                                <th>New (30d)</th>
                                <th>Submissions</th>
                                <th>Pending grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rows as $row)
                                <tr>
                                    <td class="fw-semibold">{{ $row->teacher_name }}</td>
                                    <td class="small text-muted">{{ $row->email }}</td>
                                    <td>{{ $row->courses_count }}</td>
                                    <td>{{ $row->assignments_count }}</td>
                                    <td>{{ $row->assignments_last_30_days }}</td>
                                    <td>{{ $row->submissions_total }}</td>
                                    <td>
                                        @if($row->submissions_pending_grade > 0)
                                            <span class="badge bg-warning text-dark">{{ $row->submissions_pending_grade }}</span>
                                        @else
                                            <span class="text-muted">0</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4">No teachers found.</td>
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
