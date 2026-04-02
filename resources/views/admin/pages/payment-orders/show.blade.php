@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-3">
        <h4 class="mb-0 fw-bold text-primary">Review order #{{ $order->id }}</h4>
        <a href="{{ route('admin.payment-orders.index') }}" class="btn btn-outline-secondary btn-sm">Back to list</a>
    </div>

    <div class="row gy-4">
        <div class="col-lg-5">
            <div class="card shadow-sm border-0">
                <div class="card-header fw-semibold">Payment screenshot</div>
                <div class="card-body text-center">
                    @if($order->payment_proof_path)
                        <a href="{{ asset('storage/'.$order->payment_proof_path) }}" target="_blank" rel="noopener">
                            <img src="{{ asset('storage/'.$order->payment_proof_path) }}" alt="Payment proof" class="img-fluid rounded border" style="max-height: 420px; object-fit: contain;">
                        </a>
                        <p class="small text-muted mt-2 mb-0">Click image to open full size.</p>
                    @else
                        <p class="text-muted mb-0">No file uploaded.</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header fw-semibold">Order details</div>
                <div class="card-body">
                    <p class="mb-1"><strong>Student:</strong> {{ $order->user->email ?? '—' }}</p>
                    <p class="mb-1"><strong>Payment method:</strong>
                        @php $pm = $paymentMethods[$order->gateway] ?? null; @endphp
                        @if(is_array($pm))
                            {{ $pm['label'] ?? ucfirst($order->gateway) }}
                            @if(!empty($pm['number']) && ($pm['number'] ?? '') !== '—')
                                <span class="text-primary font-monospace"> — {{ $pm['number'] }}</span>
                            @endif
                        @else
                            {{ ucfirst($order->gateway ?? '—') }}
                        @endif
                    </p>
                    <p class="mb-1"><strong>Total:</strong> {{ number_format((float) $order->total, 2) }} {{ $order->currency }}</p>
                    <p class="mb-0"><strong>Status:</strong>
                        @if($order->status === 'pending_verification')
                            <span class="badge bg-warning text-dark">Pending verification</span>
                        @elseif($order->status === 'paid')
                            <span class="badge bg-success">Paid / enrolled</span>
                        @elseif($order->status === 'rejected')
                            <span class="badge bg-danger">Rejected</span>
                        @else
                            <span class="badge bg-secondary">{{ $order->status }}</span>
                        @endif
                    </p>
                </div>
            </div>
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-header fw-semibold">Courses</div>
                <ul class="list-group list-group-flush">
                    @foreach($order->items as $it)
                        <li class="list-group-item d-flex justify-content-between">
                            <span>{{ $it->course->title ?? ('Course #'.$it->course_id) }}</span>
                            <span>{{ number_format((float) $it->price, 2) }} {{ $order->currency }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if($canReview ?? false)
                <div class="d-flex flex-wrap gap-2">
                    <form method="POST" action="{{ route('admin.payment-orders.approve', $order) }}" onsubmit="return confirm('Approve this payment and enroll the student?');">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve &amp; enroll</button>
                    </form>
                    <button type="button" class="btn btn-outline-danger" data-bs-toggle="collapse" data-bs-target="#rejectForm">Reject</button>
                </div>
                <div class="collapse mt-3" id="rejectForm">
                    <div class="card card-body border-danger">
                        <form method="POST" action="{{ route('admin.payment-orders.reject', $order) }}">
                            @csrf
                            <label class="form-label">Reason (optional, shown to admin history only)</label>
                            <textarea name="admin_review_note" class="form-control mb-2" rows="3" placeholder="Reason for rejection…"></textarea>
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Reject this payment? Student will not be enrolled.');">Confirm reject</button>
                        </form>
                    </div>
                </div>
            @else
                <p class="text-muted small mb-0">This order was already reviewed. Use the list filters to view approved or rejected orders.</p>
                @if($order->status === 'rejected' && $order->admin_review_note)
                    <p class="mb-0 mt-2"><strong>Rejection note:</strong> {{ $order->admin_review_note }}</p>
                @endif
            @endif

            @if(in_array($order->status, ['pending_verification', 'rejected'], true))
                <div class="mt-3 pt-3 border-top">
                    <form method="POST" action="{{ route('admin.payment-orders.destroy', $order) }}" class="d-inline" onsubmit="return confirm('Delete this order permanently? This cannot be undone.');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete order</button>
                    </form>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
