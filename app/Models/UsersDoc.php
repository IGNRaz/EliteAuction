<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UsersDoc extends Model
{
    protected $table = "usersdocs";
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
        "doc_path",
        "doc_type",
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}

