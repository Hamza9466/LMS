@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <h4 class="mb-4 fw-bold text-primary">All Transactions</h4>

    {{-- Filters --}}
    <form method="GET" class="mb-3 row g-2 align-items-end">
        <div class="col-md-3">
            <input type="text" name="q" value="{{ request('q') }}" class="form-control border-1 bg-white" placeholder="Search reference, amount, currency">
        </div>
        <div class="col-md-2">
            <select name="gateway" class="form-select border-1 bg-white" onchange="this.form.submit()">
                <option value="">All Gateways</option>
                @foreach($gateways as $g)
                    <option value="{{ $g }}" @selected(request('gateway')===$g)>{{ ucfirst($g) }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-grid ms-auto">
            <button class="btn btn-primary">Filter</button>
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
                            <th class="py-3">Gateway</th>
                            <th class="py-3">Status</th>
                            <th class="py-3 text-end">Amount</th>
                            <th class="py-3">Currency</th>
                            <th class="py-3">Reference</th>
                            <th class="py-3">Created</th>
                            <th class="py-3 text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tx as $t)
                            <tr class="border-bottom">
                                <td class="px-3">{{ $loop->iteration }}</td>
                                <td>
                                    @if($t->order)
                                        <div>#{{ $t->order->id }} ({{ ucfirst($t->order->status) }})</div>
                                        <small class="text-muted">{{ number_format($t->order->total,2) }} {{ $t->order->currency }}</small>
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>
                                <td><span class="badge bg-secondary">{{ ucfirst($t->gateway) }}</span></td>
                                <td>
                                    @php
                                        $map = ['captured'=>'success','authorized'=>'info','failed'=>'danger','created'=>'secondary','paid'=>'success'];
                                        $clr = $map[strtolower($t->status)] ?? 'secondary';
                                    @endphp
                                    <span class="badge bg-{{ $clr }}">{{ ucfirst($t->status) }}</span>
                                </td>
                                <td class="text-end">{{ number_format((float)$t->amount,2) }}</td>
                                <td>{{ $t->currency }}</td>
                                <td><code class="bg-light px-1 rounded">{{ $t->reference ?? '—' }}</code></td>
                                <td>{{ $t->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <form action="{{ route('admin.transactions.destroy', $t->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger p-0 m-0" 
                                                onclick="return confirm('Are you sure you want to delete this transaction?')" 
                                                title="Delete">
                                            <i class="fas fa-trash-alt fa-lg"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No transactions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $tx->links() }}
    </div>
</div>
@endsection
