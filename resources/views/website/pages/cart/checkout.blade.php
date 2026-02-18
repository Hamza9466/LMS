{{-- resources/views/website/pages/cart/checkout.blade.php --}}
@extends('website.layouts.main')

@section('content')

<style>
  html, body { margin-top:0 !important; padding-top:0 !important; }
  .header-spacer, .sticky-spacer, .navbar-spacer { display:none !important; height:0 !important; }
  .page-banner { margin-top: 0 !important; }
  @media (min-width: 992px) { .card .table-responsive { overflow-x: visible; } }
</style>

<div class="page-banner bg-color-05">
  <div class="page-banner__wrapper">
    <div class="container">
      <div class="page-breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
          <li class="breadcrumb-item active">Checkout</li>
        </ul>
      </div>
      <div class="page-banner__caption text-center">
        <h2 class="page-banner__main-title">Checkout</h2>
      </div>
    </div>
  </div>
</div>

@php
  use App\Models\PersonalDiscount;

  // --- helpers ---
  if (!function_exists('cart_row_course_id')) {
      function cart_row_course_id(array $row): int {
          return (int)($row['course_id'] ?? $row['id'] ?? ($row['course']['id'] ?? 0));
      }
  }
  if (!function_exists('cart_thumb_url')) {
      function cart_thumb_url($path, $fallback = null) {
          $fallback = $fallback ?: asset('assets/images/courses/courses-2.jpg');
          if (!$path) return $fallback;
          if (filter_var($path, FILTER_VALIDATE_URL)) return $path;          // fully-qualified
          $p = ltrim($path, '/');
          if (\Illuminate\Support\Str::startsWith($p, 'storage/')) return asset($p);
          return asset('storage/'.$p);
      }
  }

  // --- inputs & plain totals ---
  $currency = env('APP_CURRENCY','USD');
  $cart     = $cart ?? session('cart', []);
  $coupon   = session('coupon');

  $subtotal = 0.0;
  foreach ($cart as $row) {
      $qty       = (int)($row['qty'] ?? 1);
      $unitPrice = (float)($row['price'] ?? 0);
      $subtotal += $unitPrice * $qty;
  }

  // --- personal discount (only when logged in) ---
  $personalDiscountTotal = 0.0;
  if (auth()->check()) {
      $uid = auth()->id();
      foreach ($cart as $row) {
          $qty       = (int)($row['qty'] ?? 1);
          $unitPrice = (float)($row['price'] ?? 0);
          $courseId  = cart_row_course_id($row);
          if (!$courseId || $unitPrice <= 0) continue;

          // best active & usable discount for this user+course
          $pd = PersonalDiscount::for($uid, $courseId)->active()->usable()->orderByDesc('value')->first();
          if ($pd) {
              $t = strtolower((string)$pd->type);
              $unitOff = $t === 'percent'
                  ? round($unitPrice * ((float)$pd->value / 100), 2)
                  : (float) min($unitPrice, (float)$pd->value);  // amount/fixed
              $personalDiscountTotal += $unitOff * $qty;
          }
      }
  }

  // --- coupon + grand total ---
  $couponDiscount = (float)($coupon['amount'] ?? 0);
  $discount       = $personalDiscountTotal + $couponDiscount;
  $total          = max($subtotal - $discount, 0);
@endphp

