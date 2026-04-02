@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold text-primary">Payment proofs</h4>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- Filters: review status + gateway --}}
    <form method="GET" class="mb-3 row g-2 align-items-end">
        <div class="col-md-3">
            <label class="form-label small text-muted mb-0">Status</label>
            <select name="review" class="form-select border-1 bg-white" onchange="this.form.submit()">
                <option value="pending" @selected(($review ?? 'pending') === 'pending')>Awaiting verification</option>
                <option value="paid" @selected(($review ?? '') === 'paid')>Approved (paid)</option>
                <option value="rejected" @selected(($review ?? '') === 'rejected')>Rejected</option>
                <option value="all" @selected(($review ?? '') === 'all')>All (proof flow)</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label small text-muted mb-0">Gateway</label>
            <select name="gateway" class="form-select border-1 bg-white" onchange="this.form.submit()">
                <option value="">All gateways</option>
                @foreach($gateways as $g)
                    @php
                        $pm = $paymentMethods[$g] ?? null;
                        $n = is_array($pm) ? ($pm['number'] ?? '') : '';
                        $gLabel = is_array($pm)
                            ? (($pm['label'] ?? ucfirst($g)).($n !== '' && $n !== '—' ? ' — '.$n : ''))
                            : ucfirst($g);
                    @endphp
                    <option value="{{ $g }}" @selected(request('gateway') === $g)>{{ $gLabel }}</option>
                @endforeach
            </select>
        </div>
    </form>

    <div class="card shadow-sm border-0 rounded-3">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table align-middle mb-0 table-hover">
                    <thead style="background: linear-gradient(90deg, #02409c, #12a0a0); color: #fff;">
                        <tr>
                            <th class="px-3 py-3">#</th>
                            <th class="py-3">Order</th>
                            <th class="py-3">Student</th>
                            <th class="py-3">Gateway</th>
                            <th class="py-3 text-end">Total</th>
                            <th class="py-3">Currency</th>
                            <th class="py-3">Submitted</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                            <tr class="border-bottom">
                                <td class="px-3">{{ $loop->iteration + ($orders->currentPage() - 1) * $orders->perPage() }}</td>
                                <td>
                                    <div class="fw-semibold">#{{ $order->id }}</div>
                                    <small class="text-muted">{{ $order->items->count() }} course(s)</small>
                                </td>
                                <td>
                                    <div>{{ $order->user->email ?? '—' }}</div>
                                    <small class="text-muted">User #{{ $order->user_id }}</small>
                                </td>
                                <td><span class="badge bg-secondary">{{ ucfirst($order->gateway ?? '—') }}</span></td>
                                <td class="text-end">{{ number_format((float) $order->total, 2) }}</td>
                                <td>{{ $order->currency }}</td>
                                <td>
                                    <span title="{{ $order->created_at->toDayDateTimeString() }}">{{ $order->created_at->diffForHumans() }}</span>
                                </td>
                                <td>
                                    @if($order->status === 'pending_verification')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($order->status === 'paid')
                                        <span class="badge bg-success">Paid</span>
                                    @elseif($order->status === 'rejected')
                                        <span class="badge bg-danger">Rejected</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $order->status }}</span>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-inline-flex flex-wrap gap-1 justify-content-center">
                                        <a href="{{ route('admin.payment-orders.show', $order) }}" class="btn btn-sm btn-primary">{{ $order->status === 'pending_verification' ? 'Review' : 'View' }}</a>
                                        @if(in_array($order->status, ['pending_verification', 'rejected'], true))
                                            <form method="POST" action="{{ route('admin.payment-orders.destroy', $order) }}" class="d-inline" onsubmit="return confirm('Delete this order permanently? This cannot be undone.');">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="review" value="{{ $review ?? request('review', 'pending') }}">
                                                <input type="hidden" name="gateway" value="{{ request('gateway') }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">
                                    @if(($review ?? 'pending') === 'pending')
                                        No orders awaiting verification.
                                    @elseif(($review ?? '') === 'paid')
                                        No approved payment proofs match this filter.
                                    @elseif(($review ?? '') === 'rejected')
                                        No rejected orders match this filter.
                                    @else
                                        No orders match this filter.
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $orders->links() }}
    </div>
</div>
@endsection
