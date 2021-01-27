<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type_id', 'name', 'title', 'subtitle', 'image', 'selected_image', 'order', 'is_active'
    ];

    public function productType()
    {
        return $this->belongsTo('App\Models\ProductType', 'type_id', 'id');
    }
   
    public function product_section()
    {
        return $this->hasMany('App\Models\ProductSection', 'category_id', 'id')->orderBy('order','asc')->where('is_active', 1);
    }

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'category_id', 'id')->orderBy('order','asc');
    }

}
