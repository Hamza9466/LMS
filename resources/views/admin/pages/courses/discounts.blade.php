@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="fw-bold mb-0">Special Discounts · {{ $course->title }}</h4>
        <div class="d-flex gap-2">
            <a href="{{ route('courses.show', $course->id) }}" class="btn btn-light">Back to Course</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-white"><strong>Create / Update Personal Discount</strong></div>
        <form action="{{ route('admin.personal-discounts.store', $course->id) }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Student</label>
                        <select name="user_id" class="form-select" required>
                            <option value="">Select student…</option>
                            @foreach($students as $s)
                                @php
                                    $nm = trim(($s->studentDetail->first_name ?? '').' '.($s->studentDetail->last_name ?? ''));
                                    if ($nm==='') $nm = $s->name ?? $s->email;
                                @endphp
                                <option value="{{ $s->id }}">{{ $nm }} (ID #{{ $s->id }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Type</label>
                        <select name="type" class="form-select">
                            <option value="percent">Percent %</option>
                            <option value="amount">Amount</option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Value</label>
                        <input type="number" step="0.01" min="0.01" name="value" class="form-control" placeholder="e.g. 20" required>
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Starts</label>
                        <input type="datetime-local" name="starts_at" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Ends</label>
                        <input type="datetime-local" name="ends_at" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <label class="form-label">Max Uses</label>
                        <input type="number" min="1" name="max_uses" class="form-control" placeholder="Optional">
                    </div>

                   <div class="col-md-2 d-flex align-items-end">
    <div class="form-check">
        {{-- always send 0 when unchecked --}}
        <input type="hidden" name="active" value="0">
        {{-- send 1 when checked --}}
        <input class="form-check-input" type="checkbox" name="active" id="discActive" value="1" checked>
        <label class="form-check-label" for="discActive">Active</label>
    </div>
</div>

                    <div class="col-md-3 d-flex align-items-end">
                        <button class="btn btn-primary w-100">Save Discount</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white"><strong>Existing Discounts</strong></div>
        <div class="card-body">
            @if($discounts->isEmpty())
                <div class="text-muted">No personal discounts yet.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Student</th>
                                <th>Type</th>
                                <th>Value</th>
                                <th>Active</th>
                                <th>Uses</th>
                                <th>Starts</th>
                                <th>Ends</th>
                                <th class="text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discounts as $d)
                                @php
                                    $u = $d->user;
                                    $nm = $u?->studentDetail
                                        ? trim(($u->studentDetail->first_name ?? '').' '.($u->studentDetail->last_name ?? ''))
                                        : ($u->name ?? $u->email ?? 'User #'.$u?->id);
                                @endphp
                                <tr>
                                    <td>{{ $nm }}</td>
                                    <td>{{ ucfirst($d->type) }}</td>
                                    <td>
                                        @if($d->type === 'percent')
                                            {{ rtrim(rtrim(number_format($d->value,2,'.',''), '0'), '.') }}%
                                        @else
                                            ${{ number_format($d->value, 2) }}
                                        @endif
                                    </td>
                                    <td>@if($d->active)<span class="badge bg-success">Active</span>@else<span class="badge bg-secondary">Inactive</span>@endif</td>
                                    <td>{{ $d->uses }}@if($d->max_uses)/{{ $d->max_uses }}@endif</td>
                                    <td>{{ $d->starts_at?->format('Y-m-d H:i') ?? '—' }}</td>
                                    <td>{{ $d->ends_at?->format('Y-m-d H:i') ?? '—' }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('admin.personal-discounts.destroy', $d) }}" method="POST" onsubmit="return confirm('Remove this discount?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
