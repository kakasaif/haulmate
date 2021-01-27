<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housing_Image extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'housing_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'housing_id', 'image_url', 'order'
    ];

    public function housing()
    {
        return $this->belongsTo('App\Models\Housing');
    }
}
