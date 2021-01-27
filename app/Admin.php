<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{

    use Notifiable;

    public const HOUSING_ROLE = 'Housing'; 
    public const PARTNER_ROLE = 'Partner'; 
    public const BOTH_ROLE = 'Both'; 

    protected $table = 'administrator';
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function isHousingPartnerRole()
    {
        $user = Auth::user();

        $roles = array(
            self::HOUSING_ROLE,
            self::PARTNER_ROLE,
            self::BOTH_ROLE,
        );

        if (in_array($user->role,$roles))
            return true;

        return false;
    }

}
