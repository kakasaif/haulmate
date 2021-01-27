<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Requests\Admin\StoreHousingPost;
use Illuminate\Http\Request;
use App\Models\Housing;
use App\Models\Location;
use App\Models\Housing_Image;
use App\Models\Housing_Type;
use DataTables;
use Hash;
use App\AppLibrary;
use Illuminate\Support\Facades\Auth;

class HousingController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Housing');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Housing::latest();
            $types = Housing_Type::all()->keyBy('id')->toArray();

            if (Admin::isHousingPartnerRole())  
                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row)
                    {
                        $view_link = route("housing.show", ['housing' => $row->id]);
                        $edit_link = route("housing.edit", ['housing' => $row->id]);
                        $delete_link = route("housing.destroy", ['housing' => $row->id]);
                        $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
                        $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
                        $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
                        $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
                        $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
                        return $btn;
                    })
                    ->addColumn('location', function ($row)
                    {
                        $location = Location::where('id', $row->location_id)->get()->first();
                        return $location->location;
                    })
                    ->addColumn('type', function ($row) use ($types)
                    {
                        if (empty($types[$row->type_id]))
                            return '-';
                        return $types[$row->type_id]['type'];
                    })
                    ->rawColumns(['action', 'location', 'type'])
                    ->make(true);
        }

        return view('admin.housing.index');
    }

    public function create()
    {
        $locations = Location::where('is_active', 1)->get()->all();
        $admins = Admin::where('is_active', 1)->whereIn('role', ['Housing', 'Both'])->get();
        $types = Housing_Type::where('is_active', 1)->get()->all();
        return view('admin.housing.edit', compact('locations', 'admins', 'types'));
    }

    public function store(StoreHousingPost $request)
    {
        $validated = $request->validated();
        if (empty($validated['partner_id'])) {
            $validated['partner_id'] = null;
        }

        if (Admin::isHousingPartnerRole())  
            $validated['partner_id'] = Auth::user()->id;

        $housing_id = Housing::create($validated)->id;

        if ($request->input('images')) {
            $images = $request->input('images');
            foreach ($images as $image) {
                $image_upload[] = array(
                    'housing_id' => $housing_id,
                    'image_url'  => $image,
                    'order'      => 0,
                );
            }
    
            Housing_Image::insert($image_upload);
        }

        return redirect()->route('housing.index')
                ->with('success', 'Housing created successfully.');
    }

    public function show(Housing $housing)
    {
        $location = Location::where('id', $housing->location_id)->get()->first();
        $admin = Admin::where('id', $housing->partner_id)->get()->first();
        $type = Housing_Type::where('id', $housing->type_id)->get()->first();
        return view('admin.housing.show', compact('housing', 'location', 'admin', 'type'));
    }

    public function edit(Housing $housing)
    {
        $locations = Location::where('is_active', 1)->get()->all();
        $admins = Admin::where('is_active', 1)->whereIn('role', ['Housing', 'Both'])->get();
        $types = Housing_Type::where('is_active', 1)->get()->all();
        return view('admin.housing.edit', compact('housing', 'locations', 'admins', 'types'));
    }

    public function update(StoreHousingPost $request, Housing $housing)
    {
        $validated = $request->validated();
        if (empty($validated['partner_id'])) {
            $validated['partner_id'] = null;
        }

        if ($request->input('images')) {
            $images = $request->input('images');
            foreach ($images as $image) {
                $image_upload[] = array(
                    'housing_id' => $housing->id,
                    'image_url'  => $image,
                    'order'      => 0,
                );
            }
    
            Housing_Image::insert($image_upload);
        }

        if (!empty($request->input('remove_image_ids'))) {
            $remove_image_ids = explode(",", $request->input('remove_image_ids'));
            if (!empty($remove_image_ids)) {
                Housing_Image::where('housing_id', $housing->id)
                                ->whereIn('id', $remove_image_ids)
                                ->delete();
            }
        }

        $housing->update($validated);

        return redirect()->route('housing.index')
                ->with('success', 'Housing updated successfully');
    }

    public function destroy(Housing $housing)
    {
        $housing->delete();

        return redirect()->route('housing.index')
                ->with('success', 'Housing deleted successfully');
    }

    public function uploadImage(Request $request)
    {
        $image_url = AppLibrary::uploadImage('housing_images', $request->file('image'));
        return response()->json([
            'image_url' => $image_url,
        ]);
    }


    public function reorderImages(Request $request)
    {
        AppLibrary::reOrderImage($request, new Housing_Image());
    }

}
