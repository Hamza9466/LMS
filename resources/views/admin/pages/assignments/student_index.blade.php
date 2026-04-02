@extends('admin.layouts.main')

@section('content')
<div class="dashboard-content">
    <div class="container py-4">
        <h4 class="dashboard-title mb-4">My assignments</h4>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Assignment</th>
                                <th>Course</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th class="text-end">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assignments as $a)
                                @php $sub = $submissions->get($a->id); @endphp
                                <tr>
                                    <td class="fw-semibold">{{ $a->title }}</td>
                                    <td>{{ $a->course->title ?? '—' }}</td>
                                    <td>{{ $a->deadline_at?->format('M j, Y g:i A') }}</td>
                                    <td>
                                        @if($sub?->submitted_at)
                                            @if($sub->graded_at)
                                                <span class="badge bg-success">Graded</span>
                                                @if($sub->marks !== null)
                                                    <span class="small text-muted">({{ $sub->marks }})</span>
                                                @endif
                                            @else
                                                <span class="badge bg-info text-dark">Submitted</span>
                                            @endif
                                        @else
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @endif
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('student.assignments.show', $a) }}" class="btn btn-sm btn-primary">
                                            {{ $sub?->submitted_at ? 'View / update' : 'Submit' }}
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">No assignments for your enrolled courses.</td>
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
