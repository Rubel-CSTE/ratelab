<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Searchable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','ver_code',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'address'           => 'object',
        'ver_code_send_at'  => 'datetime'
    ];


    public function loginLogs()
    {
        return $this->hasMany(UserLogin::class);
    }

    public function companies()
    {
        return $this->hasMany(Company::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function fullname(): Attribute
    {
        return new Attribute(
            get: fn () => $this->firstname . ' ' . $this->lastname,
        );
    }

    // SCOPES
    public function scopeActive()
    {
        return $this->where('status', Status::USER_ACTIVE)->where('ev',Status::VERIFIED)->where('sv',Status::VERIFIED);
    }

    public function scopeBanned()
    {
        return $this->where('status', Status::USER_BAN);
    }

    public function scopeEmailUnverified()
    {
        return $this->where('ev', Status::NO);
    }

    public function scopeMobileUnverified()
    {
        return $this->where('sv', Status::NO);
    }


    public function scopeEmailVerified()
    {
        return $this->where('ev', Status::VERIFIED);
    }

    public function scopeMobileVerified()
    {
        return $this->where('sv', Status::VERIFIED);
    }


}
