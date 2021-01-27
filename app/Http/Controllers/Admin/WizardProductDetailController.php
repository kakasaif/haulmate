<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WizardProductDetailController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Product List', 'Product');
    }

    /**
     * Show the form for adding details to the recently created Product.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function create(int $product_id)
    {
        return $this->edit($product_id, 'Add');
    }

    /**
     * Show the form for editing details for the recently updated Product.
     *
     * @param  int  $product_id
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(int $product_id, $type = 'Edit')
    {
        $product = Product::where('id', $product_id)->first();
        $sections = ProductSection::where('category_id', $product->category_id)
                ->where('is_active', 1)
                ->with('items')
                ->get()->all();
        $details = ProductDetail::where('product_id', $product_id)
                ->where('is_active', 1)
                ->get()->keyBy('section_item_id')->all();
        $title = "$type Details for '$product->name' Product";
        $back_link = route('product.wizard.edit', $product_id);

        return view('admin.product_detail.wizard', compact('product', 'sections', 'details', 'title', 'back_link'));
    }

    /**
     * Update the specified details in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $product_id)
    {
        $item_values = empty($request->item_values) ? [] : ($request->item_values);
        if (empty($item_values)) {
            ProductDetail::where('product_id', '=', $product_id)->delete();
            return redirect()->route('product.index')->with('success', 'Product updated successfully');
        }

        $detail_ids = [];
        foreach ($item_values as $section_item_id => $value) {
            $detail = ProductDetail::updateOrCreate(
                ['product_id' => $product_id, 'section_item_id' => $section_item_id],
                ['name' => $value, 'is_active' => 1]
            );
            $detail_ids[] = $detail->id;
        }
        if (!empty($detail_ids))
            ProductDetail::where('product_id', '=', $product_id)->whereNotIn('id', $detail_ids)->delete();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

}
