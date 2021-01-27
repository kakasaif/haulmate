<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category', 'seo_name', 'is_active'
    ];

    public function topics()
    {
        return $this->hasManyThrough('App\Models\Topics', 'App\Models\Topic_category', 'category_id', 'id', 'id', 'topic_id');
    }

}
