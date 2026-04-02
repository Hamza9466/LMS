<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PersonalDiscount;
use App\Support\PaymentMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CheckoutController extends Controller
{
    /** Helper: get a course id from a cart row no matter how it’s shaped */
    private function rowCourseId(array $row): int
    {
        return (int)($row['course_id']
            ?? $row['id']
            ?? ($row['course']['id'] ?? 0));
    }

    /** BUY NOW: build a 1-item cart with image + slug so thumbnails render */
    public function buyNow(Request $req, Course $course)
    {
        $unit = (float)($course->discount_price ?? $course->price ?? 0);

        $cart = [
            $course->id => [
                'course_id' => $course->id,
                'title'     => $course->title,
                'slug'      => $course->slug,
                'thumbnail' => $course->thumbnail,  // blade resolver will handle storage/…
                'qty'       => 1,
                'price'     => $unit,
            ],
        ];

        session(['cart' => $cart]);
        session()->forget('coupon');

        return redirect()->route('cart.index')->with('success', 'Ready to checkout.');
    }

    /** Checkout: free orders enroll immediately; paid orders need payment proof → admin approval */
    public function fakeCheckout(Request $req)
    {
        $cart = session('cart', []);
        if (empty($cart)) {
            return back()->withErrors('Cart is empty');
        }

        if (!auth()->check()) {
            return redirect()
                ->route('checkout.auth', ['force' => 1, 'intended' => route('cart.checkout')])
                ->with('error', 'Please log in to complete your purchase.');
        }

        $userId   = auth()->id();
        $currency = env('APP_CURRENCY', 'USD');

        $subtotal              = 0.0;
        $personalDiscountTotal = 0.0;

        foreach ($cart as $row) {
            $qty       = (int)($row['qty'] ?? 1);
            $unitPrice = (float)($row['price'] ?? 0);
            $subtotal += $unitPrice * $qty;

            $courseId = $this->rowCourseId($row);
            if ($courseId > 0) {
                $personalDiscountTotal += PersonalDiscount::bestUnitValue($userId, $courseId, $unitPrice) * $qty;
            }
        }

        $coupon         = session('coupon');
        $couponDiscount = (float)($coupon['amount'] ?? 0);
        $discount       = $personalDiscountTotal + $couponDiscount;
        $total          = max($subtotal - $discount, 0);

        $allowedGateways = PaymentMethods::gatewayKeys();

        if ($total <= 0) {
            $validated = $req->validate([
                'gateway' => ['nullable', 'string', 'in:'.implode(',', $allowedGateways ?: ['manual'])],
            ]);
            $gateway = $validated['gateway'] ?? 'manual';
        } else {
            $validated = $req->validate([
                'gateway'       => ['required', 'string', 'in:'.implode(',', $allowedGateways ?: ['manual'])],
                'payment_proof' => ['required', 'file', 'image', 'max:5120'],
            ]);
            $gateway = $validated['gateway'];
        }

        $proofPath = null;
        if ($total > 0 && $req->hasFile('payment_proof')) {
            $proofPath = $req->file('payment_proof')->store('payment-proofs', 'public');
        }

        $order = Order::create([
            'user_id'             => $userId,
            'status'              => $total > 0 ? 'pending_verification' : 'pending',
            'currency'            => $currency,
            'subtotal'            => $subtotal,
            'discount'            => $discount,
            'total'               => $total,
            'gateway'             => $gateway,
            'coupon_id'           => $coupon['id'] ?? null,
            'payment_proof_path'  => $proofPath,
            'meta'                => [
                'cart'                  => $cart,
                'coupon'                => $coupon,
                'personal_discount_sum' => $personalDiscountTotal,
            ],
        ]);

        foreach ($cart as $row) {
            OrderItem::create([
                'order_id'  => $order->id,
                'course_id' => $this->rowCourseId($row),
                'price'     => (float)($row['price'] ?? 0),
            ]);
        }

        if ($total <= 0) {
            $order->markPaid('FREE-'.$order->id.'-'.now()->timestamp, ['note' => 'Zero total checkout']);
            session()->forget(['cart', 'coupon']);
            return redirect()->route('checkout.success', $order)
                ->with('success', 'Enrollment confirmed.');
        }

        session()->forget(['cart', 'coupon']);

        return redirect()->route('checkout.success', $order)
            ->with('success', 'Payment proof received. An administrator will review and approve your enrollment shortly.');
    }

    public function success(Request $req, Order $order)
    {
        if ((int) $order->user_id !== (int) auth()->id()) {
            abort(403);
        }
        $order->load('items');
        return view('website.pages.cart.success', compact('order'));
    }

    public function cancel(Order $order)
    {
        $order->update(['status' => 'canceled']);
        return redirect()->route('cart.index')->with('error', 'Payment canceled.');
    }
}