<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Http\Request;
use App\Models\DashboardLink;
use App\Http\Requests\Admin\StoreDashboardlinks;
use DataTables;
use Hash;
use App\AppLibrary;
use DB;

class DashboardLinksController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Dashboard Links');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DashboardLink::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("dashboardlinks.show", ['dashboardlink' => $row->id]);
                        $edit_link = route("dashboardlinks.edit", ['dashboardlink' => $row->id]);
                        $delete_link = route("dashboardlinks.destroy", ['dashboardlink' => $row->id]);
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';  
                        return $btn;
                    })
                    ->addColumn('DashboardLink', function ($row)
                    {
                        $DashboardLink = DashboardLink::where('id', $row->id)->get()->first();
                        return $DashboardLink->title;
                    })
                    ->rawColumns(['action', 'DashboardLink'])
                    ->make(true);
        }

        return view('admin.dashboard_links.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard_links.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDashboardlinks $request)
    {
        $validated = $request->validated();

        DashboardLink::create($validated);

        return redirect()->route('dashboardlinks.index')
                ->with('success', 'Link created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $DashboardLink = DashboardLink::where('id', $id)->get()->first();
        return view('admin.dashboard_links.show', compact('DashboardLink'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $DashboardLink = DashboardLink::where('id', $id)->get()->first();
        return view('admin.dashboard_links.edit', compact('DashboardLink'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDashboardlinks $request, $id)
    {
        $validated = $request->validated();

        DB::table('dashboard_links')->where('id',$id)->update($validated);

        return redirect()->route('dashboardlinks.index')
                ->with('success', 'Link updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('dashboard_links')->where('id',$id)->delete();

        return redirect()->route('dashboardlinks.index')
                ->with('success', 'Category deleted successfully');
    }
}
