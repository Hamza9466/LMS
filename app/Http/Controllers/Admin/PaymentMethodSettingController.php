<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethodSetting;
use App\Support\PaymentMethods;
use Illuminate\Http\Request;

class PaymentMethodSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function edit()
    {
        $methods = PaymentMethods::merged();

        return view('admin.pages.payment-methods.edit', compact('methods'));
    }

    public function update(Request $request)
    {
        $keys = array_keys(config('payment.methods', []));
        if ($keys === []) {
            return back()->with('error', 'No payment methods are defined in config.');
        }

        $rules = [
            'methods' => ['required', 'array'],
        ];
        foreach ($keys as $k) {
            $rules["methods.{$k}.label"] = ['nullable', 'string', 'max:255'];
            $rules["methods.{$k}.number"] = ['nullable', 'string', 'max:255'];
            $rules["methods.{$k}.detail"] = ['nullable', 'string', 'max:5000'];
        }

        $validated = $request->validate($rules);

        foreach ($keys as $gateway) {
            $payload = $validated['methods'][$gateway] ?? [];
            PaymentMethodSetting::updateOrCreate(
                ['gateway' => $gateway],
                [
                    'label' => filled($payload['label'] ?? '') ? $payload['label'] : null,
                    'number' => filled($payload['number'] ?? '') ? $payload['number'] : null,
                    'detail' => filled($payload['detail'] ?? '') ? $payload['detail'] : null,
                ]
            );
        }

        return redirect()
            ->route('admin.payment-methods.edit')
            ->with('success', 'Payment methods updated. Checkout and filters will use these values.');
    }
}
