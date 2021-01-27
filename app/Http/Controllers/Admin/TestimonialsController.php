<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Location;
use App\Models\Location_Image;
use App\Models\Country;
use App\Http\Requests\Admin\StoreTestimonialsPost;
use DB;
use DataTables;
use Hash;
use App\AppLibrary;

class TestimonialsController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Testimonials');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Testimonial::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("testimonials.show", ['testimonial' => $row->id]);
                        $edit_link = route("testimonials.edit", ['testimonial' => $row->id]);
                        $delete_link = route("testimonials.destroy", ['testimonial' => $row->id]);
                        
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        $btn .= '<input type="'."hidden".'" name="row_order['.$row->id.']" value="'.$row->order.'" class="row_order-'.$row->id.'" />';
                        return $btn;
                    })
                    ->addColumn('Testimonial', function ($row)
                    {
                        $Testimonial = Testimonial::where('id', $row->id)->get()->first();
                        return [
                            'id' => $Testimonial->id,
                            'created_at'=> date('F j, Y, g:i a' , strtotime($Testimonial->created_at)),
                            'updated_at'=> date('F j, Y, g:i a' , strtotime($Testimonial->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'Contact'])
                    ->make(true);
        }
        return view('admin.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.testimonials.edit',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTestimonialsPost $request)
    {
        $validated = $request->validated();

        $validated['order'] = 1;

        Testimonial::create($validated);

        return redirect()->route('testimonials.index')
                ->with('success', 'Testimonial created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Testimonial = Testimonial::where('id', $id)->get()->first();
        $country = Location::where('id',$Testimonial->country_id)->get()->first();
        return view('admin.testimonials.show', compact('Testimonial','country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Testimonial = Testimonial::where('id', $id)->get()->first();
        $country = Location::where('id',$Testimonial->country_id)->get()->first();
        $countries = Country::all();
        return view('admin.testimonials.edit', compact('Testimonial','country','countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTestimonialsPost $request, $id)
    {
        $validated = $request->validated();

        DB::table('testimonials')->where('id',$id)->update($validated);

        return redirect()->route('testimonials.index')
                ->with('success', 'Testimonial updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('testimonials')->where('id',$id)->delete();

        return redirect()->route('testimonials.index')
                ->with('success', 'Testimonials deleted successfully');
    }

    public function uploadImage(Request $request)
    {
        $image_path = AppLibrary::uploadImage('testimonial', $request->file('image'));
        return response()->json([
            'image_url' => $image_path,
        ]);
    }

    public function updateRowOrder(Request $request)
    {
    
        $new_order = $request->input();
        // $testimonials = Testimonial::whereIn('id', $new_order)->orderBy('order','asc')->get();

        // foreach ($testimonials as $testimonial) {
        //     DB::table('testimonials')->where('id',$testimonial->id)->update(array(
        //         'order' => ''
        //     ));
        // }

        return response()->json([
            'new_order' => Testimonial::orderBy('order','asc')->get()->toArray(),
        ]);
    }

    public function sortable(Request $request)
    {
        return AppLibrary::sortable($request, new Testimonial);
    }
}
