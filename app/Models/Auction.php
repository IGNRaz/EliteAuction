<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'catagory_id',
        'user_id',
        'start_price',
        'buyout_price',
        'status',
        'winner_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
    public function winner()
    {
        return $this->belongsTo(User::class, 'winner_id');
    }
    public function images()
    {
        return $this->hasMany(AuctionImage::class);
    }
    public function Video()
    {
        return $this->hasMany(AuctionImage::class);
    }

    
}
