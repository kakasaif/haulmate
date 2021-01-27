<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Country;
use App\Models\Housing;
use App\Models\Lead;
use App\Models\Location;
use App\Models\Partner;
use App\Models\Pref_options;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        list($locations, $locations_datasets) = $this->getLocationsData(5);
        list($partners, $partners_datasets) = $this->getPartnersData(5);
        list($housing, $housing_datasets) = $this->getHousingData(5);
        list($countries, $plots_reports) = $this->getMovingsData(5);
        list($preferences, $preferences_datasets) = $this->getPreferencesData(5);
        $moving_to_countries = $this->getMovingToCountry();
        return view('admin.index', compact('locations_datasets', 'locations', 'partners', 'partners_datasets', 'housing', 'housing_datasets', 'countries', 'preferences', 'preferences_datasets', 'plots_reports','moving_to_countries'));
    }

    public function getMovingToCountry() 
    {
        $countries = DB::table('countries')
            ->select('countries.id','country')
            ->join('users', 'users.moving_to', '=', 'countries.code')
            ->groupBy(['countries.id','country'])
            ->orderByRaw("FIELD(country , 'Singapore') DESC")
            ->orderBy('country','asc')
            ->get();
        return $countries;
    }

    public function getMovingToFilter(Request $request) 
    {
        $id = $request->moving_filter;
        $country = Country::find($id);
        $limit = $request->limit;

        $countries_filter= DB::table('countries')
            ->selectRaw('country, moving_from, moving_to, COUNT(moving_from) as moving_from_count, latitude, longitude')
            ->join('users', 'users.moving_from', '=', 'countries.code')
            ->where('moving_to',$country->code)
            ->where('moving_from', '!=', null)
            ->groupBy(['country', 'moving_to','moving_from','latitude','longitude'])
            ->orderBy('moving_from_count','desc')
            ->get();

        return $countries_filter;
    }

    private function getLocationsData($limit = 0)
    {
        $all_locations = Location::withCount('user_fave')->orderBy(DB::raw('impression + views + user_fave_count'), 'DESC')->get();
        $locations_datasets = [
            'labels' => $all_locations->pluck('location')->toArray(),
            'datasets' => [
                [
                    'label' => 'Search Result Count',
                    'backgroundColor' => '#3e95cd',
                    'data' => $all_locations->pluck('impression')->toArray()
                ],
                [
                    'label' => 'Number of Clicks',
                    'backgroundColor' => '#8e5ea2',
                    'data' => $all_locations->pluck('views')->toArray()
                ],
                [
                    'label' => 'Number of Fav',
                    'backgroundColor' => '#cd1dcb',
                    'data' => $all_locations->pluck('user_fave_count')->toArray()
                ],
            ],
        ];
        if (empty($limit))
            $locations = $all_locations;
        else
            $locations = $all_locations->take($limit);
        return [$locations, $locations_datasets];
    }

    private function getPartnersData($limit = 0)
    {
        $all_partners = Partner::withCount('leads')->orderBy(DB::raw('views + leads_count'), 'DESC');

        if (Admin::isHousingPartnerRole())  
            $all_partners = $all_partners->where('partner_id', Auth::user()->id);

        $all_partners = $all_partners->get();
        $partners_datasets = [
            'labels' => $all_partners->pluck('title')->toArray(),
            'datasets' => [
                [
                    'label' => 'Number of Clicks',
                    'backgroundColor' => '#8e5ea2',
                    'data' => $all_partners->pluck('views')->toArray()
                ],
                [
                    'label' => 'Number of Leads',
                    'backgroundColor' => '#cd1dcb',
                    'data' => $all_partners->pluck('leads_count')->toArray()
                ],
            ],
        ];
        if (empty($limit))
            $partners = $all_partners;
        else
            $partners = $all_partners->take($limit);
        return [$partners, $partners_datasets];
    }
    
    private function getHousingData($limit = 0)
    {
        $all_housing = Housing::orderBy(DB::raw('rate'), 'DESC');

        if (Admin::isHousingPartnerRole())  
            $all_housing = $all_housing->where('partner_id', Auth::user()->id);

        $all_housing = $all_housing->get();
        $housing_datasets = [
            'labels' => $all_housing->pluck('title')->toArray(),
            'datasets' => [
                [
                    'label' => 'Rate',
                    'backgroundColor' => '#8e5ea2',
                    'data' => $all_housing->pluck('rate')->toArray()
                ]
            ],
        ];
        if (empty($limit))
            $housing = $all_housing;
        else
            $housing = $all_housing->take($limit);
        return [$housing, $housing_datasets];
    }

    private function getMovingsData($limit = 0)
    {
        $countries = Country::withCount(['moving_to', 'moving_from'])
                ->get()->sort(function($a, $b)
        {
            $count_a = $a->moving_to_count + $a->moving_from_count;
            $count_b = $b->moving_to_count + $b->moving_from_count;

            if ($count_a == $count_b)
                return 0;

            return ($count_a < $count_b) ? 1 : -1;
        });

        if ($limit)
            $countries = $countries->take($limit);

        $plots_reports = [];
        foreach ($countries as $country) {
            if ($country->moving_from_count == 0 && $country->moving_to_count == 0) {
                continue;
            }
            $plots_reports[$country->code] = [
                'latitude' => $country->latitude,
                'longitude' => $country->longitude,
                'movingFrom' => $country->moving_from_count,
                'movingTo' => $country->moving_to_count,
                'popup' => "Moving from: {$country->moving_from_count}, Moving to: {$country->moving_to_count}",
            ];
        }

        return [$countries, $plots_reports];
    }

    private function getPreferencesData($limit = 0, $label = 'Most Popular Preferences')
    {
        $query = Pref_options::withCount('location_pref')
            ->where('is_active', 1)
            ->orderBy('location_pref_count', 'DESC');
        if ($limit)
            $query->limit($limit);
        $preferences = $query->get();

        $bg_colors = array();
        foreach ($preferences as $preference) {
            $bg_colors[] = $this->random_color();
        }

        $preferences_datasets = [
            'labels' => $preferences->pluck('preference')->toArray(),
            'datasets' => [
                [
                    'label' => $label,
                    'data' => $preferences->pluck('location_pref_count')->toArray(),
                    'backgroundColor' => '#e6985c'//$bg_colors
                ]
            ]
        ];

        return [$preferences, $preferences_datasets];
    }

    public function getData(Request $request)
    {
        $color = "#3e95cd";
        $range = $request->date_range;
        if ($range === 'this_year') {
            $year = date('Y'); // get current year
            $data = $this->getSignupsByYear($color, $year, date('F'));
        } else if ($range === 'last_year') {
            $year = date('Y') - 1; // get previous year
            $data = $this->getSignupsByYear($color, $year);
        } else if ($range === 'this_month') {
            $year = date('Y'); // get current year
            $month = date('m'); // get current month
            $data = $this->getSignupsByMonth($color, $year, $month);
        } else if ($range === 'last_month') {
            $year = date('Y'); // get current year
            $month = date('m') - 1; // get previous month
            if ($month === 12)
                $year--;
            $data = $this->getSignupsByMonth($color, $year, $month);
        } else if ($range === 'this_week') {
            $start = date('w') - 1;
            $end = $start - 6;
            $data = $this->getSignupsByDate($color, $start, $end);
        } else if ($range === 'last_week') {
            $start = date('w') + 6;
            $end = date('w');
            $data = $this->getSignupsByDate($color, $start, $end);
        } else if ($range === 'last_3_days') {
            $start = 2;
            $data = $this->getSignupsByDate($color, $start);
        } else if ($range === 'today') {
            $start = 0;
            $data = $this->getSignupsByDate($color, $start);
        } else {
            $start_date = date_create_from_format('m/d/Y', $request->start_date);
            $start = dateDifference(date('Y-m-d'), $start_date->format('Y-m-d'));
            $end_date = date_create_from_format('m/d/Y', $request->end_date);
            $end = dateDifference(date('Y-m-d'), $end_date->format('Y-m-d'));
            $data = $this->getSignupsByDate($color, $start, $end);
        }
        return response()->json($data);
    }

    private function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }

    private function random_color()
    {
        return '#' . $this->random_color_part() . $this->random_color_part() . $this->random_color_part();
    }

    private function getSignupsByYear($color, $year, $last_month = 'December')
    {
        $signup_labels = [];
        $signup_values = [];
        $signup_colors = [];
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        foreach ($months as $month) {
            $signup_labels[$month] = $month;
            $signup_values[$month] = 0;
            $signup_colors[$month] = $color;//$this->random_color();
            if ($month === $last_month)
                break;
        }
        $signups = DB::table('users')
                ->selectRaw('COUNT(`id`) as `users`, MONTHNAME(`created_at`) as `month`, YEAR(`created_at`) as `year`')
                ->where(DB::raw('YEAR(`created_at`)'), '=', $year)
                ->groupBy('year')
                ->groupBy('month')
                ->orderBy(DB::raw("FIELD(`month`, 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December')"))
                ->get()->all();
        foreach ($signups as $signup) {
            $signup_values[$signup->month] = $signup->users;
        }
        $signup_dataset = [
            'signup_labels' => array_values($signup_labels),
            'signup_values' => array_values($signup_values),
            'signup_colors' => array_values($signup_colors)
        ];
        return $signup_dataset;
    }

    private function getSignupsByMonth($color, $year, $month)
    {
        $signup_labels = [];
        $signup_values = [];
        $signup_colors = [];
        $today = date('Y-m-d');
        $month = strlen($month) === 1 ? '0' . $month : "$month";
        $days = ['01' => 31, '02' => cal_days_in_month(CAL_JULIAN, 2, $year), '03' => 31, '04' => 30, '05' => 31, '06' => 30, '07' => 31, '08' => 31, '09' => 30, '10' => 31, '11' => 30, '12' => 31];
        for ($index = 1; $index < $days[$month] + 1; $index++) {
            $date = $year . '-' . (strlen($month) === 1 ? '0' . $month : $month) . '-' . (strlen($index) === 1 ? '0' . $index : $index);
            $signup_labels[$date] = $date;
            $signup_values[$date] = 0;
            $signup_colors[$date] = $color;//$this->random_color();
            if ($date === $today)
                break;
        }
        $signups = DB::table('users')
                ->selectRaw('COUNT(`id`) as `users`, DATE(`created_at`) as `cur_date`')
                ->where(DB::raw('YEAR(`created_at`)'), '=', $year)
                ->where(DB::raw('MONTH(`created_at`)'), '=', $month)
                ->groupBy('cur_date')
                ->orderBy('cur_date', 'asc')
                ->get()->all();
        foreach ($signups as $signup) {
            $signup_values[$signup->cur_date] = $signup->users;
        }
        $signup_dataset = [
            'signup_labels' => array_values($signup_labels),
            'signup_values' => array_values($signup_values),
            'signup_colors' => array_values($signup_colors)
        ];
        return $signup_dataset;
    }

    private function getSignupsByDate($color, $start_day, $end_day = 0)
    {
        $signup_labels = [];
        $signup_values = [];
        $signup_colors = [];
        $start = date('Y-m-d 00:00:00', strtotime("-$start_day days"));
        $query = DB::table('users')
            ->selectRaw('COUNT(`id`) as `users`, DATE(`created_at`) as `cur_date`')
            ->where('created_at', '>=', $start);
        if ($end_day) {
            $end = date('Y-m-d 23:59:59', strtotime("-$end_day days"));
            $query->where('created_at', '<=', $end);
        }
        $signups = $query->groupBy('cur_date')
                ->orderBy('cur_date', 'asc')
                ->get()->keyBy('cur_date')->all();
        for ($index = $start_day; $index >= $end_day; $index--) {
            $cur_date = date('Y-m-d', strtotime("-$index days"));
            $signup_labels[] = $cur_date;
            if (empty($signups[$cur_date]))
                $signup_values[] = 0;
            else
                $signup_values[] = $signups[$cur_date]->users;
            $signup_colors[] = $color;//$this->random_color();
        }
        $signup_dataset = [
            'signup_labels' => $signup_labels,
            'signup_values' => $signup_values,
            'signup_colors' => $signup_colors
        ];
        return $signup_dataset;
    }

    public function chart($type)
    {
        $filter = false;
        $chart_type = false;
        $plots = false;
        $chart_datasets = [];
        $moving_to_countries = false;
        if ($type === 'locations') {
            $chart_type = 'stacked';
            $headers = ['#', 'Location Name', 'Search Result Count', 'Number of Clicks', 'Number of Fav'];
            list($table_values, $chart_datasets) = $this->getLocationsData();
        } else if ($type === 'partners') {
            $headers = ['#', 'Partner Title', 'Number of Clicks', 'Number of Leads'];
            list($table_values, $chart_datasets) = $this->getPartnersData();
        } else if ($type === 'housing') {
            $headers = ['#', 'Housing Title', 'Rate', 'Location'];
            list($table_values, $chart_datasets) = $this->getHousingData();
        } else if ($type === 'movings') {
            $headers = ['#', 'Country Name', 'Moving From'];
            list($table_values, $plots) = $this->getMovingsData();
            $moving_to_countries = $this->getMovingToCountry();
        } else if ($type === 'preferences') {
            $headers = ['#', 'Preference Name', 'Count'];
            list($table_values, $chart_datasets) = $this->getPreferencesData(0, 'All Preferences');
        }
        return view('admin.charts.index', compact('type', 'filter', 'chart_type', 'plots', 'headers', 'table_values', 'chart_datasets', 'moving_to_countries'));
    }

}
