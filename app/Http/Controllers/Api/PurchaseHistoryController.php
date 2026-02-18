<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseHistoryController extends Controller
{
    /**
     * 📍 GET /api/purchase-history
     * Returns purchase history formatted for frontend display
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Unauthenticated.'
            ], 401);
        }

        $query = Order::query()->latest('created_at');

        // Role-based access
        if ($user->role === 'admin') {
            $orders = $query->with(['items.course:id,title,price,discount_price'])->paginate(10);
        } elseif ($user->role === 'teacher') {
            $orders = $query
                ->whereHas('items.course', fn($q) => $q->where('teacher_id', $user->id))
                ->with(['items.course:id,title,price,discount_price,teacher_id'])
                ->paginate(10);
        } else {
            $orders = $query
                ->where('user_id', $user->id)
                ->with(['items.course:id,title,price,discount_price'])
                ->paginate(10);
        }

        // ✅ Format response for frontend
        $formatted = [];
        $counter = ($orders->currentPage() - 1) * $orders->perPage() + 1;

        foreach ($orders as $order) {
            foreach ($order->items as $item) {
                $course = $item->course;

                // ✅ Choose discounted price if available
                $amount = $course->discount_price && $course->discount_price > 0
                    ? $course->discount_price
                    : $course->price;

                $formatted[] = [
                    'index'         => '#' . $counter++,
                    'course_id'     => $course->id ?? null,
                    'course_title'  => $course->title ?? 'N/A',
                    'amount'        => '$' . number_format($amount ?? 0, 2),
                    'status'        => ucfirst($order->payment_status ?? 'Completed'),
                    'date'          => $order->created_at->format('F d, Y'),
                ];
            }
        }

        return response()->json([
            'status' => true,
            'message' => 'Purchase history fetched successfully.',
            'data' => $formatted
        ], 200);
    }
}