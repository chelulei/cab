<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $guarded = [];

    public function country()
    {
        return $this->hasOne('App\Country','country');
    }

    public function idcard()
    {
        return $this->hasOne('App\Idcard');
    }

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function cartypes()
    {
        return $this->hasMany('App\Cartype','cabtype');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
