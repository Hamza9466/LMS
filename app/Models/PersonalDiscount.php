<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PersonalDiscount extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'course_id','user_id','type','value','active',
        'uses','max_uses','starts_at','ends_at',
    ];

    protected $casts = [
        'active'    => 'boolean',
        'starts_at' => 'datetime',
        'ends_at'   => 'datetime',
        'value'     => 'decimal:2',
    ];

    public function user()   { return $this->belongsTo(User::class); }
    public function course() { return $this->belongsTo(Course::class); }

    public function isActive(): bool
    {
        if (!$this->active) return false;
        $now = Carbon::now();
        if ($this->starts_at && $now->lt($this->starts_at)) return false;
        if ($this->ends_at && $now->gt($this->ends_at)) return false;
        if ($this->max_uses && $this->uses >= $this->max_uses) return false;
        return true;
    }

    // Scopes
    public function scopeFor($q, int $userId, int $courseId)
    {
        return $q->where('user_id', $userId)->where('course_id', $courseId);
    }

    public function scopeActive($q)
    {
        $now = now();
        return $q->where('active', true)
                 ->where(fn($qq)=>$qq->whereNull('starts_at')->orWhere('starts_at','<=',$now))
                 ->where(fn($qq)=>$qq->whereNull('ends_at')->orWhere('ends_at','>=',$now));
    }

    public function scopeUsable($q)
    {
        return $q->where(fn($qq)=>$qq->whereNull('max_uses')->orWhereColumn('uses','<','max_uses'));
    }

    // ---------- Helpers shared by controller AND blade ----------

    /** Return the best (highest value) active/usable PD for a user+course */
    public static function bestFor(int $userId, int $courseId): ?self
    {
        return static::for($userId, $courseId)
            ->active()
            ->usable()
            ->orderByDesc('value')
            ->first();
    }

    /**
     * Per-unit discount amount (currency) for a unit price.
     * Supports type: "percent", "amount", "fixed" (amount/fixed are treated the same).
     */
    public static function bestUnitValue(int $userId, int $courseId, float $unitPrice): float
    {
        $pd = static::bestFor($userId, $courseId);
        if (!$pd || $unitPrice <= 0) return 0.0;

        $t = strtolower((string)$pd->type);
        if ($t === 'percent') {
            return round($unitPrice * ((float)$pd->value / 100), 2);
        }
        // 'amount' or 'fixed' or anything else => treat as fixed currency discount
        return (float) min($unitPrice, (float) $pd->value);
    }
}