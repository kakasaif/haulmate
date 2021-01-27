<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductSectionPost;
use App\Models\ProductSection;
use App\Models\ProductCategory;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductSectionController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Product Sections', 'Product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = ProductSection::latest()->with('category');

//            if (Admin::isHousingPartnerRole())  
//                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("product_section.show", ['product_section' => $row->id]);
                        $edit_link = route("product_section.edit", ['product_section' => $row->id]);
                        $delete_link = route("product_section.destroy", ['product_section' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 delete btn btn-danger btn-sm">Delete</button></form>';
                        $btn .= '<input type="'."hidden".'" name="row_order['.$row->id.']" value="'.$row->order.'" class="row_order-'.$row->id.'" />';

                        return $btn;
                    })
                    ->addColumn('category', function ($row)
                    {
                        return $row->category->name ?? '';
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
                    ->rawColumns(['action', 'category', 'active', 'created', 'updated'])
                    ->make(true);
        }
        return view('admin.product_section.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        return view('admin.product_section.edit', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSectionPost $request)
    {
        $validated = $request->validated();
        ProductSection::create($validated);

        return redirect()->route('product_section.index')
                ->with('success', 'Product Section created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSection $product_section)
    {
        $category = ProductCategory::where('id', $product_section->category_id)->get()->first();
        return view('admin.product_section.show', compact('product_section', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSection $product_section)
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        return view('admin.product_section.edit', compact('product_section', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductSectionPost $request, $id)
    {
        $validated = $request->validated();
        DB::table('product_section')->where('id', $id)->update($validated);

        return redirect()->route('product_section.index')
                ->with('success', 'Product Section updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_section')->where('id', $id)->delete();

        return redirect()->route('product_section.index')
                ->with('success', 'Product Section deleted successfully');
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

}
