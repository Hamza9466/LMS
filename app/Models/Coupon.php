<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Coupon extends Model {
    protected $fillable = ['code','type','value','min_amount','max_uses','used_count','starts_at','ends_at','is_active'];
    protected $casts = ['starts_at'=>'datetime','ends_at'=>'datetime','is_active'=>'boolean'];

    public function isValidFor(float $subtotal): bool {
        if (!$this->is_active) return false;
        $now = Carbon::now();
        if ($this->starts_at && $now->lt($this->starts_at)) return false;
        if ($this->ends_at && $now->gt($this->ends_at)) return false;
        if ($this->max_uses && $this->used_count >= $this->max_uses) return false;
        if ($subtotal < $this->min_amount) return false;
        return true;
    }

    public function discountAmount(float $subtotal): float {
        if ($this->type === 'fixed') return min($this->value, $subtotal);
        return round($subtotal * ($this->value/100), 2);
    }
}