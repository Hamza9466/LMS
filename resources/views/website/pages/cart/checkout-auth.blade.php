@extends('website.layouts.main')

@section('content')

<style>
  html, body { margin-top:0 !important; padding-top:0 !important; }
  .header-spacer, .sticky-spacer, .navbar-spacer { display:none !important; height:0 !important; }
  .page-banner { margin-top: 0 !important; }
  .tab-pane { display:none; }
  .tab-pane.show.active { display:block; }
  .nav-tabs .nav-link.active { font-weight:600; }
  @media (min-width: 992px) { .card .table-responsive { overflow-x: visible; } }
</style>

<div class="page-banner bg-color-05">
  <div class="page-banner__wrapper">
    <div class="container">
      <div class="page-breadcrumb">
        <ul class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{ route('cart.index') }}">Cart</a></li>
          <li class="breadcrumb-item active">Checkout – Sign in</li>
        </ul>
      </div>
      <div class="page-banner__caption text-center">
        <h2 class="page-banner__main-title">Checkout – Sign in</h2>
      </div>
    </div>
  </div>
</div>

@php
  use App\Models\PersonalDiscount;

  $currency = env('APP_CURRENCY', 'USD');
  $cart     = session('cart', []);
  $coupon   = session('coupon');
  $subtotal = 0.0;

  foreach ($cart as $row) {
    $qty       = (int)($row['qty'] ?? 1);
    $unitPrice = (float)($row['price'] ?? 0);
    $subtotal += $unitPrice * $qty;
  }

  // Coupon part
  $couponDiscount = (float)($coupon['amount'] ?? 0);

  // === NEW: Personal discount (only when logged in as the student) ===
  $personalDiscountTotal = 0.0;
  $uid = auth()->id();
  if ($uid) {
      foreach ($cart as $row) {
          $qty       = (int)($row['qty'] ?? 1);
          $unitPrice = (float)($row['price'] ?? 0);
          $cid       = (int)($row['course_id'] ?? 0);

          if ($cid > 0 && $unitPrice > 0) {
              $unitPD = PersonalDiscount::bestUnitValue($uid, $cid, $unitPrice);
              $personalDiscountTotal += $unitPD * $qty;
          }
      }
  }

  $discount = $couponDiscount + $personalDiscountTotal;
  $total    = max($subtotal - $discount, 0);

  $first = $cart ? reset($cart) : null;
  $firstCourseId = $first['course_id'] ?? null;

  $activeTab = session('tab','register');
  $intended  = request('intended', route('cart.checkout'));
@endphp

{{-- Image resolver --}}
@php
if (!function_exists('cart_thumb_url')) {
    function cart_thumb_url($path) {
        $fallback = asset('assets/images/product/product-2.png');
        if (!$path) return $fallback;
        if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
        if (\Illuminate\Support\Str::startsWith($path, ['/','storage/'])) {
            return asset(\Illuminate\Support\Str::startsWith($path, ['/']) ? ltrim($path,'/') : $path);
        }
        return asset('storage/'.$path);
    }
}
@endphp

