<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;

class Location_Image extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location_id', 'image_url', 'order'
    ];

    public function location()
    {
        return $this->belongsTo('App\Models\Location');
    }

}
