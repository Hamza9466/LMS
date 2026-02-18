<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Base query
        $query = Transaction::latest();

        // Apply search filter
        if ($request->filled('q')) {
            $query->where(function($q) use ($request) {
                $q->where('reference', 'like', '%'.$request->q.'%')
                  ->orWhere('amount', 'like', '%'.$request->q.'%')
                  ->orWhere('currency', 'like', '%'.$request->q.'%');
            });
        }

        // Filter by gateway
        if ($request->filled('gateway')) {
            $query->where('gateway', $request->gateway);
        }

        // Filter by status (optional if you add status dropdown)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Paginate results (10 per page)
        $tx = $query->paginate(10)->withQueryString();

        // Distinct values for filters
        $gateways = Transaction::select('gateway')->distinct()->pluck('gateway')->sort()->values();
        $statuses = Transaction::select('status')->distinct()->pluck('status')->sort()->values();

        return view('admin.pages.transactions.index', compact('tx','gateways','statuses'));
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()
            ->route('admin.transactions.index')
            ->with('success', 'Transaction deleted successfully.');
    }
}