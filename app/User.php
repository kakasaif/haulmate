<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public const DEFAULT_ADDRESS = 'CITY CENTER';
    public const DEFAULT_LATITUDE = 1.290439;
    public const DEFAULT_LONGITUDE = 103.845567;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'username', 'phone', 'photo_url', 'gender', 'birthday', 'nationality', 'moving_from', 'moving_to', 'live_close', 'live_latitude', 'live_longitude', 'remoteness', 'transport', 'property_type', 'moving_with', 'moving_on', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function services()
    {
        return $this->hasMany('App\Models\User_service');
    }
    
    public function preferences()
    {
        return $this->hasManyThrough('App\Models\Pref_options', 'App\Models\User_preference', 'user_id', 'id', 'id', 'pref_id');
    }

    public function country_from()
    {
        return $this->hasOne('App\Models\Country', 'code', 'moving_from');
    }

    public function country_to()
    {
        return $this->hasOne('App\Models\Country', 'code', 'moving_to');
    }
}
