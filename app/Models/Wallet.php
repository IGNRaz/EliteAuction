<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    protected $fillable = [
        'user_id',
        'balance',
        'hold_balance',
        'total_deposited',
        'total_withdrawn',
        'total_holded',
        'total_released',
        'total_earned',
        'total_spent',
        'total_refunded',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
