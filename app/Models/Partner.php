<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'partner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'subtitle', 'category', 'icon_url', 'banner_url', 'banner_title', 'banner_subtitle', 'banner_button', 'banner_action',
        'body', 'button_text', 'action', 'type', 'order', 'meta_description', 'meta_keyword', 'partner_id', 'is_active'
    ];

    public function leads()
    {
        return $this->hasMany('App\Models\Lead');
    }

}
