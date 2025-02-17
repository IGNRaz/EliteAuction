<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banned extends Model
{
    protected $fillable = ['banned_email', 'reason' , 'expires_at', 'banned_by','banned'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
  
}
