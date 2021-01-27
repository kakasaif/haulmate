<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_preference extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_prefs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'pref_id',  
    ];

    public function preference()
    {
        return $this->belongsTo('App\Models\Pref_options', 'pref_id', 'id');
    }
}
