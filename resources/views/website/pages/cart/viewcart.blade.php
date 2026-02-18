{{-- resources/views/website/pages/cart/viewcart.blade.php --}}
@extends('website.layouts.main')

@section('content')

{{-- ===== Kill accidental top spacer from sticky headers ===== --}}
<style>
  html, body { margin-top:0 !important; padding-top:0 !important; }
  .header-spacer, .sticky-spacer, .navbar-spacer { display:none !important; height:0 !important; }
  .page-banner { margin-top: 0 !important; }
</style>

@php
  use Illuminate\Support\Str;

  // ===== Safe fallbacks so the page renders even if controller didn't pass vars =====
  $cart   = $cart   ?? session('cart', []);
  $coupon = $coupon ?? session('coupon');

  if (!isset($subtotal) || !isset($discount) || !isset($total)) {
      $subtotal = 0.0;
      foreach ($cart as $row) {
          $qty       = (int)($row['qty'] ?? 1);
          $unitPrice = (float)($row['price'] ?? 0);
          $subtotal += $unitPrice * $qty;
      }
      // Only coupon here; personal discount is applied later on checkout
      $discount = (float)($coupon['amount'] ?? 0);
      $total    = max($subtotal - $discount, 0);
  }

  // Small helper to normalize any thumbnail path into a usable URL
  if (!function_exists('cart_thumb_url')) {
      function cart_thumb_url($raw) {
          if (!$raw) return asset('assets/images/product/product-2.png');

          // Already a full URL or data URI
          if (Str::startsWith($raw, ['http://','https://','data:image'])) {
              return $raw;
          }

          // Common relative public paths (e.g., "storage/...", "uploads/...", "assets/...")
          if (Str::startsWith($raw, ['storage/','uploads/','assets/'])) {
              return asset($raw);
          }

          // If the file actually sits under public/ directly
          if (file_exists(public_path($raw))) {
              return asset($raw);
          }

          // Try storage path as fallback
          if (file_exists(public_path('storage/'.$raw))) {
              return asset('storage/'.$raw);
          }

          // Fallback
          return asset('assets/images/product/product-2.png');
      }
  }
@endphp

{{-- ===== Page Banner ===== --}}
<div class="page-banner bg-color-05">
  <div class="page-banner__wrapper">
    <div class="container">
      <div class="page-breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item active">Cart</li>
        </ul>
      </div>
      <div class="page-banner__caption text-center">
        <h2 class="page-banner__main-title">Cart</h2>
      </div>
    </div>
  </div>
</div>

