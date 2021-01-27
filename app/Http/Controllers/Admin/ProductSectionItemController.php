<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreProductSectionItemPost;
use App\Models\ProductSectionItem;
use App\Models\ProductSection;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductSectionItemController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Section Items', 'Product');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = ProductSectionItem::latest()->with('section');

//            if (Admin::isHousingPartnerRole())  
//                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("product_section_item.show", ['product_section_item' => $row->id]);
                        $edit_link = route("product_section_item.edit", ['product_section_item' => $row->id]);
                        $delete_link = route("product_section_item.destroy", ['product_section_item' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 delete btn btn-danger btn-sm">Delete</button></form>';
                        $btn .= '<input type="'."hidden".'" name="row_order['.$row->id.']" value="'.$row->order.'" class="row_order-'.$row->id.'" />';
                        return $btn;
                    })
                    ->addColumn('section', function ($row)
                    {
                        return $row->section->name;
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
                    ->rawColumns(['action', 'section', 'active', 'created', 'updated'])
                    ->make(true);
        }
        return view('admin.product_section_item.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sections = ProductSection::where('is_active', 1)->get();
        return view('admin.product_section_item.edit', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductSectionItemPost $request)
    {
        $validated = $request->validated();
        ProductSectionItem::create($validated);

        return redirect()->route('product_section_item.index')
                ->with('success', 'Product Section Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductSectionItem $product_section_item)
    {
        $section = ProductSection::where('id', $product_section_item->section_id)->get()->first();
        return view('admin.product_section_item.show', compact('product_section_item', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductSectionItem $product_section_item)
    {
        $sections = ProductSection::where('is_active', 1)->get();
        return view('admin.product_section_item.edit', compact('product_section_item', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductSectionItemPost $request, $id)
    {
        $validated = $request->validated();
        DB::table('product_section_item')->where('id', $id)->update($validated);

        return redirect()->route('product_section_item.index')
                ->with('success', 'Product Section Item updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('product_section_item')->where('id', $id)->delete();

        return redirect()->route('product_section_item.index')
                ->with('success', 'Product Section Item deleted successfully');
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
        if ($request->row_order) {
            foreach ($request->row_order as $key => $order) {
                $row = ProductSectionItem::find($key);
                $row->order = $order;
                $row->save();
            }
        }

        return response()->json([
            'success' => true,
        ]);
    }

}
