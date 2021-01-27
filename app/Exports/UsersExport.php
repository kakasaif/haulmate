<?php

namespace App\Exports;

use App\Models\Country;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

use App\User;

class UsersExport implements FromView
{
    public $users;
    public $data;

    public function __construct($filter, $data)
    {
        $this->users    = $filter['users'];
        $this->data = $data;
    }

    public function view(): View
    {
        $users = new User;

        if (!empty($this->users)) {
            $users = $users->whereIn('id', $this->users);
        }

        $countries = Country::all()->keyBy('code');

        $users = $users->with(['services','preferences'])->get();

        return view('exports.users', [
            'users' => $users,
            'data' => $this->data,
            'countries' => $countries
        ]);
    }
}
