<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
      use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'alternate_phone',
        'email',
        'alternate_email',
        'password',
        'verification_code',
        'code_expires_at',
        'is_verified',
        'reset_code',
'reset_expires_at',
    ];

    protected $hidden = [
        'password',
        'verification_code',
    ];

    protected $casts = [
        'code_expires_at' => 'datetime',
        'is_verified' => 'boolean',
        'reset_expires_at' => 'datetime',
    ];
    public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

public function orders()
{
    return $this->hasMany(Order::class);
}
}
