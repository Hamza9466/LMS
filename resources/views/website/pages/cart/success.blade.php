{{-- resources/views/website/pages/cart/checkout-success.blade.php --}}
@extends('website.layouts.main')

@section('content')

{{-- ===== Remove the big gap some sticky headers add ===== --}}
<style>
  html, body { margin-top:0 !important; padding-top:0 !important; }
  .header-spacer, .sticky-spacer, .navbar-spacer { display:none !important; height:0 !important; }
  .page-banner { margin-top: 0 !important; }
</style>

{{-- ===== Page Banner ===== --}}
<div class="page-banner bg-color-05">
  <div class="page-banner__wrapper">
    <div class="container">
      <div class="page-breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
          <li class="breadcrumb-item active">Success</li>
        </ul>
      </div>
      <div class="page-banner__caption text-center">
        <h2 class="page-banner__main-title">Thank you! Enrollment confirmed. Now Login To Your Dashboard</h2>
      </div>
    </div>
  </div>
</div>

@php
    use App\Models\Course;

    // Defensive defaults in case some fields are null
    $currency  = $order->currency ?? env('APP_CURRENCY','USD');
    $items     = $order->items ?? collect();
    $subtotal  = (float)($order->subtotal ?? $items->sum(fn($it) => (float)($it->price ?? 0)));
    $discount  = (float)($order->discount ?? 0);
    $total     = (float)($order->total ?? max($subtotal - $discount, 0));
    $createdAt = $order->created_at ?? now();

    // Helper to resolve a thumbnail:
    // 1) if item has 'thumbnail' use it (url or relative)
    // 2) else fetch Course and use its thumbnail
    // 3) else fallback image
    if (!function_exists('resolveThumb')) {
        function resolveThumb($it) {
        $fallback = asset('assets/images/courses/courses-2.jpg');
        $thumbRaw = $it->thumbnail ?? null;

        if ($thumbRaw) {
            if (filter_var($thumbRaw, FILTER_VALIDATE_URL)) {
                return $thumbRaw;
            }
            $path = ltrim($thumbRaw, '/');
            return \Illuminate\Support\Str::startsWith($path, 'storage/')
                ? asset($path)
                : asset('storage/'.$path);
        }

        if (!empty($it->course_id)) {
            $course = Course::select('thumbnail')->find($it->course_id);
            if ($course && $course->thumbnail) {
                return asset('storage/'.ltrim($course->thumbnail,'/'));
            }
        }

        return $fallback;
        }
    }

    // Helper to resolve title + link
    if (!function_exists('resolveTitleAndLink')) {
        function resolveTitleAndLink($it) {
        $title = $it->title ?? null;
        $slug  = $it->slug  ?? null;

        if (!$title || !$slug) {
            if (!empty($it->course_id)) {
                $c = Course::select('title','slug')->find($it->course_id);
                if ($c) {
                    $title = $title ?? $c->title;
                    $slug  = $slug  ?? $c->slug;
                }
            }
        }
        if (!$title) $title = !empty($it->course_id) ? ('Course #'.$it->course_id) : 'Course';
        $url = $slug ? route('CourseDetail', ['slug'=>$slug]) : null;

        return [$title, $url, $slug];
        }
    }
@endphp

<div class="section-padding-01">
  <div class="container custom-container">

    @if (session('success'))
      <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif

    <div class="row gy-6">
      {{-- ===== Left: Order Summary ===== --}}
      <div class="col-lg-8">
        <div class="card shadow-sm">
          <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
            <span class="fw-semibold">Order #{{ $order->id }}</span>
            <small class="text-muted">
              Placed on {{ \Illuminate\Support\Carbon::parse($createdAt)->format('M d, Y h:i A') }}
            </small>
          </div>

          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th class="text-end">Price</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($items as $it)
                    @php
                      $thumb = resolveThumb($it);
                      [$title, $link, $slug] = resolveTitleAndLink($it);
                      $linePrice = (float)($it->price ?? 0);
                    @endphp
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ $thumb }}" alt="{{ $title }}" width="60" height="70" class="me-3 rounded" style="object-fit:cover">
                          <div>
                            @if($link)
                              <a href="{{ $link }}" class="fw-semibold">{{ $title }}</a>
                            @else
                              <span class="fw-semibold">{{ $title }}</span>
                            @endif
                            @if($slug)
                              <div class="text-muted small">/{{ $slug }}</div>
                            @endif
                          </div>
                        </div>
                      </td>
                      <td class="text-end">{{ number_format($linePrice, 2) }} {{ $currency }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="2" class="text-center text-muted py-4">No items found for this order.</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Subtotal</th>
                    <th class="text-end">{{ number_format($subtotal, 2) }} {{ $currency }}</th>
                  </tr>
                  <tr>
                    <th>Discount</th>
                    <th class="text-end">-{{ number_format($discount, 2) }} {{ $currency }}</th>
                  </tr>
                  <tr>
                    <th class="fs-5">Total</th>
                    <th class="text-end fs-5">{{ number_format($total, 2) }} {{ $currency }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="card-footer">
            <div class="d-flex flex-wrap gap-2">
              {{-- “Enrolled Courses” route exists in your route:list as enrolled-courses --}}
              <a class="btn btn-light" href="{{ route('cart.index') }}">Back to Cart</a>
              {{-- Add an invoice/receipt download link here if you have one --}}
            </div>
          </div>
        </div>
      </div>

      {{-- ===== Right: Order Info (optional extras) ===== --}}
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header fw-semibold">Order Info</div>
          <div class="card-body">
            <dl class="row mb-0">
              <dt class="col-5">Status</dt>
              <dd class="col-7">{{ ucfirst($order->status ?? 'paid') }}</dd>

              <dt class="col-5">Payment</dt>
              <dd class="col-7">{{ strtoupper($order->gateway ?? $order->payment_method ?? 'manual') }}</dd>

              @if(!empty($order->reference) || !empty($order->payment_ref))
                <dt class="col-5">Reference</dt>
                <dd class="col-7">{{ $order->reference ?? $order->payment_ref }}</dd>
              @endif

              <dt class="col-5">Date</dt>
              <dd class="col-7">{{ \Illuminate\Support\Carbon::parse($createdAt)->toDayDateTimeString() }}</dd>
            </dl>

            <hr>
            <p class="small text-muted mb-0">
              You can access your new course(s) from <a href="{{ route('enrolled-courses') }}">My Courses</a> anytime.
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

{{-- Add body padding only if header is actually fixed --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header, .header-section, .main-header, .navbar');
    if (header && getComputedStyle(header).position === 'fixed') {
      document.body.style.paddingTop = header.offsetHeight + 'px';
    }
  });
</script>
@endsection
