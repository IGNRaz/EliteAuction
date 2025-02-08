<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersDoc extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'surname',
        'phone',
        'address',
        'city',
        'country',
        'zip',
        'image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

