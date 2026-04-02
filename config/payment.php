<?php

$methods = [
    'jazzcash' => [
        'label' => 'JazzCash',
        'number' => env('PAYMENT_JAZZCASH_NUMBER', '0321-0000000'),
        'detail' => env('PAYMENT_JAZZCASH_INSTRUCTIONS', 'JazzCash: Send the total amount to the number shown in the list. Put your registered email in the payment note. Then upload your payment screenshot below.'),
    ],
    'stripe' => [
        'label' => 'Card / Stripe',
        'number' => env('PAYMENT_STRIPE_REF', '—'),
        'detail' => env('PAYMENT_STRIPE_INSTRUCTIONS', 'Stripe / card: Complete payment using your card if a payment link is provided, or pay via bank transfer and upload the receipt screenshot below.'),
    ],
    'manual' => [
        'label' => 'Bank transfer',
        'number' => env('PAYMENT_BANK_IBAN', 'PK00DEMO000000000000'),
        'detail' => env('PAYMENT_MANUAL_INSTRUCTIONS', 'Bank transfer: Use the account / IBAN shown in the list. Title: Your full name. Reference: Your account email. Then upload proof below.'),
    ],
];

return [

    /**
     * Each method: label (dropdown title), number (shown in select + detail box), detail (full instructions).
     * Keys are stored on orders as `gateway`.
     */
    'methods' => $methods,

    /** Allowed gateway keys (same as method keys). */
    'gateways' => array_keys($methods),

    /** Keyed by gateway — used by checkout JS to show instructions when a method is selected. */
    'instructions' => collect($methods)->mapWithKeys(fn (array $m, string $k) => [$k => $m['detail']])->all(),

];
