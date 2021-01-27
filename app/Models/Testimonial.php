<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'testimonials';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'country_id',
        'testimonial',
        'image_url',
        'order',
        'is_active',
    ];

    public function country()
    {
        return $this->belongsTo('App\Models\Country');
    }
}
