<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_fave extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_fave';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'location_id',
    ];

    public function location()
    {
        return $this->belongsTo('App\Models\Location', 'location_id', 'id');
    }
}
