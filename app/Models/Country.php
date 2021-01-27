<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
/**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code',
        'country',
        'flag_url',
        'is_active',
    ];

    public function moving_to()
    {
        return $this->hasMany('App\User','moving_to','code');
    }

    public function moving_from()
    {
        return $this->hasMany('App\User','moving_from','code');
    }

}
