<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'catagorys'; // تصحيح اسم الجدول

    protected $fillable = [
        'name',
    ];
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }
}
