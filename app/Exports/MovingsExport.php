<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Models\MovingList;

class MovingsExport implements FromView
{

    public $movings;

    public function __construct($filter)
    {
        $this->movings = $filter['movings'];
    }

    public function view(): View
    {
        $movings = new MovingList;
        if (!empty($this->movings)) {
            $movings = $movings->whereIn('id', $this->movings);
        }
        $movings = $movings->with(['country_from', 'country_to'])->get();

        return view('exports.movings', compact('movings'));
    }

}
