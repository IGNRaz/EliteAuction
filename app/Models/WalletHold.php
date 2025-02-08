<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WalletHold extends Model
{
    protected $fillable = [
        'wallet_id',
        'amount',
    ];
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }
    
}
