<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreUserPost;
use Illuminate\Http\Request;
use App\User;
use DataTables;
use Hash;
use App\AppLibrary;
use App\Exports\UsersExport;
use App\Models\Pref_options;
use App\Models\Service;
use Excel;
class UsersController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Users');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('services.service')->latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $view_link = route("users.show",['user'=>$row->id]);
                    $edit_link = route("users.edit",['user'=>$row->id]);
                    $delete_link = route("users.destroy",['user'=>$row->id]);
                    $csrf_token = '<input type="hidden" name="_token" value="'.csrf_token().'">';
                    $btn = '<a href="'.$view_link.'" class="edit btn btn-primary btn-sm">View</a>';
                    $btn .= '<a href="'.$edit_link.'" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                    $btn .= '<form method="POST" action="'.$delete_link.'" style="display:inline">'.$csrf_token.'<input type="hidden" name="_method" value="DELETE">';
                    $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.users.index');
    }

    public function create()
    {
        return view('admin.users.edit');
    }

    public function store(StoreUserPost $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
      
        User::create($validated);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(StoreUserPost $request, User $user)
    {
        $validated = $request->validated();

        if ($request->file('photo') != null) {
            $photo_path = $request->file('photo')->store('photo', ['disk' => 'public']);
            $validated['photo_url'] = $photo_path;
        }

        if ($request->file('photo') != null) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function uploadPhoto(Request $request)
    {
        $photo_path = AppLibrary::uploadImage('user', $request->file('image'));
        return response()->json([
            'photo_url' => $photo_path,
        ]);
    }

    public function exportExcel(Request $request)
    {
        //Todo User  Export
        set_time_limit(0);
        ini_set('memory_limit', '512M');
        $filter['users'] = $request->input('users');
        $data['services'] = Service::all()->pluck('name');
        $data['preferences'] = Pref_options::all()->pluck('preference');

        return Excel::download(new UsersExport($filter, $data), 'users.xlsx');
    }
}
