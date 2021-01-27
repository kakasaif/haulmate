<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductDetailPost;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductSectionItem;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductDetailController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Product Details', 'Product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = ProductDetail::latest()->with('product', 'sectionItem');

//            if (Admin::isHousingPartnerRole())  
//                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("product_detail.show", ['product_detail' => $row->id]);
                        $edit_link = route("product_detail.edit", ['product_detail' => $row->id]);
                        $delete_link = route("product_detail.destroy", ['product_detail' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 delete btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('product', function ($row)
                    {
                        return empty($row->product->name) ? '' : $row->product->name;
                    })
                    ->addColumn('section_item', function ($row)
                    {
                        return empty($row->sectionItem->name) ? '' : $row->sectionItem->name;
                    })
                    ->addColumn('active', function ($row)
                    {
                        return $row->is_active ? 'Yes' : 'No';
                    })
                    ->addColumn('created', function ($row)
                    {
                        return date('F j, Y, g:i a', strtotime($row->created_at));
                    })
                    ->addColumn('updated', function ($row)
                    {
                        return date('F j, Y, g:i a', strtotime($row->updated_at));
                    })
                    ->rawColumns(['action', 'product', 'section_item', 'active', 'created', 'updated'])
                    ->make(true);
        }
        return view('admin.product_detail.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('is_active', 1)->get();
        $product_section_items = ProductSectionItem::where('is_active', 1)->get();
        return view('admin.product_detail.edit', compact('products', 'product_section_items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductDetailPost $request)
    {
        $validated = $request->validated();
        ProductDetail::create($validated);

        return redirect()->route('product_detail.index')
                ->with('success', 'Product Detail created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDetail $product_detail)
    {
        $product = Product::where('id', $product_detail->product_id)->get()->first();
        $section_item = ProductSectionItem::where('id', $product_detail->section_item_id)->get()->first();
        return view('admin.product_detail.show', compact('product_detail', 'product', 'section_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDetail $product_detail)
    {
        $products = Product::where('is_active', 1)->get();
        $product_section_items = ProductSectionItem::where('is_active', 1)->get();
        return view('admin.product_detail.edit', compact('product_detail', 'products', 'product_section_items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductDetailPost $request, $id)
    {
        $validated = $request->validated();
        DB::table('product_detail')->where('id', $id)->update($validated);

        return redirect()->route('product_detail.index')
                ->with('success', 'Product Detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_detail')->where('id', $id)->delete();

        return redirect()->route('product_detail.index')
                ->with('success', 'Product Detail deleted successfully');
    }

    public function sortable(Request $request)
    {
        return AppLibrary::sortable($request, new ProductDetail);
    }

}
