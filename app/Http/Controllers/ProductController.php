<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function comparison(Request $request, $id)
    {
        $product_type = ProductType::with('product_category')->where('id',$id)->first();
        return view('comparison', compact('product_type'));
    }
}
