<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;
use App\Models\OrderItem;
use App\Models\Coupon;
use App\Models\Transaction;
class Order extends Model {
    protected $fillable = [
        'user_id','status','currency','subtotal','discount','total',
        'gateway','gateway_ref','coupon_id','meta'
    ];
    protected $casts = ['meta'=>'array'];

    public function items(): HasMany { return $this->hasMany(OrderItem::class); }
    public function coupon() { return $this->belongsTo(Coupon::class); }

    public function markPaid(string $gatewayRef, array $payload = []): void {
        $this->update(['status'=>'paid','gateway_ref'=>$gatewayRef]);
        Transaction::create([
            'order_id'=>$this->id,'gateway'=>$this->gateway,'status'=>'captured',
            'amount'=>$this->total,'currency'=>$this->currency,'reference'=>$gatewayRef,'payload'=>$payload
        ]);
        // Enroll user to courses
        foreach ($this->items as $it) {
            DB::table('course_user')->updateOrInsert(
                ['course_id'=>$it->course_id,'user_id'=>$this->user_id],
                ['purchased_at'=>now(),'updated_at'=>now(),'created_at'=>now()]
            );
        }
        // Increment coupon usage if any
        if ($this->coupon_id) $this->coupon()->increment('used_count');
    }
    public function transactions()
{
    return $this->hasMany(Transaction::class);
}
}