<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\AppLibrary;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StorePartnerPost;
use App\Models\Partner;
use DataTables;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartnerController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Partners');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            
            $data = Partner::latest();

            if (Admin::isHousingPartnerRole())  
                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("partners.show", ['partner' => $row->id]);
                        $edit_link = route("partners.edit", ['partner' => $row->id]);
                        $delete_link = route("partners.destroy", ['partner' => $row->id]);

                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('partners', function ($row)
                    {
                        $partner = Partner::where('id', $row->id)->get()->first();
                        return [
                            'id' => $partner->id,
                            'is_active' => $partner->is_active ? 'Yes' : 'No',
                            'created_at' => date('F j, Y, g:i a', strtotime($partner->created_at)),
                            'updated_at' => date('F j, Y, g:i a', strtotime($partner->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'partners'])
                    ->make(true);
        }
        return view('admin.partners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins = Admin::where('is_active', 1)->whereIn('role', ['Partner', 'Both'])->get();
        return view('admin.partners.edit', compact('admins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePartnerPost $request)
    {
        $validated = $request->validated();
        if ($validated['type'] === 'relocation') {
            unset($validated['meta_description']);
            unset($validated['meta_keyword']);
        }
        if (empty($validated['partner_id'])) {
            $validated['partner_id'] = null;
        }

        if (Admin::isHousingPartnerRole())  
            $validated['partner_id'] = Auth::user()->id;

        Partner::create($validated);

        return redirect()->route('partners.index')
                ->with('success', 'Partner created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        $admin = Admin::where('id', $partner->partner_id)->get()->first();
        return view('admin.partners.show', compact('partner', 'admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        $admins = Admin::where('is_active', 1)->whereIn('role', ['Partner', 'Both'])->get();
        return view('admin.partners.edit', compact('partner', 'admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePartnerPost $request, $id)
    {
        $validated = $request->validated();
        if ($validated['type'] === 'relocation') {
            unset($validated['meta_description']);
            unset($validated['meta_keyword']);
        }
        if (empty($validated['partner_id'])) {
            $validated['partner_id'] = null;
        }

        DB::table('partner')->where('id', $id)->update($validated);

        return redirect()->route('partners.index')
                ->with('success', 'Partner updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('partner')->where('id', $id)->delete();

        return redirect()->route('partners.index')
                ->with('success', 'Partner deleted successfully');
    }

    public function uploadImage(Request $request)
    {
        $image_url = AppLibrary::uploadImage('partner', $request->file('image'));
        return response()->json([
                'image_url' => $image_url,
        ]);
    }

}
