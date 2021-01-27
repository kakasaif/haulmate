<?php

namespace App\Exports;

use App\Admin;
use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class AdminsExport implements FromView
{

    public $administrators;

    public function __construct($filter)
    {
        $this->administrators = $filter['administrators'];
    }

    public function view(): View
    {
        $admin_model = new Admin;

        if (!empty($this->administrators)) {
            $admin_model->whereIn('id', $this->administrators);
        }

        $administrators = $admin_model->get();

        return view('exports.administrators', [
            'administrators' => $administrators
        ]);
    }

}
