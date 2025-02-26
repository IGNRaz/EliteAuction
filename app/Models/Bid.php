<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    protected $fillable = [
        'user_id',
        'auction_id',
        'bid_amount',
        'bid_at',
        'is_winning',
        'winning_at',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}
