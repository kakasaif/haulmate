<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Lead;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Leads');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Lead::latest()->with('user', 'partner', 'property');

            if (Admin::isHousingPartnerRole())  
                $data = $data->where('partner_id', Auth::user()->id);

            $data = $data->get();   

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('user', function ($row)
                    {
                        return empty($row->user->first_name) ? $row->user->last_name : $row->user->first_name . ' ' . $row->user->last_name;
                    })
                    ->addColumn('type', function ($row)
                    {
                        return !empty($row->partner_id) ? 'Partner' : (!empty($row->property_id) ? 'Property' : '');
                    })
                    ->addColumn('object', function ($row)
                    {
                        return !empty($row->partner) ? $row->partner->title : (!empty($row->property) ? $row->property->title : '');
                    })
//                    ->addColumn('action', function ($row)
//                    {
//                        $view_link = route("leads.show", ['lead' => $row->id]);
//                        return '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
//                    })
                    ->addColumn('leads', function ($row)
                    {
                        $lead = Lead::where('id', $row->id)->get()->first();
                        return [
                            'id' => $lead->id,
                            'created_at' => date('F j, Y, g:i a', strtotime($lead->created_at)),
                            'updated_at' => date('F j, Y, g:i a', strtotime($lead->updated_at)),
                        ];
                    })
                    ->rawColumns(['action', 'leads'])
                    ->make(true);
        }
        return view('admin.leads.index');
    }

}
