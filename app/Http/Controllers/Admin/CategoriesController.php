<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreCategoriesPost;
use Illuminate\Http\Request;
use App\Models\Categories;
use DB;
use DataTables;
use Hash;

class CategoriesController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Categories');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Categories::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("categories.show", ['category' => $row->id]);
                        $edit_link = route("categories.edit", ['category' => $row->id]);
                        $delete_link = route("categories.destroy", ['category' => $row->id]);
                        
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('categories', function ($row)
                    {
                        $category = Categories::where('id', $row->id)->get()->first();
                        return [
                            'id' => $category->id,
                            'created_at'=> date('F j, Y, g:i a' , strtotime($category->created_at)),
                            'updated_at'=> date('F j, Y, g:i a' , strtotime($category->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'categories'])
                    ->make(true);
        }
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesPost $request)
    {
        $validated = $request->validated();
        categories::create($validated);

        return redirect()->route('categories.index')
                ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::where('id', $id)->get()->first();
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::where('id', $id)->get()->first();
        return view('admin.categories.edit', compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoriesPost $request, $id)
    {
        $validated = $request->validated();

        DB::table('categories')->where('id',$id)->update($validated);

        return redirect()->route('categories.index')
                ->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();

        return redirect()->route('categories.index')
                ->with('success', 'Category deleted successfully');
    }
}
