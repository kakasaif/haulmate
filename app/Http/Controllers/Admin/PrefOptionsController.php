<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\Pref_options;
use App\Http\Requests\Admin\StorePrefoptionsPost;
use DB;
use DataTables;
use Hash;
use App\AppLibrary;

class PrefOptionsController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Preferences');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Pref_options::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("pref_options.show", ['pref_option' => $row->id]);
                        $edit_link = route("pref_options.edit", ['pref_option' => $row->id]);
                        $delete_link = route("pref_options.destroy", ['pref_option' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('Pref_options', function ($row)
                    {
                        $Pref_options = Pref_options::where('id', $row->id)->get()->first();
                        return [
                            'id' => $Pref_options->id,
                            'created_at' => date('F j, Y, g:i a', strtotime($Pref_options->created_at)),
                            'updated_at' => date('F j, Y, g:i a', strtotime($Pref_options->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'Pref_options'])
                    ->make(true);
        }
        return view('admin.pref_options.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pref_options.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrefoptionsPost $request)
    {
        $validated = $request->validated();

        Pref_options::create($validated);

        return redirect()->route('pref_options.index')
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
        $pref_options = Pref_options::where('id', $id)->get()->first();
        return view('admin.pref_options.show', compact('pref_options'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pref_options = Pref_options::where('id', $id)->get()->first();
        return view('admin.pref_options.edit', compact('pref_options'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePrefoptionsPost $request, $id)
    {
        $validated = $request->validated();
        if (empty($validated['icon_url']))
            unset($validated['icon_url']);

        DB::table('pref_options')->where('id', $id)->update($validated);

        return redirect()->route('pref_options.index')
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
        DB::table('pref_options')->where('id', $id)->delete();

        return redirect()->route('pref_options.index')
                ->with('success', 'Category deleted successfully');
    }

    public function uploadIcon(Request $request)
    {
        $icon_path = AppLibrary::uploadImage('icon', $request->file('image'));
        return response()->json([
                'icon_url' => $icon_path,
        ]);
    }

}
