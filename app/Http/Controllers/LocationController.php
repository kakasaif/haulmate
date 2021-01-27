<?php

namespace App\Http\Controllers;

use App\Models\Housing;
use App\Models\Location;
use App\Models\Location_Image;
use App\Models\Location_pref;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Session;
use App\User;

class LocationController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    public function index(Request $request, $seo_name)
    {
        $user = Auth::user();
        $reg_steps_info = $request->session()->get('reg_steps_info');
//        if ((empty($user->moving_from) || empty($user->moving_to)) && (empty($reg_steps_info['moving_from']) || empty($reg_steps_info['moving_to'])))
//            return redirect('/register_steps');

        $location = Location::getOne($user, ['locations.seo_name' => $seo_name]);
//        $location = Location::with(['images','location_pref.preference'])->where('seo_name', $seo_name)->get()->first();
        if (empty($location)) {
            if ($user)
                return redirect(route('location.list'));
            else
                return redirect(route('dashboard'));
        }
        $images = $location->images;
        $main_image = array_shift($images);
        View::share('meta_title', $location->meta_title);
        View::share('meta_description', $location->meta_description);
        View::share('meta_keyword', $location->meta_keyword);
        View::share('meta_image', $main_image->image_url);
//        $loc_prefs = [];
//        foreach ($location->location_pref as $item) {
//            if (isset($item->preference)) {
//                $loc_prefs[$item->preference->id] = $item;
//            }
//        }

        $faves= [];
        if ($user) {
            $property_types = empty($user->property_type) ? null : explode(',', $user->property_type);
            $user_prefs = DB::table('user_prefs')
                ->selectRaw('pref_options.*')
                ->join('pref_options', 'pref_options.id', '=', 'user_prefs.pref_id')
                ->where('user_prefs.user_id', $user->id)
                ->get()->keyBy('id')->all();
            $user_pref_ids = array_keys($user_prefs);
            $faves = Location::getUserFave($user);
//            $perc_match = getPercForLoc($loc_prefs, $user_pref_ids);
//            if (empty($user->live_close)) {
//                $distance_in_minutes = round(get_time_by_distance($location->distance_in_km));
//                $distance = [
//                    'label' => 'Distance from city centre:',
//                    'value' => number_format($location->distance_in_km, 2) . ' kms',
//                    'minutes' => $distance_in_minutes,
//                    'transport' => 'public transport'
//                ];
//            } else {
//                $distance_in_km = calc_distance($user->live_latitude, $user->live_longitude, $location->latitude, $location->longitude);
//                $distance_in_minutes = round(get_time_by_distance($distance_in_km, $user->transport));
//                $distance = [
//                    'label' => 'Distance to your point of interest:',
//                    'value' => number_format($distance_in_km, 2) . ' kms',
//                    'minutes' => $distance_in_minutes,
//                    'transport' => empty($user->transport) || $user->transport === 'public' ? 'public transport' : $user->transport
//                ];
//            }
            $top_matched_locations = Location::getClosest($user, 4, true, false, [$location->id]);
        } else {
            $property_types = empty($reg_steps_info['property_type']) ? [] : explode(',', $reg_steps_info['property_type']);
            $preferences = empty($reg_steps_info['preferences']) ? [] : explode(',', trim($reg_steps_info['preferences']));
            $user_prefs = [];
            if (!empty($preferences))
                $user_prefs = DB::table('user_prefs')
                        ->selectRaw('pref_options.*')
                        ->join('pref_options', 'pref_options.id', '=', 'user_prefs.pref_id')
                        ->whereIn('pref_options.id', $preferences)
                        ->get()->keyBy('id')->all();
            $user_pref_ids = array_keys($user_prefs);
//            $perc_match = getPercForLoc($loc_prefs, $user_pref_ids);
//            if (empty($reg_steps_info['live_close'])) {
//                $distance_in_minutes = round(get_time_by_distance($location->distance_in_km));
//                $distance = [
//                    'label' => 'Distance from city centre:',
//                    'value' => number_format($location->distance_in_km, 2) . ' kms',
//                    'minutes' => $distance_in_minutes,
//                    'transport' => 'public transport'
//                ];
//            } else {
//                $distance_in_km = calc_distance($reg_steps_info['live_latitude'], $reg_steps_info['live_longitude'], $location->latitude, $location->longitude);
//                $distance_in_minutes = round(get_time_by_distance($distance_in_km, $reg_steps_info['transport']));
//                $distance = [
//                    'label' => 'Distance to your point of interest:',
//                    'value' => number_format($distance_in_km, 2) . ' kms',
//                    'minutes' => $distance_in_minutes,
//                    'transport' => empty($reg_steps_info['transport']) || $reg_steps_info['transport'] === 'public' ? 'public transport' : $reg_steps_info['transport']
//                ];
//            }
//            $lat = empty($reg_steps_info['live_latitude']) ? User::DEFAULT_LATITUDE : $reg_steps_info['live_latitude'];
//            $long = empty($reg_steps_info['live_longitude']) ? User::DEFAULT_LONGITUDE : $reg_steps_info['live_longitude'];
            $top_matched_locations = Location::getClosest(null, 4, false, false, [$location->id]);
        }

        if (isset($location->prefs)) {
            $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
        } else {
            $location->perc_match = 0;
        }
        
        $properties = Housing::with(['images'])
            ->where('location_id', $location->id)
//            ->when(!empty($property_types), function($query) use ($property_types)
//            {
//                return $query->whereIn('type_id', $property_types);
//            })
            ->limit(4)
            ->get();

//        return view('location', compact('properties', 'location', 'distance', 'perc_match', 'faves', 'images', 'main_image', 'user', 'user_pref_ids', 'top_matched_locations'));
        return view('location', compact('properties', 'location', 'faves', 'images', 'main_image', 'user', 'user_pref_ids', 'top_matched_locations'));
    }

    public function incrementViews(Request $request)
    {
        Location::find($request->id)->increment('views');
        return response()->json(['status' => 'success']);
    }

    public function list(request $request)
    {
        $user = Auth::user();
        if (empty($user->moving_from) || empty($user->moving_to))
            return redirect('/register_steps');

        $user_detail = User::with(['preferences', 'services'])->where('id', $user->id)->first();
        $user_pref_ids = $user_detail->preferences->pluck('id')->toArray();
        $faves = Location::getUserFave($user);
        $locations = Location::getClosest($user);
        $country_from = DB::table('countries')->where(['code' => $user->moving_from])->get()->first();
        $country_to = DB::table('countries')->where(['code' => $user->moving_to])->get()->first();
        
        $locations = collect($locations)->sortByDesc('total_score')->take(9);

        foreach ($locations as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }
        $locations->sortByDesc(['perc_match', 'total_score']);
        $search_locations = [];

        $all_preferences = DB::table('pref_options')->orderBy('order','ASC')->where(['is_active' => 1])->get()->all();
        return view('locations', compact('locations', 'search_locations', 'all_preferences', 'user_pref_ids', 'faves', 'user', 'user_detail', 'country_from', 'country_to'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $faves = [];
        
        try {
            $live_close_point = get_lat_long($request->live_close);
        } catch (Exception $ex) {
            // OneMap has issues
            $live_close_point = ['lat' => User::DEFAULT_LATITUDE, 'long' => User::DEFAULT_LONGITUDE];
        }

        if ($user) {
            $user->live_latitude = $live_close_point['lat'];
            $user->live_longitude = $live_close_point['long'];
            //save new live close value
            if (!empty($request->live_close))
                $user->live_close = $request->live_close;
            if (!empty($request->remoteness))
                $user->remoteness = $request->remoteness;
            if (!empty($request->transport))
                $user->transport = $request->transport;
            $user->save();
            Location::saveUserPrefs($user, $request);
            $faves = Location::getUserFave($user);
        }
        
        $locations = Location::getClosest($user, 0, false, true);

        if (empty($locations))
            return response()->json(['html' => 'No results found']);

        $html = view('locations_list', compact('locations', 'faves'))->render();

        return response()->json(['html' => $html]);
    }

    public function search_area(Request $request)
    {
        $search = $request->search;
        $locations = Location::where('is_active',1)
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%$search%")
                    ->orWhere('location', 'like', "%$search%");
            })
            ->orderBy('title')
            ->get();

        $user = Auth::user() ?? 0;
        $faves = Location::getUserFave($user);

        $user_detail = User::with(['preferences', 'services'])->where('id', $user->id ?? 0)->first();
        $user_pref_ids = $user_detail->preferences->pluck('id')->toArray();
        
        $locations = collect($locations)->sortByDesc('total_score')->take(9);

        foreach ($locations as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }
        $locations->sortByDesc(['perc_match', 'total_score']);

        $location_areas = View::make('location_areas',compact('locations','faves'))->render();
        $search = '<h3 class="dashboard__title" id="search-title">
        <span class="title">Found ' . count($locations) . ' locations for "' . $request->search . '"</span>
        </h3>';
        return response()->json(['locations' => $location_areas, 'search' => $search]);
    }

    public function fave(Request $request)
    {
        $user = Auth::user();
        if (empty($user)) {
            $faves = $request->session()->get('location_faves');
            if (empty($faves)) {
                $faves = [$request->location_id];
            } else {
                $not_exists = true;
                foreach ($faves as $key => $location_id) {
                    if ($location_id == $request->location_id) {
                        unset($faves[$key]);
                        $not_exists = false;
                        break;
                    }
                }
                if ($not_exists)
                    $faves[] = $request->location_id;
            }
            Session::put('location_faves', $faves);
        } else {
            Location::saveUserFave($user, $request);
        }
        return response()->json(['result' => 'success']);
    }

    public function blacklist(Request $request)
    {
        $user = Auth::user();
        Location::saveUserBlacklist($user, $request);
        return response()->json(['result' => 'success']);
    }

    public function autocomplete(Request $request)
    {
        if (empty($request->search))
            return response()->json(['results' => []]);
        
        $locations = Location::select('location', 'seo_name')
            ->where('is_active', '=', 1)
            ->where('location', 'like', '%' . $request->search . '%')
            ->get()->all();

        return response()->json(['results' => $locations]);
    }

    public function find(Request $request)
    {
        $locations = [];
        $user = Auth::user();
        if (empty($user->moving_from) || empty($user->moving_to))
            return redirect('/register_steps');

        $user_detail = User::with(['preferences', 'services'])->where('id', $user->id)->first();
        $user_pref_ids = $user_detail->preferences->pluck('id')->toArray();
        $faves = Location::getUserFave($user);
        if (empty($request->search)) {
            $search = '';
            $where_like_condition = [];
        } else {
            $search = $request->search;
            $where_like_condition = ['locations.location' => $request->search];
        }
        $search_locations = Location::getAll(0, $user, false, false, [], false, false, false, true, true, [], $where_like_condition);
        $country_from = DB::table('countries')->where(['code' => $user->moving_from])->get()->first();
        $country_to = DB::table('countries')->where(['code' => $user->moving_to])->get()->first();
        
//        $search_locations = collect($search_locations)->sortByDesc('total_score')->take(9);
        $search_locations = collect($search_locations)->sortByDesc('total_score');

        foreach ($search_locations as $key => $location) {
            if (isset($location->prefs)) {
                $location->perc_match = number_format(getPercForLoc($location->prefs, $user_pref_ids), 0);
            } else {
                $location->perc_match = 0;
            }
        }
        $search_locations->sortByDesc(['perc_match', 'total_score']);

        $all_preferences = DB::table('pref_options')->orderBy('order','ASC')->where(['is_active' => 1])->get()->all();
        return view('locations', compact('search', 'locations', 'search_locations', 'all_preferences', 'user_pref_ids', 'faves', 'user', 'user_detail', 'country_from', 'country_to'));
    }
    
}
