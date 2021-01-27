<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductCategoryPost;
use App\Models\ProductCategory;
use App\Models\ProductType;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends AdminController
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = ProductCategory::latest()->with('productType');

//            if (Admin::isHousingPartnerRole())  
//                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("product_category.show", ['product_category' => $row->id]);
                        $edit_link = route("product_category.edit", ['product_category' => $row->id]);
                        $wizard_link = route("product_category.wizard.edit", ['product_category' => $row->id]);
                        $delete_link = route("product_category.destroy", ['product_category' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<a href="' . $wizard_link . '" class="ml-1 edit btn btn-info btn-sm">Wizard</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 delete btn btn-danger btn-sm">Delete</button></form>';
                        $btn .= '<input type="'."hidden".'" name="row_order['.$row->id.']" value="'.$row->order.'" class="row_order-'.$row->id.'" />';

                        return $btn;
                    })
                    ->addColumn('type', function ($row)
                    {
                        return $row->productType->name;
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
                    ->rawColumns(['action', 'type', 'active', 'created', 'updated'])
                    ->make(true);
        }
        return view('admin.product_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = ProductType::where('is_active', 1)->get();
        $page_title = 'Add Product Category';
        $form_html = '<form role="form" action="' . route('product_category.store') . '" method="POST" enctype="multipart/form-data">';
        $save_btn = 'Save';
        return view('admin.product_category.edit', compact('types', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductCategoryPost $request)
    {
        $validated = $request->validated();
        ProductCategory::create($validated);

        return redirect()->route('product_category.index')
                ->with('success', 'Product Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $product_category)
    {
        $type = ProductType::where('id', $product_category->type_id)->get()->first();
        return view('admin.product_category.show', compact('product_category', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductCategory $product_category)
    {
        $types = ProductType::where('is_active', 1)->get();
        $page_title = 'Edit Product Category';
        $form_html = '<form role="form" action="' . route('product_category.update', ['product_category' => $product_category->id]) . '" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT"/>';
        $save_btn = 'Save';
        return view('admin.product_category.edit', compact('product_category', 'types', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductCategoryPost $request, $id)
    {
        $validated = $request->validated();
        DB::table('product_category')->where('id', $id)->update($validated);

        return redirect()->route('product_category.index')
                ->with('success', 'Product Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_category')->where('id', $id)->delete();

        return redirect()->route('product_category.index')
                ->with('success', 'Product Category deleted successfully');
    }

    public function uploadImage(Request $request)
    {
        $image_url = AppLibrary::uploadImage('products', $request->file('image'));
        return response()->json([
                'image_url' => $image_url,
        ]);
    }

    public function sortable(Request $request)
    {
        return AppLibrary::sortable($request, new ProductCategory);
    }

    /**
     * Show the form for the first Wizard's step of creating Category.
     *
     * @return \Illuminate\Http\Response
     */
    public function wizard_create()
    {
        $types = ProductType::where('is_active', 1)->get();
        $page_title = 'Add Category Wizard';
        $form_html = '<form role="form" action="' . route('product_category.wizard.store') . '" method="POST" enctype="multipart/form-data">';
        $save_btn = 'Next Step';
        return view('admin.product_category.edit', compact('types', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Store a newly created category in storage. And then go to the next step to link sections to it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizard_store(StoreProductCategoryPost $request)
    {
        $validated = $request->validated();
        $category = ProductCategory::create($validated);
        $category = $category->fresh();
        return redirect(route('category_sections.wizard.create', $category->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wizard_edit(ProductCategory $product_category)
    {
        $types = ProductType::where('is_active', 1)->get();
        $page_title = 'Edit Category Wizard';
        $form_html = '<form role="form" action="' . route('product_category.wizard.update', ['product_category' => $product_category->id]) . '" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT"/>';
        $save_btn = 'Next Step';
        return view('admin.product_category.edit', compact('product_category', 'types', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wizard_update(StoreProductCategoryPost $request, $id)
    {
        $validated = $request->validated();
        ProductCategory::where('id', $id)->update($validated);
        return redirect(route('category_sections.wizard.edit', $id));
    }

}
