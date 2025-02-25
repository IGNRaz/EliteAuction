<?php

namespace App\Models;
use App\Models\Banned;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'img',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function doc()
    {
        return $this->HasOne(UsersDoc::class);
    }
    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }
    public function bids()
    {
        return $this->hasMany(Bid::class);
    }
    public function winner()
    {
        return $this->hasOne(Auction::class, 'winner_id');
    }

    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function role()
    {
        return $this->role;
    }
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
    public function isUser()
    {
        return $this->role === 'user';
    }
   
    public function isBanned()
    {
        return Banned::where('banned_email', $this->email)->exists();
    }
    

public function banned()
{
    return $this->hasOne(Banned::class);
}

public function getImageURL()
{
    return $this->img ? asset('storage/' . $this->img) : asset('images/default-avatar.png');
}
}
