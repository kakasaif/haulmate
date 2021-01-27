<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location_pref extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_prefs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score', 'location_id', 'pref_id'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Location_Image');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Housing');
    }

    public function preference()
    {
        return $this->belongsTo('App\Models\Pref_options','pref_id','id');
    }
}