<div class="section-padding-01">
  <div class="container custom-container">

    @if ($errors->any())
      <div class="alert alert-danger mb-4">{{ $errors->first() }}</div>
    @endif
    @if (session('success')) <div class="alert alert-success mb-4">{{ session('success') }}</div> @endif
    @if (session('error'))   <div class="alert alert-danger mb-4">{{ session('error') }}</div>   @endif

    <div class="row gy-6">
      {{-- LEFT: Order Summary --}}
      <div class="col-lg-5">
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
                      $thumbUrl  = cart_thumb_url($row['thumbnail'] ?? null);
                    @endphp
                    <tr>
                      <td>
                        <div class="cart-product d-flex align-items-center">
                          <div class="cart-product__thumbnail me-3">
                            <img src="{{ $thumbUrl }}" alt="{{ $row['title'] ?? 'Course' }}" width="60" height="70" style="object-fit:cover">
                          </div>
                          <div class="cart-product__content">
                            <h6 class="m-0">{{ $row['title'] ?? 'Course' }}</h6>
                            @if(!empty($row['slug'])) <div class="text-muted small">/{{ $row['slug'] }}</div> @endif
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
                    <th>Personal Discount</th><th></th>
                    <th class="text-end text-success">-{{ number_format($personalDiscountTotal,2) }} {{ $currency }}</th>
                  </tr>
                  @endif

                  <tr>
                    <th>
                      Coupon Discount
                      @if(!empty($coupon) && !empty($coupon['code'])) ({{ $coupon['code'] }}) @endif
                    </th>
                    <th></th>
                    <th class="text-end text-success">{{ $couponDiscount > 0 ? '-' : '' }}{{ number_format($couponDiscount,2) }} {{ $currency }}</th>
                  </tr>

                  <tr>
                    <th class="fs-5">Total</th><th></th>
                    <th class="text-end fs-5">{{ number_format($total,2) }} {{ $currency }}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <div class="card-footer">
            <a href="{{ route('cart.index') }}" class="btn btn-light w-100">Back to Cart</a>
          </div>
        </div>
      </div>

      {{-- RIGHT: Login / Register --}}
      <div class="col-lg-7">
        <div class="card shadow-sm">
          <div class="card-header fw-semibold">Continue</div>
          <div class="card-body">

            <ul class="nav nav-tabs" role="tablist" id="authTabs">
              <li class="nav-item">
                <button class="nav-link {{ $activeTab==='login'?'active':'' }}" data-bs-toggle="tab" data-bs-target="#tab-login" type="button" role="tab">
                  Login
                </button>
              </li>
              <li class="nav-item">
                <button class="nav-link {{ $activeTab==='register'?'active':'' }}" data-bs-toggle="tab" data-bs-target="#tab-register" type="button" role="tab">
                  Register
                </button>
              </li>
            </ul>

            <div class="tab-content pt-3" id="authTabContent">
              {{-- LOGIN --}}
              <div class="tab-pane fade {{ $activeTab==='login'?'show active':'' }}" id="tab-login" role="tabpanel">
                <form method="POST" action="{{ route('login.post') }}" class="row g-3" novalidate>
                  @csrf
                  <input type="hidden" name="intended" value="{{ $intended }}">
                  @if($firstCourseId)
                    <input type="hidden" name="course_id" value="{{ $firstCourseId }}">
                  @endif

                  <div class="col-12">
                    <label class="form-label">Email or Username</label>
                    <input type="text" name="login" value="{{ old('login') }}" class="form-control" required>
                  </div>
                  <div class="col-12">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>

                  <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="remember" id="remember">
                      <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-hover-secondary">Login &amp; Continue</button>
                  </div>
                </form>
              </div>

              {{-- REGISTER --}}
              <div class="tab-pane fade {{ $activeTab==='register'?'show active':'' }}" id="tab-register" role="tabpanel">
                <form method="POST" action="{{ route('register.post') }}" class="row g-3" novalidate enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="intended" value="{{ $intended }}">
                  @if($firstCourseId)
                    <input type="hidden" name="course_id" value="{{ $firstCourseId }}">
                  @endif

                  <div class="col-md-6">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                  </div>

                  <div class="col-md-6">
                    <label class="form-label">Phone (optional)</label>
                    <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Profile Image (optional)</label>
                    <input type="file" name="profile_image" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                      <option value="">Select gender</option>
                      <option value="male"   {{ old('gender')==='male'?'selected':'' }}>Male</option>
                      <option value="female" {{ old('gender')==='female'?'selected':'' }}>Female</option>
                      <option value="other"  {{ old('gender')==='other'?'selected':'' }}>Other</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">DOB</label>
                    <input type="date" name="dob" value="{{ old('dob') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Address</label>
                    <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">City</label>
                    <input type="text" name="city" value="{{ old('city') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Country</label>
                    <input type="text" name="country" value="{{ old('country') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Institute Name</label>
                    <input type="text" name="institute_name" value="{{ old('institute_name') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Program Name</label>
                    <input type="text" name="program_name" value="{{ old('program_name') }}" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label class="form-label">Enrollment Year</label>
                    <input type="number" name="enrollment_year" value="{{ old('enrollment_year') }}" class="form-control" min="1900" max="{{ now()->year + 1 }}">
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" id="terms" name="terms" {{ old('terms') ? 'checked' : '' }} required>
                      <label class="form-check-label" for="terms">I agree to the Terms</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <button class="btn btn-primary btn-hover-secondary">Create Account &amp; Continue</button>
                  </div>
                </form>
              </div>
            </div> {{-- /.tab-content --}}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const tabButtons = Array.from(document.querySelectorAll('[data-bs-toggle="tab"]'));
    const content    = document.getElementById('authTabContent');
    function activate(btn, targetSel) {
      document.querySelectorAll('#authTabs .nav-link').forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      content.querySelectorAll('.tab-pane').forEach(p => p.classList.remove('show','active'));
      const pane = document.querySelector(targetSel);
      if (pane) pane.classList.add('show','active');
    }
    tabButtons.forEach(btn => {
      btn.addEventListener('click', function (e) {
        e.preventDefault();
        const target = btn.getAttribute('data-bs-target');
        if (target) activate(btn, target);
      });
    });
    const header = document.querySelector('header, .header-section, .main-header, .navbar');
    if (header && getComputedStyle(header).position === 'fixed') {
      document.body.style.paddingTop = header.offsetHeight + 'px';
    }
  });
</script>
@endsection
