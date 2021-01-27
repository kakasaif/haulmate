<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use App\Models\Location;
use App\Models\User_preference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{

    public function index(Request $request)
    {
        $user = Auth::user();
        $faves = Location::getUserFave($user);
        $faves_location = Location::getAllFavourite($user, $faves);
        $housing_faves_ids = Housing::getUserFave($user);
        $faves_properties = Housing::with(['images', 'location'])->whereIn('id', $housing_faves_ids)->get();

        $user_prefs = DB::table('user_prefs')
                ->selectRaw('pref_options.*')
                ->join('pref_options', 'pref_options.id', '=', 'user_prefs.pref_id')
                ->where('user_prefs.user_id', $user->id)
                ->get()->keyBy('id')->all();
        $user_pref_ids = array_keys($user_prefs);
        $distance = get_distance($user->remoteness, $user->transport);

        foreach ($faves_location as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }

        return view('favorites', compact('faves', 'faves_location', 'faves_properties', 'housing_faves_ids','user_prefs'));
    }

}
