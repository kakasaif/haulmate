<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Topics;
use App\Models\Location;
use App\Models\Location_Image;
use App\Models\Country;
use App\Http\Requests\Admin\StoreTopicsPost;
use DB;
use DataTables;
use Hash;
use App\AppLibrary;

class TopicsController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Topics');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        if ($request->ajax()) {
            $data = Topics::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("topics.show", ['topic' => $row->id]);
                        $edit_link = route("topics.edit", ['topic' => $row->id]);
                        $delete_link = route("topics.destroy", ['topic' => $row->id]);
                        
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('Topics', function ($row)
                    {
                        $Topics = Topics::where('id', $row->id)->get()->first();
                        return [
                            'id' => $Topics->id,
                            'created_at'=> date('F j, Y, g:i a' , strtotime($Topics->created_at)),
                            'updated_at'=> date('F j, Y, g:i a' , strtotime($Topics->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'Topics'])
                    ->make(true);
        }

        return view('admin.topics.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('admin.topics.edit',compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTopicsPost $request)
    {
        $validated = $request->validated();

        Topics::create($validated);

        return redirect()->route('topics.index')
                ->with('success', 'Topic created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $topics = Topics::where('id', $id)->get()->first();
        
        return view('admin.topics.show', compact('topics'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topics = Topics::where('id', $id)->get()->first();
        $users = DB::table('users')->select('id','first_name','last_name')->get();
        return view('admin.topics.edit', compact('topics','users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTopicsPost $request, $id)
    {
        $validated = $request->validated();

        DB::table('topics')->where('id',$id)->update($validated);

        return redirect()->route('topics.index')
                ->with('success', 'topic updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('topics')->where('id',$id)->delete();

        return redirect()->route('topics.index')
                ->with('success', 'Topics deleted successfully');
    }
}
