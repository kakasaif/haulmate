<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductSectionPost;
use App\Models\ProductSection;
use App\Models\ProductSectionItem;
use App\Models\ProductCategory;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WizardSectionController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Product Categories', 'Product');
    }

    /**
     * Show the form for adding sections to the recently created Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $category_id)
    {
        return $this->edit($category_id, 'Add');
    }

    /**
     * Show the form for editing sections for the recently updated Category.
     *
     * @param  int  $category_id
     * @param  string  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(int $category_id, $type = 'Edit')
    {
        $category = ProductCategory::where('id', $category_id)->first();
        $sections = ProductSection::where('category_id', $category->id)->with([
                    'items' => function($query)
                    {
                        $query->orderBy('order', 'ASC');
                    }
                ])
                ->orderBy('order', 'ASC')
                ->get()->all();
        $title = "$type Sections for '$category->name' Category";
        $back_link = route('product_category.wizard.edit', $category_id);

        return view('admin.product_section.wizard', compact('title', 'category', 'sections', 'back_link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $category_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $all_section_items = empty($request->section_items) ? [] : ($request->section_items);

        // save sections
        $sections = [];
        $section_ids = [];
        $section_order = 1;
        foreach ($request->sections as $key => $section_name) {
            if (empty($sections[$section_name])) {
                $section = ProductSection::where(['category_id' => $category_id, 'name' => $section_name])->get()->first();
                if (empty($section)) {
                    $section = ProductSection::create([
                        'category_id' => $category_id,
                        'name' => $section_name,
                        'order' => $section_order++,
                        'is_active' => 1
                        ]);
                    $section = $section->fresh();
                } else {
                    $section->order = $section_order++;
                    $section->save();
                }
                $sections[$section_name] = $section;
            } else {
                $section = $sections[$section_name];
            }
            // collect saved section ID
            $section_ids[] = $section->id;
            
            // save section items
            $items = [];
            $item_ids = [];
            $item_order = 1;
            if (!empty($all_section_items[$key])) {
                foreach ($all_section_items[$key] as $item_name) {
                    if (empty($items[$item_name])) {
                        $item = ProductSectionItem::where(['section_id' => $section->id, 'name' => $item_name])->get()->first();
                        if (empty($item)) {
                            $item = ProductSectionItem::create([
                                'section_id' => $section->id,
                                'name' => $item_name,
                                'order' => $item_order++,
                                'is_active' => 1
                                ]);
                            $item = $item->fresh();
                        } else {
                            $item->order = $item_order++;
                            $item->save();
                        }
                    } else {
                        $item = $items[$item_name];
                    }
                    // collect saved section ID
                    $item_ids[] = $item->id;
                }
            }
        
            //remove old unnecessary section items
//            ProductSectionItem::where('section_id', $section->id)->whereNotIn('id', $item_ids)->delete();
            ProductSectionItem::where('section_id', $section->id)->whereNotIn('id', $item_ids)->update(['is_active' => 0]);
        }
        
        //remove old unnecessary sections
//        ProductSection::where('category_id', $category_id)->whereNotIn('id', $section_ids)->delete();
        ProductSection::where('category_id', $category_id)->whereNotIn('id', $section_ids)->update(['is_active' => 0]);
        
        return redirect()->route('product_category.index')
                ->with('success', 'Product Category updated successfully');
    }

    public function uploadImage(Request $request)
    {
        $image_url = AppLibrary::uploadImage('product', $request->file('image'));
        return response()->json([
                'image_url' => $image_url,
        ]);
    }

    public function sortable(Request $request)
    {
        return AppLibrary::sortable($request, new ProductSection);
    }

    public function get_sections(Request $request)
    {
        $query = ProductSection::selectRaw('DISTINCT(`name`)');
        if (!empty($request->search))
            $query->where('name', 'like', '%' . $request->search . '%');
        $sections = $query->orderBy('name')->take(5)->get()->all();
        $data = [];
        foreach ($sections as $section) {
            $data[] = (object) [
                'id' => $section->name,
                'text' => $section->name
            ];
        }
        if (empty($data))
            $data [] = (object) [
                'id' => $request->search,
                'text' => $request->search
            ];

        return json_encode(['results' => $data]);
    }

    public function get_items(Request $request)
    {
        $query = ProductSectionItem::selectRaw('DISTINCT(`name`)');
        if (!empty($request->search))
            $query->where('name', 'like', '%' . $request->search . '%');
        $items = $query->orderBy('name')->take(5)->get()->all();
        $data = [];
        foreach ($items as $item) {
            $data[] = (object) [
                'id' => $item->name,
                'text' => $item->name
            ];
        }
        if (empty($data))
            $data [] = (object) [
                'id' => $request->search,
                'text' => $request->search
            ];

        return json_encode(['results' => $data]);
    }
}
