<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\StoreServicePost;
use Illuminate\Http\Request;
use App\Models\Service;
use DB;
use DataTables;
use App\AppLibrary;

class ServicesController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Services');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Service::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $view_link = route("services.show", ['service' => $row->id]);
                    $edit_link = route("services.edit", ['service' => $row->id]);
                    $delete_link = route("services.destroy", ['service' => $row->id]);

                    $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                    $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                    $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                    $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                    $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                    return $btn;
                })
                ->addColumn('Service', function ($row) {
                    $Service = Service::where('id', $row->id)->get()->first();
                    return [
                        'id' => $Service->id,
                        'created_at' => date('F j, Y, g:i a', strtotime($Service->created_at)),
                        'updated_at' => date('F j, Y, g:i a', strtotime($Service->updated_at)),
                    ];
                })
                ->rawColumns(['action', 'Service'])
                ->make(true);
        }
        return view('admin.services.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.services.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServicePost $request)
    {
        $validated = $request->validated();

        Service::create($validated);

        return redirect()->route('services.index')
            ->with('success', 'Options created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::where('id', $id)->get()->first();
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::where('id', $id)->get()->first();
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreServicePost $request, $id)
    {
        $validated = $request->validated();

        DB::table('services')->where('id', $id)->update($validated);

        return redirect()->route('services.index')
            ->with('success', 'Options updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('services')->where('id', $id)->delete();

        return redirect()->route('services.index')
            ->with('success', 'Category deleted successfully');
    }

    public function uploadDefaultIcon(Request $request)
    {
        $default_icon_url = AppLibrary::uploadImage('service', $request->file('image'));

        return response()->json([
            'default_icon_url' => $default_icon_url,
        ]);
    }

    public function uploadActiveIcon(Request $request)
    {
        $active_default_icon = AppLibrary::uploadImage('service', $request->file('image'));

        return response()->json([
            'active_icon_url' => $active_default_icon,
        ]);
    }
}
