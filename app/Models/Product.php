<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'name', 'subtitle', 'action_url', 'image', 'selected_image', 'order', 'is_active'
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id')->orderBy('order','asc')->where('is_active', 1);
    }

    public function detail()
    {
        return $this->hasMany('App\Models\ProductDetail', 'product_id', 'id');
    }
}
