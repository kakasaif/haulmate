<?php

namespace App\Http\Controllers\Admin;

use App\AppLibrary;
use App\Exports\MovingsExport;
use App\Http\Controllers\Admin\AdminController;
use App\Models\MovingList;
use DataTables;
use Excel;
use Illuminate\Http\Request;

class MovingsController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct('Moving List');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MovingList::with('country_from', 'country_to')->get();
            return Datatables::of($data)
                ->addIndexColumn()
//                ->addColumn('action', function ($row)
//                {
//                    $view_link = route("movings.show", ['moving' => $row->id]);
//                    $edit_link = route("movings.edit", ['moving' => $row->id]);
//                    $delete_link = route("movings.destroy", ['moving' => $row->id]);
//                    $csrf_token = '<input type="hidden" name="_token" value="' . csrf_token() . '">';
//                    $btn = '<a href="' . $view_link . '" class="edit btn btn-primary btn-sm">View</a>';
//                    $btn .= '<a href="' . $edit_link . '" class="ml-1 edit btn btn-warning btn-sm">Edit</a>';
//                    $btn .= '<form method="POST" action="' . $delete_link . '" style="display:inline">' . $csrf_token . '<input type="hidden" name="_method" value="DELETE">';
//                    $btn .= '<button type="submit" class="ml-1 edit btn btn-danger btn-sm">Delete</button></form>';
//                    return $btn;
//                })
//                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.moving_list.index');
    }

    public function exportExcel(Request $request)
    {
        //Todo Moving  Export
        set_time_limit(0);
        ini_set('memory_limit', '512M');
        $filter['movings'] = $request->input('movings');

        return Excel::download(new MovingsExport($filter), 'movings.xlsx');
    }

}
