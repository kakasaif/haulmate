<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $table = 'product_section';

    protected $fillable = [
        'category_id', 'name', 'order', 'is_active'
    ];

    public function items()
    {
        return $this->hasMany('App\Models\ProductSectionItem', 'section_id', 'id')->orderBy('order','asc')->where('is_active', 1);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id')->orderBy('order','asc')->where('is_active', 1);
    }
}
