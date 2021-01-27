<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductPost;
use App\Models\Product;
use App\Models\ProductCategory;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends AdminController
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Product::latest()->with('category');

//            if (Admin::isHousingPartnerRole())  
//                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("product.show", ['product' => $row->id]);
                        $edit_link = route("product.edit", ['product' => $row->id]);
                        $wizard_link = route("product.wizard.edit", ['product' => $row->id]);
                        $delete_link = route("product.destroy", ['product' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<a href="' . $wizard_link . '" class="ml-1 edit btn btn-info btn-sm">Wizard</a>';
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
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        $page_title = 'Add Product';
        $form_html = '<form role="form" action="' . route('product.store') . '" method="POST" enctype="multipart/form-data">';
        $save_btn = 'Save';
        return view('admin.product.edit', compact('categories', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductPost $request)
    {
        $validated = $request->validated();
        Product::create($validated);

        return redirect()->route('product.index')
                ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $category = ProductCategory::where('id', $product->category_id)->get()->first();
        return view('admin.product.show', compact('product', 'category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        $page_title = 'Edit Product';
        $form_html = '<form role="form" action="' . route('product.update', ['product' => $product->id]) . '" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT"/>';
        $save_btn = 'Save';
        return view('admin.product.edit', compact('product', 'categories', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductPost $request, $id)
    {
        $validated = $request->validated();
        DB::table('product')->where('id', $id)->update($validated);

        return redirect()->route('product.index')
                ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product')->where('id', $id)->delete();

        return redirect()->route('product.index')
                ->with('success', 'Product deleted successfully');
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
        return AppLibrary::sortable($request, new Product);
    }

    /**
     * Show the form for the first Wizard's step of creating Product.
     *
     * @return \Illuminate\Http\Response
     */
    public function wizard_create()
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        $page_title = 'Add Product Wizard';
        $form_html = '<form role="form" action="' . route('product.wizard.store') . '" method="POST" enctype="multipart/form-data">';
        $save_btn = 'Next Step';

        return view('admin.product.edit', compact('categories', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Store a newly created category in storage. And then go to the next step to link sections to it.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function wizard_store(StoreProductPost $request)
    {
        $validated = $request->validated();
        $product = Product::create($validated);
        $product = $product->fresh();
        $title = "Add Details to Product $product->name";
        
        return redirect(route('product_detail.wizard.create', $product->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wizard_edit(Product $product)
    {
        $categories = ProductCategory::where('is_active', 1)->get();
        $page_title = 'Edit Product Wizard';
        $form_html = '<form role="form" action="' . route('product.wizard.update', ['product' => $product->id]) . '" method="POST" enctype="multipart/form-data"><input type="hidden" name="_method" value="PUT"/>';
        $save_btn = 'Next Step';

        return view('admin.product.edit', compact('product', 'categories', 'page_title', 'form_html', 'save_btn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function wizard_update(StoreProductPost $request, $id)
    {
        $validated = $request->validated();
        Product::where('id', $id)->update($validated);

        return redirect(route('product_detail.wizard.edit', $id));
    }

}
