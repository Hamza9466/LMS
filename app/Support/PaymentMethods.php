<?php

namespace App\Support;

use App\Models\PaymentMethodSetting;

class PaymentMethods
{
    /**
     * Payment methods for checkout / admin: config defaults merged with DB overrides.
     *
     * @return array<string, array{label: string, number: string, detail: string}>
     */
    public static function merged(): array
    {
        $defaults = config('payment.methods', []);
        $rows = PaymentMethodSetting::query()->get()->keyBy('gateway');

        $out = [];
        foreach ($defaults as $key => $base) {
            $row = $rows->get($key);
            $out[$key] = [
                'label' => ($row && filled($row->label)) ? $row->label : ($base['label'] ?? ucfirst($key)),
                'number' => ($row && filled($row->number)) ? $row->number : ($base['number'] ?? ''),
                'detail' => ($row && filled($row->detail)) ? $row->detail : ($base['detail'] ?? ''),
            ];
        }

        return $out;
    }

    /**
     * @return list<string>
     */
    public static function gatewayKeys(): array
    {
        return array_keys(self::merged());
    }
}
