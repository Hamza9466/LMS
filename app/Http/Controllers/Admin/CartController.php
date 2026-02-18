<?php

namespace App\Http\Controllers\Admin;

use App\Models\Coupon;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\PersonalDiscount;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /** View Cart page */
    public function index(Request $req)
    {
        $cart     = $this->cart();
        $subtotal = $this->subtotal($cart);
        $coupon   = session('coupon');
        $discount = $coupon['amount'] ?? 0;
        $total    = max($subtotal - $discount, 0);

        // Blade: resources/views/admin/pages/cart/view-cart.blade.php
        return view('website.pages.cart.viewcart', compact('cart','subtotal','discount','total','coupon'));
    }

    /** Checkout page (GET) */
  public function checkoutPage(Request $request)
    {
        $cart     = session('cart', []);
        $currency = env('APP_CURRENCY', 'USD');

        // subtotal
        $subtotal = 0.0;
        foreach ($cart as $row) {
            $qty   = (int)($row['qty'] ?? 1);
            $price = (float)($row['price'] ?? 0);
            $subtotal += $qty * $price;
        }

        // personal discounts for logged-in user
        $userId = auth()->id();
        $personalDiscountTotal = 0.0;

        if ($userId && !empty($cart)) {
            $courseIds = collect($cart)->pluck('course_id')->filter()->unique()->values();

            if ($courseIds->isNotEmpty()) {
                $now = now();

                $pds = PersonalDiscount::where('user_id', $userId)
                    ->whereIn('course_id', $courseIds)
                    ->where('active', true)
                    ->where(function ($q) use ($now) {
                        $q->whereNull('starts_at')->orWhere('starts_at', '<=', $now);
                    })
                    ->where(function ($q) use ($now) {
                        $q->whereNull('ends_at')->orWhere('ends_at', '>=', $now);
                    })
                    ->where(function ($q) {
                        $q->whereNull('max_uses')->orWhereColumn('uses', '<', 'max_uses');
                    })
                    ->get()
                    ->keyBy('course_id');

                foreach ($cart as $row) {
                    $qty       = (int)($row['qty'] ?? 1);
                    $unitPrice = (float)($row['price'] ?? 0);
                    $pd        = $pds[$row['course_id']] ?? null;

                    if ($pd) {
                        $unitPersonal = $pd->type === 'percent'
                            ? round($unitPrice * ((float)$pd->value / 100), 2)
                            : (float) min($unitPrice, (float)$pd->value);

                        $personalDiscountTotal += $unitPersonal * $qty;
                    }
                }
            }
        }

        // coupon
        $coupon         = session('coupon');
        $couponDiscount = (float)($coupon['amount'] ?? 0);

        // totals
        $discount = $personalDiscountTotal + $couponDiscount;
        $total    = max($subtotal - $discount, 0);

        // IMPORTANT: render your website checkout view
        return view('website.pages.cart.checkout', [
            'cart'                  => $cart,
            'currency'              => $currency,
            'subtotal'              => $subtotal,
            'personalDiscountTotal' => $personalDiscountTotal,
            'coupon'                => $coupon,
            'couponDiscount'        => $couponDiscount,
            'discount'              => $discount,
            'total'                 => $total,
        ]);
    }





    /** Add course to cart */
    public function add(Request $req, Course $course)
    {
        $cart = $this->cart();

        $cart[$course->id] = [
            'id'        => $course->id,  // useful for header mini-cart
            'course_id' => $course->id,
            'slug'      => $course->slug ?? null,
            'thumbnail' => $course->thumbnail_url ?? $course->thumbnail ?? null,
            'title'     => $course->title,
            'qty'       => (int) $req->input('qty', 1),
            'price'     => (float) ($course->discount_price ?? $course->price ?? 0),
        ];

        session(['cart' => $cart]);

return redirect()->route('cart.index')->with('success', 'Added to cart.');
    }

    /** Remove a course from cart (expects POST course_id) */
    public function remove(Request $req)
    {
        $data = $req->validate(['course_id' => ['required','integer']]);

        $cart = $this->cart();
        unset($cart[$data['course_id']]);
        session(['cart' => $cart]);

        // If cart changed, drop coupon
        session()->forget('coupon');

        return back()->with('success', 'Removed from cart.');
    }

    /** Apply coupon */
    public function applyCoupon(Request $req)
    {
        $req->validate(['code' => 'required|string']);

        $cart = $this->cart();
        if (empty($cart)) {
            return back()->withErrors('Cart is empty.');
        }

        $subtotal = $this->subtotal($cart);

        $coupon = Coupon::where('code', strtoupper($req->code))->first();
        if (!$coupon || !$coupon->isValidFor($subtotal)) {
            session()->forget('coupon');
            return back()->withErrors(['code' => 'Invalid or ineligible coupon']);
        }

        session(['coupon' => [
            'id'     => $coupon->id,
            'code'   => $coupon->code,
            'amount' => $coupon->discountAmount($subtotal),
        ]]);

        return back()->with('success', 'Coupon applied.');
    }

    /* ----------------- Helpers ----------------- */

    private function cart(): array
    {
        return session('cart', []);
    }

    private function subtotal(array $cart): float
    {
        return array_reduce($cart, fn($c,$i) => $c + ((float)$i['price'] * (int)($i['qty'] ?? 1)), 0.0);
    }
}