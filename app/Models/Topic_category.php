<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Topic_category extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'topic_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'topic_id', 'category_id'
    ];

    public function category()
    {
        return $this->hasOne('App\Models\Categories', 'id', 'category_id');
    }

    public function topic()
    {
        return $this->hasOne('App\Models\Topics', 'id', 'topic_id');
    }

}
