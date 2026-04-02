@extends('admin.layouts.main')

@section('content')
<div class="container py-4">
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
        <h4 class="mb-0 fw-bold text-primary">Payment methods</h4>
        <a href="{{ route('admin.payment-orders.index') }}" class="btn btn-outline-secondary btn-sm">Payment proofs</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <p class="text-muted small mb-4">
        These values appear on the student checkout page (method list, account number, and instructions). Leave a field empty to use the default from <code>config/payment.php</code> or <code>.env</code>.
    </p>

    <form method="POST" action="{{ route('admin.payment-methods.update') }}">
        @csrf
        @method('PUT')

        @foreach(config('payment.methods', []) as $key => $cfg)
            @php
                $m = $methods[$key] ?? $cfg;
            @endphp
            <div class="card shadow-sm border-0 rounded-3 mb-4">
                <div class="card-header fw-semibold text-capitalize">{{ $key }}</div>
                <div class="card-body row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Display name</label>
                        <input type="text" name="methods[{{ $key }}][label]" class="form-control @error('methods.'.$key.'.label') is-invalid @enderror"
                               value="{{ old('methods.'.$key.'.label', $m['label'] ?? '') }}"
                               placeholder="{{ $cfg['label'] ?? '' }}">
                        @error('methods.'.$key.'.label')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Account / wallet number</label>
                        <input type="text" name="methods[{{ $key }}][number]" class="form-control @error('methods.'.$key.'.number') is-invalid @enderror"
                               value="{{ old('methods.'.$key.'.number', $m['number'] ?? '') }}"
                               placeholder="{{ $cfg['number'] ?? '' }}">
                        @error('methods.'.$key.'.number')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-12">
                        <label class="form-label">Instructions (shown after method is selected)</label>
                        <textarea name="methods[{{ $key }}][detail]" rows="4" class="form-control @error('methods.'.$key.'.detail') is-invalid @enderror"
                                  placeholder="{{ \Illuminate\Support\Str::limit($cfg['detail'] ?? '', 80) }}">{{ old('methods.'.$key.'.detail', $m['detail'] ?? '') }}</textarea>
                        @error('methods.'.$key.'.detail')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary">Save payment methods</button>
    </form>
</div>
@endsection
