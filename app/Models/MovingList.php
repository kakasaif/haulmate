<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovingList extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'moving_list';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'moving_from',
      'moving_to'
    ];

    public function country_from()
    {
        return $this->hasOne('App\Models\Country', 'id', 'moving_from');
    }

    public function country_to()
    {
        return $this->hasOne('App\Models\Country', 'id', 'moving_to');
    }

}