<div class="section-padding-01">
  <div class="container custom-container">

    {{-- flashes --}}
    @if ($errors->any())   <div class="alert alert-danger mb-4">{{ $errors->first() }}</div> @endif
    @if (session('success')) <div class="alert alert-success mb-4">{{ session('success') }}</div> @endif
    @if (session('error'))   <div class="alert alert-danger mb-4">{{ session('error') }}</div>   @endif

    @guest
      <div class="alert alert-info mb-4">
        Please
        <a class="alert-link"
           href="{{ route('checkout.auth', ['force'=>1,'tab'=>'register','intended'=>route('cart.checkout')]) }}">
          log in / register
        </a>
        to complete your purchase.
      </div>
    @endguest

    <div class="row gy-6">
      {{-- left: order summary --}}
      <div class="col-lg-7">
        <div class="card shadow-sm">
          <div class="card-header fw-semibold">Order Summary</div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table mb-0 align-middle">
                <thead>
                  <tr>
                    <th>Course</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Price</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($cart as $row)
                  @php
                    $qty       = (int)($row['qty'] ?? 1);
                    $unitPrice = (float)($row['price'] ?? 0);
                    $img       = cart_thumb_url($row['thumbnail'] ?? null);
                    // If cart row had no image/title/slug, try to enrich from DB (optional, cheap)
                    if (empty($row['title']) || empty($row['slug']) || ($img === asset('storage/'))) {
                        $cid = cart_row_course_id($row);
                        if ($cid) {
                            $c = \App\Models\Course::select('title','slug','thumbnail')->find($cid);
                            if ($c) {
                                $row['title'] = $row['title'] ?? $c->title;
                                $row['slug']  = $row['slug']  ?? $c->slug;
                                $img = $c->thumbnail ? cart_thumb_url($c->thumbnail) : $img;
                            }
                        }
                    }
                  @endphp
                  <tr>
                    <td>
                      <div class="cart-product d-flex align-items-center">
                        <div class="cart-product__thumbnail me-3">
                          <img src="{{ $img }}" alt="{{ $row['title'] ?? 'Course' }}" width="60" height="70" style="object-fit:cover">
                        </div>
                        <div class="cart-product__content">
                          <h6 class="m-0">{{ $row['title'] ?? 'Course' }}</h6>
                          @if(!empty($row['slug']))
                            <div class="text-muted small">/{{ $row['slug'] }}</div>
                          @endif
                        </div>
                      </div>
                    </td>
                    <td class="text-center">{{ $qty }}</td>
                    <td class="text-end">{{ number_format($unitPrice * $qty, 2) }} {{ $currency }}</td>
                  </tr>
                @empty
                  <tr><td colspan="3" class="text-center text-muted">Your cart is empty.</td></tr>
                @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Subtotal</th><th></th>
                    <th class="text-end">{{ number_format($subtotal,2) }} {{ $currency }}</th>
                  </tr>
                  @if($personalDiscountTotal > 0)
                    <tr>
                      <th>Discount (Student)</th><th></th>
                      <th class="text-end text-success">-{{ number_format($personalDiscountTotal,2) }} {{ $currency }}</th>
                    </tr>
                  @endif
                  @if($couponDiscount > 0)
                    <tr>
                      <th>Discount (Coupon{{ !empty($coupon['code']) ? ': '.$coupon['code'] : '' }})</th><th></th>
                      <th class="text-end text-success">-{{ number_format($couponDiscount,2) }} {{ $currency }}</th>
                    </tr>
                  @endif
                  <tr>
                    <th class="fs-5">Total</th><th></th>
                    <th class="text-end fs-5">{{ number_format($total,2) }} {{ $currency }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>

          <div class="card-footer d-flex gap-2">
            <a href="{{ route('cart.index') }}" class="btn btn-light">Back to Cart</a>
          </div>
        </div>
      </div>

      {{-- right: payment --}}
      <div class="col-lg-5">
        <div class="card shadow-sm">
          <div class="card-header fw-semibold">Payment</div>
          <div class="card-body">
            @auth
              <form method="POST" action="{{ route('checkout.fake') }}"
                    onsubmit="return confirm('Confirm your enrollment/payment?');">
                @csrf
                <div class="mb-3">
                  <label for="gateway" class="form-label">Select Payment Method</label>
                  <select id="gateway" name="gateway" class="form-select" required>
                    <option value="">-- Choose a method --</option>
                    <option value="jazzcash">JazzCash</option>
                    <option value="stripe">Stripe</option>
                    <option value="manual">Manual Payment (Confirm & Enroll)</option>
                  </select>
                </div>
                <button class="btn btn-success w-100">Buy Now</button>
              </form>
            @endauth

            @guest
              <div class="alert alert-info">
                Please
                <a href="{{ route('checkout.auth', ['force'=>1, 'tab'=>'register', 'intended'=>route('cart.checkout')]) }}">
                  log in / register
                </a>
                to complete your purchase.
              </div>
            @endguest

            <div class="text-muted small mt-3">
              By placing your order you agree to our Terms & Refund Policy.
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header, .header-section, .main-header, .navbar');
    if (header && getComputedStyle(header).position === 'fixed') {
      document.body.style.paddingTop = header.offsetHeight + 'px';
    }
  });
</script>
@endsection
