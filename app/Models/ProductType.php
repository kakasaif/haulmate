<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_types';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'is_active'
    ];

    public function product_category()
    {
        return $this->hasMany('App\Models\ProductCategory', 'type_id', 'id')->orderBy('order','asc')->where('is_active', 1);
    }

}
