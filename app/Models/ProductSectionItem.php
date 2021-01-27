<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductSectionItem extends Model
{
    protected $table = 'product_section_item';

    protected $fillable = [
        'section_id', 'name', 'order', 'is_active'
    ];

    public function section()
    {
        return $this->belongsTo('App\Models\ProductSection', 'section_id', 'id');
    }

}
