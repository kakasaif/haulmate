<?php

namespace App\Http\Controllers\Admin;

use App\AppLibrary;
use App\Exports\AdminsExport;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreAdminPost;
use App\Admin;
use Auth;
use DataTables;
use Excel;
use Hash;
use Illuminate\Http\Request;

class AdministratorController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Administrators');
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        if ($request->ajax()) {
            $data = Admin::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) use ($user)
                    {
                        $view_link = route("administrators.show", ['administrator' => $row->id]);
                        $edit_link = route("administrators.edit", ['administrator' => $row->id]);
                        $delete_link = route("administrators.destroy", ['administrator' => $row->id]);
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        if ($user->id !== $row->id && $user->role === 'Super') {
                            $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                            $btn .= '<button type="button" class="deleteAdministrator ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        }
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('admin.administrators.index');
    }

    public function create()
    {
        return view('admin.administrators.edit');
    }

    public function store(StoreAdminPost $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);

        Admin::create($validated);

        return redirect()->route('administrators.index')
                ->with('success', 'Admin created successfully.');
    }

    public function show(Admin $administrator)
    {
        return view('admin.administrators.show', compact('administrator'));
    }

    public function edit(Admin $administrator)
    {
        return view('admin.administrators.edit', compact('administrator'));
    }

    public function update(StoreAdminPost $request, Admin $administrator)
    {
        $validated = $request->validated();

        if (empty($request->password)) {
            unset($validated['password']);
        } else {
            $validated['password'] = Hash::make($validated['password']);
        }

        $administrator->update($validated);

        return redirect()->route('administrators.index')
                ->with('success', 'Administrator updated successfully');
    }

    public function destroy(Admin $administrator)
    {

        $administrator->delete();

        return redirect()->route('administrators.index')
                ->with('success', 'Administrator deleted successfully');
    }

    public function exportExcel(Request $request)
    {
        //Todo Admin  Export
        set_time_limit(0);
        ini_set('memory_limit', '512M');
        $filter['administrators'] = $request->input('administrators');

        return Excel::download(new AdminsExport($filter), 'administrators.xlsx');
    }

}
