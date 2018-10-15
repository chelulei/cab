<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $fillable = [
        'iso',
        'iso3',
        'fips',
        'country_name',
        'continent',
        'currency_code',
        'currency_name',
        'phone_prefix',
        'postal_code',
        'languages',
        'geonameid'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
