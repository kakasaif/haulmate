<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pref_options extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pref_options';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'preference', 'is_active', 'icon_url','created_at','updated_at'
    ];

    public function location_pref()
    {
        return $this->hasMany('App\Models\Location_pref','pref_id','id');
    }
   
}
