<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_housing extends Model
{
    protected $table = 'user_housing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'housing_id',
    ];

    public function housing()
    {
        return $this->belongsTo('App\Models\Housing', 'housing_id', 'id');
    }
}
