<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Support\PaymentMethods;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaymentOrderController extends Controller
{
    private const REVIEW_PENDING = 'pending';

    private const REVIEW_PAID = 'paid';

    private const REVIEW_REJECTED = 'rejected';

    private const REVIEW_ALL = 'all';

    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index(Request $request)
    {
        $paymentMethods = PaymentMethods::merged();
        $gateways = array_keys($paymentMethods);

        $review = $request->get('review', self::REVIEW_PENDING);
        $allowedReview = [self::REVIEW_PENDING, self::REVIEW_PAID, self::REVIEW_REJECTED, self::REVIEW_ALL];
        if (! in_array($review, $allowedReview, true)) {
            $review = self::REVIEW_PENDING;
        }

        $query = Order::query()->with(['user', 'items']);

        if ($review === self::REVIEW_PENDING) {
            $query->where('status', 'pending_verification');
        } elseif ($review === self::REVIEW_PAID) {
            $query->where('status', 'paid')->whereNotNull('payment_proof_path');
        } elseif ($review === self::REVIEW_REJECTED) {
            $query->where('status', 'rejected');
        } else {
            $query->whereIn('status', ['pending_verification', 'paid', 'rejected'])
                ->where(function ($q) {
                    $q->whereNotNull('payment_proof_path')
                        ->orWhere('status', 'pending_verification');
                });
        }

        if ($request->filled('gateway') && in_array($request->gateway, $gateways, true)) {
            $query->where('gateway', $request->gateway);
        }

        $orders = $query->latest()->paginate(20)->withQueryString();

        return view('admin.pages.payment-orders.index', compact('orders', 'gateways', 'review', 'paymentMethods'));
    }

    public function show(Order $order)
    {
        $allowedStatuses = ['pending_verification', 'paid', 'rejected'];
        if (! in_array($order->status, $allowedStatuses, true)) {
            return redirect()->route('admin.payment-orders.index')
                ->with('error', 'This order is not part of the payment verification list.');
        }
        $order->load(['user', 'items.course']);
        $canReview = $order->status === 'pending_verification';
        $paymentMethods = PaymentMethods::merged();

        return view('admin.pages.payment-orders.show', compact('order', 'canReview', 'paymentMethods'));
    }

    public function approve(Request $request, Order $order)
    {
        if ($order->status !== 'pending_verification') {
            return back()->with('error', 'Order is not pending verification.');
        }

        $order->load('items');
        $order->markPaid('APPROVED-'.$order->id.'-'.now()->timestamp, [
            'approved_by' => auth()->id(),
        ]);

        $order->update([
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
            'admin_review_note' => null,
        ]);

        return redirect()->route('admin.payment-orders.index')
            ->with('success', 'Payment approved. Student is now enrolled.');
    }

    public function reject(Request $request, Order $order)
    {
        if ($order->status !== 'pending_verification') {
            return back()->with('error', 'Order is not pending verification.');
        }

        $data = $request->validate([
            'admin_review_note' => ['nullable', 'string', 'max:2000'],
        ]);

        $order->update([
            'status' => 'rejected',
            'admin_review_note' => $data['admin_review_note'] ?? null,
            'reviewed_at' => now(),
            'reviewed_by' => auth()->id(),
        ]);

        return redirect()->route('admin.payment-orders.index')
            ->with('success', 'Payment rejected. Student was not enrolled.');
    }

    public function destroy(Request $request, Order $order)
    {
        if (! in_array($order->status, ['pending_verification', 'rejected'], true)) {
            return back()->with('error', 'Only pending or rejected orders can be deleted.');
        }

        if ($order->payment_proof_path) {
            Storage::disk('public')->delete($order->payment_proof_path);
        }

        $order->delete();

        return redirect()
            ->route('admin.payment-orders.index', $request->only(['review', 'gateway']))
            ->with('success', 'Order deleted.');
    }
}
