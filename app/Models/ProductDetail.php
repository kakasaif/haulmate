<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_detail';

    protected $fillable = [
        'product_id', 'section_item_id', 'name', 'is_active'
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id');
    }

    public function section()
    {
        return $this->hasOneThrough(
            'App\Models\ProductSection',
            'App\Models\ProductSectionItem',
            'id',
            'id',
            'section_item_id',
            'section_id'
        );
    }

    public function sectionItem()
    {
        return $this->belongsTo('App\Models\ProductSectionItem', 'section_item_id', 'id');
    }
}
