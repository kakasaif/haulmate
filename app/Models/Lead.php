<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class Lead extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'leads';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'pratner_id', 'property_id', 'street', 'postal_code', 'move_size', 'items', 'moving_on', 'mobile_phone'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function partner()
    {
        return $this->belongsTo('App\Models\Partner');
    }

    public function property()
    {
        return $this->belongsTo('App\Models\Housing');
    }

}
