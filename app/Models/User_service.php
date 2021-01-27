<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_service extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_services';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'service_id',  
    ];

    public function service()
    {
        return $this->belongsTo('App\Models\Service', 'service_id', 'id');
    }
}
