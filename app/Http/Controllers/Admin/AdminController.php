<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use View;

class AdminController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct($cur_page = 'Dashboard', $cur_parent = '')
    {
        View::share('cur_page', $cur_page);
        if (empty($cur_parent))
            View::share('cur_parent', $cur_page);
        else
            View::share('cur_parent', $cur_parent);
    }

}
