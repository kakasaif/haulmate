<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\StoreContactPost;
use DB;
use DataTables;
use Hash;
use App\AppLibrary;

class ContactUsController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Contact Us');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Contact::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("contact_us.show", ['contact_u' => $row->id]);
                        $edit_link = route("contact_us.edit", ['contact_u' => $row->id]);
                        $delete_link = route("contact_us.destroy", ['contact_u' => $row->id]);
                        
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('Contact', function ($row)
                    {
                        $Contact = Contact::where('id', $row->id)->get()->first();
                        return [
                            'id' => $Contact->id,
                            'created_at'=> date('F j, Y, g:i a' , strtotime($Contact->created_at)),
                            'updated_at'=> date('F j, Y, g:i a' , strtotime($Contact->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'Contact'])
                    ->make(true);
        }
        return view('admin.contact_us.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact_us.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContactPost $request)
    {
        $validated = $request->validated();

        Contact::create($validated);

        return redirect()->route('contact_us.index')
                ->with('success', 'Contact created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Contact = Contact::where('id', $id)->get()->first();
        return view('admin.contact_us.show', compact('Contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Contact = Contact::where('id', $id)->get()->first();
        return view('admin.contact_us.edit', compact('Contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreContactPost $request, $id)
    {
        $validated = $request->validated();

        DB::table('contactus')->where('id',$id)->update($validated);

        return redirect()->route('contact_us.index')
                ->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('contactus')->where('id',$id)->delete();

        return redirect()->route('contact_us.index')
                ->with('success', 'Contact deleted successfully');
    }
}
