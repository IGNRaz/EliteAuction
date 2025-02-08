<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = ['auction_id', 'video_url'];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}