{{-- ===== Cart Section ===== --}}
<div class="cart-section section-padding-01">
  <div class="container custom-container">

    {{-- Flash / Errors --}}
    @if (session('success'))
      <div class="alert alert-success mb-4">{{ session('success') }}</div>
    @endif
    @if (session('error'))
      <div class="alert alert-danger mb-4">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
      <div class="alert alert-danger mb-4">{{ $errors->first() }}</div>
    @endif

    {{-- Guest notice --}}
    @guest
      <div class="alert alert-info mb-4">
        Please
        <a class="alert-link"
           href="{{ route('checkout.auth', ['tab' => 'register', 'intended' => route('cart.checkout')]) }}">
          log in or register
        </a>
        to proceed to checkout.
      </div>
    @endguest

    {{-- Cart Table --}}
    <div class="cart-table table-responsive">
      <table class="table">
        <thead>
          <tr>
            <th class="product">Product</th>
            <th class="price">Price</th>
            <th class="quantity">Quantity</th>
            <th class="subtotal">Subtotal</th>
            <th class="action"></th>
          </tr>
        </thead>

        <tbody>
        @forelse($cart as $row)
          @php
            $qty       = (int)($row['qty'] ?? 1);
            $unitPrice = (float)($row['price'] ?? 0);
            $lineTotal = $unitPrice * $qty;

            // Resolve thumbnail URL robustly
            $thumbRaw = (string)($row['thumbnail'] ?? '');
            $thumbUrl = cart_thumb_url($thumbRaw);
          @endphp
          <tr>
            <td class="product">
              <div class="cart-product">
                <div class="cart-product__thumbnail">
                  <img src="{{ $thumbUrl }}" alt="Course" width="70" height="81" style="object-fit:cover">
                </div>
                <div class="cart-product__content">
                  <h3 class="cart-product__name">{{ $row['title'] ?? 'Course' }}</h3>
                  @if(!empty($row['slug']))
                    <div class="text-muted small">/{{ $row['slug'] }}</div>
                  @endif
                </div>
              </div>
            </td>

            <td class="price">
              <div class="cart-product__price">
                <span class="sale-price">
                  {{ number_format($unitPrice,2) }} {{ env('APP_CURRENCY','USD') }}
                </span>
              </div>
            </td>

            <td class="quantity">
              <div class="cart-product">
                <div class="product-quantity">
                  <input type="text" value="{{ $qty }}" readonly>
                </div>
              </div>
            </td>

            <td class="subtotal">
              <div class="cart-product__total-price">
                <span class="sale-price discount">
                  {{ number_format($lineTotal,2) }} {{ env('APP_CURRENCY','USD') }}
                </span>
              </div>
            </td>

            <td class="action">
              <div class="cart-product__remove">
                <form method="POST" action="{{ route('cart.remove') }}">
                  @csrf
                  <input type="hidden" name="course_id" value="{{ $row['course_id'] }}">
                  <button type="submit" class="remove btn btn-link p-0">Remove</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center text-muted">Your cart is empty.</td>
          </tr>
        @endforelse
        </tbody>
      </table>
    </div>

    {{-- Cart Actions --}}
    <div class="cart-action d-flex flex-wrap justify-content-between gap-2">
      <div class="cart-action__left">
        <a class="btn btn-light btn-hover-primary" href="{{ url()->previous() }}">Continue shopping</a>
      </div>
    </div>

    {{-- Collaterals: Coupon + Totals --}}
    <div class="cart-collaterals">
      <div class="row gy-6">

        {{-- Coupon --}}
        <div class="col-lg-4">
          <div class="cart-collaterals__item">
            <h5 class="cart-collaterals__title">Coupon Discount</h5>
            <p>Enter your coupon code if you have one.</p>

            <form method="POST" action="{{ route('cart.coupon') }}">
              @csrf
              <div class="cart-collaterals__input">
                <input type="text" class="form-control" name="code" placeholder="Coupon code" required>
              </div>
              <div class="cart-collaterals__input">
                <button class="btn btn-primary btn-hover-secondary">Apply Coupon</button>
              </div>
            </form>
          </div>
        </div>

        {{-- Optional info box --}}
        <div class="col-lg-4">
          <div class="cart-collaterals__item">
            <h5 class="cart-collaterals__title">Notes</h5>
            <p>Digital courses will be available in your dashboard immediately after payment.</p>
          </div>
        </div>

        {{-- Totals --}}
        <div class="col-lg-4">
          <div class="cart-collaterals__item">
            <div class="cart-collaterals__box">
              <table class="cart-collaterals__table">
                <tbody>
                  <tr class="cart-subtotal">
                    <th>Subtotal</th>
                    <td>
                      <span class="subtotal-price">
                        {{ number_format($subtotal,2) }} {{ env('APP_CURRENCY','USD') }}
                      </span>
                    </td>
                  </tr>
                  <tr class="cart-shipping">
                    <th>
                      Discount
                      @if(!empty($coupon) && !empty($coupon['code']))
                        ({{ $coupon['code'] }})
                      @endif
                    </th>
                    <td>
                      <span class="shipping-fee">
                        {{ ($discount ?? 0) > 0 ? '-' : '' }}{{ number_format($discount ?? 0,2) }} {{ env('APP_CURRENCY','USD') }}
                      </span>
                    </td>
                  </tr>
                  <tr class="order-total">
                    <th>Total</th>
                    <td>
                      <span class="total-price">
                        {{ number_format($total,2) }} {{ env('APP_CURRENCY','USD') }}
                      </span>
                    </td>
                  </tr>
                </tbody>
              </table>

              <div class="cart-collaterals__btn">
                @if (!empty($cart))
                  <a class="btn btn-primary btn-hover-secondary w-100"
                     href="{{ route('checkout.auth', [
                        'force'    => 1,
                        'tab'      => 'register',
                        'intended' => route('cart.checkout')
                     ]) }}">
                    Login / Register to Checkout
                  </a>
                @endif
              </div>

            </div>
          </div>
        </div>

      </div>
    </div>

  </div>
</div>

{{-- Add body padding only if header is actually fixed (prevents random giant gap) --}}
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const header = document.querySelector('header, .header-section, .main-header, .navbar');
    if (header && getComputedStyle(header).position === 'fixed') {
      document.body.style.paddingTop = header.offsetHeight + 'px';
    }
  });
</script>
@endsection
