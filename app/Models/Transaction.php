<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
     protected $fillable = ['order_id','gateway','status','amount','currency','reference','payload'];
    protected $casts = ['payload'=>'array'];

      public function order()
    {
        return $this->belongsTo(Order::class);
    }
}