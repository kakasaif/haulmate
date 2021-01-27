<?php

namespace App\Http\Controllers;

use App\Models\DashboardLink;
use App\Models\Housing;
use App\Models\Location;
use App\Models\Partner;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\User_housing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class AccountController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request)
    {
        $user = Auth::user();

        if (empty($user))
            return $this->_dashboard_guest($request);

        if (empty($user->moving_from) || empty($user->moving_to))
            return redirect('/register_steps');
        $user_prefs = DB::table('user_prefs')
                ->selectRaw('pref_options.*')
                ->join('pref_options', 'pref_options.id', '=', 'user_prefs.pref_id')
                ->where('user_prefs.user_id', $user->id)
                ->get()->keyBy('id')->all();
        $user_pref_ids = array_keys($user_prefs);
        $max_locations_count = count($user_prefs) > 0 ? 4 : 3;
        $locations = Location::getClosest($user, $max_locations_count, true, false, [], true);
        foreach ($locations as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }
        $faves = Location::getUserFave($user);
        $housing_faves = User_housing::with('housing.images')->where('user_id', $user->id)->limit(5)->orderBy('id', 'desc')->get();
        $housing_faves_ids = Housing::getUserFave($user);
        $properties = Housing::with(['images', 'location'])->whereNotIn('id', $housing_faves_ids)->get();
        $properties = $properties->random(count($properties) >= 6 ? 6 : count($properties));
        $faves_properties = Housing::with(['images', 'location'])->whereIn('id', $housing_faves_ids)->get();
        $properties = $faves_properties->merge($properties)->take(6);
        $dashboard_links = DashboardLink::all();
        $partners = Partner::where(['is_active' => 1])->get()->all();
        $dashboard_links = DB::table('dashboard_links')->where('is_active', 1)->orderBy('updated_at', 'desc')->limit(3)->get()->all();
        $countries = get_countries(['is_active' => 1]);
        $country_from = [];
        $country_to = [];
        foreach ($countries as $country) {
            if (!empty($user->moving_from) && $user->moving_from === $country->code)
                $country_from = $country;
            if (!empty($user->moving_to) && $user->moving_to === $country->code)
                $country_to = $country;
        }

        $product_type = ProductType::all();
        $product_category = ProductCategory::with('productType')
            ->orderBy('order','asc')
            ->where('is_active',1)
            ->get()
            ->groupBy('productType.id');

        return view('dashboard', compact('product_type', 'product_category', 'locations', 'faves', 'properties', 'dashboard_links', 'partners', 'dashboard_links', 'housing_faves', 'housing_faves_ids', 'countries', 'country_from', 'country_to', 'user_prefs', 'user'));
    }

    private function _dashboard_guest($request)
    {
        $dashboard_links = DashboardLink::where('is_active', 1)->orderBy('updated_at', 'desc')->limit(3)->get()->all();
        $housing_properties = Housing::with(['images', 'location'])->get();
        $properties = $housing_properties->random(count($housing_properties) >= 6 ? 6 : count($housing_properties));
        $countries = get_countries(['is_active' => 1]);
        $country_from = [];
        $country_to = [];
        $reg_steps_info = $request->session()->get('reg_steps_info');
        $from = $reg_steps_info['moving_from'];
        $to = $reg_steps_info['moving_to'];

        foreach($countries as $country) {
            if ($from === $country->code)
                $country_from = $country;
            if ($to === $country->code)
                $country_to = $country;
        }

        $preferences = empty($reg_steps_info['preferences']) ? [] : explode(',', trim($reg_steps_info['preferences']));
        $user_prefs = [];
        if (!empty($preferences))
            $user_prefs = DB::table('user_prefs')
                    ->selectRaw('pref_options.*')
                    ->join('pref_options', 'pref_options.id', '=', 'user_prefs.pref_id')
                    ->whereIn('pref_options.id', $preferences)
                    ->get()->keyBy('id')->all();
        $max_locations_count = count($user_prefs) > 0 ? 4 : 3;
        $locations = Location::getAll($max_locations_count);
        $faves = [];

        $user_pref_ids = array_keys($user_prefs);
        foreach ($locations as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }
        $product_type = ProductType::all();
        $product_category = ProductCategory::with('productType')->get()->groupBy('productType.id');

        return view('dashboard', compact('product_category', 'product_type', 'locations', 'properties', 'dashboard_links', 'countries', 'country_from', 'country_to', 'user_prefs', 'faves'));
    }

    public function properties(Request $request, $location_seo_name)
    {
        $location = Location::with('images', 'properties')
            ->where('seo_name', $location_seo_name)
            ->get()
            ->first();
        $user = Auth::user();
        $housing_faves = Housing::getUserFave($user);

        return view('dashboard-properties', compact('location', 'housing_faves'));
    }

}
