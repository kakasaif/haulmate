<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Housing_Type extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'housing_type';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'is_active'
    ];
}
