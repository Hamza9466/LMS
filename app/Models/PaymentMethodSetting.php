<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentMethodSetting extends Model
{
    protected $fillable = [
        'gateway',
        'label',
        'number',
        'detail',
    ];

    protected $table = 'payment_method_settings';
}
