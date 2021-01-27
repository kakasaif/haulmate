<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Model;
use Session;
use App\User;

class Location extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'locations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'location', 'seo_name', 'title', 'short_description', 'area', 'avg_rent',
        'distance_from_center', 'distance_in_km', 'description', 'meta_title', 'meta_description', 'meta_keyword',
        'latitude', 'longitude', 'schools', 'supermarkets', 'restaurants',
        'parks', 'source_url', 'is_active'
    ];

    public function images()
    {
        return $this->hasMany('App\Models\Location_Image')->orderBy('order','asc');
    }

    public function properties()
    {
        return $this->hasMany('App\Models\Housing');
    }

    public function location_pref()
    {
        return $this->hasMany('App\Models\Location_pref', 'location_id', 'id')->limit(5)->orderBy('score', 'DESC');
    }

    public static function getClosest($user, $max_locations_count = 0, $hide_blacklist = false, $increment_impression = false, $exclude_locations = [], $get_properties_count = false)
    {
        return self::getAll($max_locations_count, $user, $hide_blacklist, $increment_impression, $exclude_locations, $get_properties_count, false, true);
    }

    public static function getAllFavourite($user)
    {
        return self::getAll(0, $user, true, false, [], false, true);
    }

    public static function getOne($user, $where_condition)
    {
        $locations = self::getAll(0, $user, false, false, [], true, false, false, true, true, $where_condition);

        $location = [];
        foreach ($locations as $item) {
            $location = $item;
            break;
        }
        return $location;
    }

    public static function getAll($max_locations_count = 0, $user = null, $hide_blacklist = false, $increment_impression = false, $exclude_locations = [], $get_properties_count = false, $only_faves = false, $filter_by_distance = false, $get_images = true, $get_prefs = true, $where_condition = [], $where_like_condition = [])
    {
        $selectRaw = 'locations.*, (SELECT SUM(score) FROM location_prefs WHERE location_prefs.location_id = locations.id) as score';
        if ($user) {
            $lat = $user->live_latitude;
            $long = $user->live_longitude;
            $query = DB::table('user_prefs')
                    ->selectRaw('GROUP_CONCAT(pref_id) as prefs')
                    ->where('user_id', $user->id)
                    ->groupBy('user_id')
                    ->get()->first();
            if (!empty($query->prefs))
                $selectRaw = 'locations.*, (SELECT SUM(score) FROM location_prefs WHERE location_prefs.location_id = locations.id and location_prefs.pref_id IN (' . $query->prefs . ')) as score';
            $distance = get_distance($user->remoteness, $user->transport);
        } else {
            $reg_steps_info = session()->get('reg_steps_info');
            $lat = $reg_steps_info['live_latitude'];
            $long = $reg_steps_info['live_longitude'];
            if (!empty($reg_steps_info['preferences']))
                $selectRaw = 'locations.*, (SELECT SUM(score) FROM location_prefs WHERE location_prefs.location_id = locations.id and location_prefs.pref_id IN (' . $reg_steps_info['preferences'] . ')) as score';
            $distance = get_distance();
        }

        $query = DB::table('locations')->selectRaw($selectRaw);

        if (is_null($lat) || is_null($long)) {
            $lat = User::DEFAULT_LATITUDE;
            $long = User::DEFAULT_LONGITUDE;
        }
        $query->selectRaw('111.111 * DEGREES(ACOS(LEAST(1.0, COS(RADIANS(locations.latitude))
                * COS(RADIANS(' . $lat . '))
                * COS(RADIANS(locations.longitude - ' . $long . '))
                + SIN(RADIANS(locations.latitude))
                * SIN(RADIANS(' . $lat . '))))) AS distance_from_location')
            ->where('locations.is_active', 1);

        if ($user) {
            if ($hide_blacklist) {
                $query->whereNotIn('locations.id', function($query) use ($user)
                {
                    $query->select('location_id')
                        ->from('user_blacklist')
                        ->where('user_id', '=', $user->id);
                });
            }

            $query->leftJoin('user_fave', function($join) use ($user)
            {
                $join->on('locations.id', '=', DB::raw('user_fave.location_id'))->where('user_fave.user_id', '=', $user->id);
            });

            if ($only_faves)
                $query->whereNotNull('user_fave.location_id');

            $query->orderBy(DB::raw('ISNULL(`user_fave`.`location_id`)'), 'asc');
        }

        if (!empty($where_condition)) {
            foreach ($where_condition as $where => $condition) {
                $query->where($where, $condition);
            }
        }

        if (!empty($where_like_condition)) {
            $query->where(function($query) use ($where_like_condition)
            {
                $first = true;
                foreach ($where_like_condition as $where => $condition) {
                    if ($first) {
                        $first = false;
                        $query->where($where, 'like', '%' . $condition . '%');
                    } else {
                        $query->orWhere($where, 'like', '%' . $condition . '%');
                    }
                }
            });
        }

        if (!empty($exclude_locations))
            $query->whereNotIn('locations.id', $exclude_locations);

        $locations = $query->orderBy('score', 'desc')->get()->keyBy('id');

        if ($filter_by_distance) {
            $locations = $locations->filter(function ($location) use ($distance)
            {
                return $location->distance_from_location <= $distance;
            });
        }

        if ($max_locations_count)
            $locations = $locations->take($max_locations_count);

        foreach ($locations as $location) {
            if ($increment_impression)
                self::find($location->id)->increment('impression');

            if (empty($location->distance_from_location)) {
                $distance = $location->distance_from_center;
                $location->from_place = 'city center';
            } else {
                $distance = $location->distance_from_location;
                $location->from_place = 'your preferred location';
            }
            if (empty($distance))
                $distance_score = 0;
            else if ($distance < 1)
                $distance_score = 5;
            else if ($distance < 3)
                $distance_score = 4;
            else if ($distance < 6)
                $distance_score = 3;
            else if ($distance < 10)
                $distance_score = 2;
            else
                $distance_score = 1;
            $location->distance = $distance;
            $transport = 'public';
            if (empty($user->transport)) {
                $reg_steps_info = session()->get('reg_steps_info');
                if (!empty($reg_steps_info['transport']))
                    $transport = $reg_steps_info['transport'];
            } else {
                $transport = $user->transport;
            }
            $location->time_distance = get_time_by_distance($distance, $transport);
            $location->transport = $transport === 'public' ? 'public transport' : $transport;
            $location->total_score = $location->score + $distance_score;
        }
        return self::getDetails($locations->all(), $get_images, $get_prefs, $get_properties_count);
    }

    private static function getDetails($locations = [], $get_images = true, $get_prefs = true, $get_properties_count = false)
    {
        if (empty($locations))
            return [];
        $location_ids = array_keys($locations);

        if ($get_images) {
            $images = DB::table('location_images')
                ->whereIn('location_id', $location_ids)
                ->get();

            foreach ($images as $image) {
                $locations[$image->location_id]->images[] = $image;
            }
        }

        if ($get_prefs) {
            $prefs = DB::table('location_prefs')
                ->select('pref_options.id', 'pref_options.preference', 'pref_options.icon_url', 'location_prefs.location_id', 'location_prefs.score')
                ->join('pref_options', 'pref_options.id', '=', 'location_prefs.pref_id')
                ->whereIn('location_prefs.location_id', $location_ids)
                ->where('pref_options.is_active', 1)
                ->where('location_prefs.score', '>=', 4)
                ->orderBy('location_prefs.score', 'desc')
                ->get();

            foreach ($prefs as $pref_option) {
                $locations[$pref_option->location_id]->prefs[$pref_option->id] = $pref_option;
            }
        }

        if ($get_properties_count) {
            $properties = DB::table('housing')
                ->selectRaw('location_id, COUNT(id) as properties_count')
                ->whereIn('location_id', $location_ids)
                ->where('is_active', 1)
                ->groupBy('location_id')
                ->get()->all();
            foreach ($properties as $location) {
                $locations[$location->location_id]->properties_count = $location->properties_count;
            }
        }

        return $locations;
    }

    public static function saveUserPrefs($user, $request)
    {
        if (empty($user))
            return;

        DB::table('user_prefs')->where('user_id', $user->id)->delete();
        if (!empty($request->preferences)) {
            foreach ($request->preferences as $pref_id) {
                $query = DB::table('user_prefs')->insert(['user_id' => $user->id, 'pref_id' => $pref_id]);
            }
        }
    }

    public static function saveUserFave($user, $request)
    {
        if (empty($user))
            return;

        if (empty($request->fave)) {
            DB::table('user_fave')->where(['user_id' => $user->id, 'location_id' => $request->location_id])->delete();
            return;
        } else
            DB::table('user_blacklist')->where(['user_id' => $user->id, 'location_id' => $request->location_id])->delete();

        DB::table('user_fave')->insert(['user_id' => $user->id, 'location_id' => $request->location_id]);
    }

    public static function getUserFave($user)
    {
        $query = DB::table('user_fave')
                ->selectRaw('GROUP_CONCAT(location_id) as faves')
                ->where('user_id', $user->id)
                ->groupBy('user_id')
                ->get()->first();
        if (empty($query->faves))
            return [];

        return explode(',', $query->faves);
    }

    public static function saveUserBlacklist($user, $request)
    {
        if (empty($user))
            return;
        DB::table('user_fave')->where(['user_id' => $user->id, 'location_id' => $request->location_id])->delete();
        DB::table('user_blacklist')->insert(['user_id' => $user->id, 'location_id' => $request->location_id]);
    }

    public static function getUserBlacklist($user)
    {
        $query = DB::table('user_blacklist')
                ->selectRaw('GROUP_CONCAT(location_id) as blacklists')
                ->where('user_id', $user->id)
                ->groupBy('user_id')
                ->get()->first();
        if (empty($query->blacklists))
            return [];

        return explode(',', $query->blacklists);
    }

    public function user_fave()
    {
        return $this->hasMany('App\Models\User_fave');
    }

}
