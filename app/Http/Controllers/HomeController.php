<?php

namespace App\Http\Controllers;

use App\Models\DashboardLink;
use App\Models\Housing;
use App\Models\Location;
use App\Models\MovingList;
use App\Models\Testimonial;
use App\Models\User_preference;
use App\Models\User_service;
use App\Http\Requests\MovingListPost;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class HomeController extends Controller
{

    public function index()
    {
        $countries = get_countries(['is_active' => 1]);
        $countries_from = reorder_countries($countries, ['US', 'GB', 'IN', 'AU']);
        $testimonials = Testimonial::with('country')->get();
        $services = DB::table('services')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
        return view('home', compact('countries', 'testimonials', 'services', 'countries_from'));
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function termsOfUse()
    {
        return view('terms_of_use');
    }

    public function about()
    {
        return view('about');
    }

    public function register_steps(Request $request)
    {
        $ref = Session::get('ref');
        $page_from = empty($ref) ? route('account') : $ref;
        $all_countries = get_countries(['is_active' => 1], []);
        $countries = reorder_countries($all_countries, ['SG']);
        $countries_from = reorder_countries($all_countries, ['US', 'GB', 'IN', 'AU']);
        $country_from = [];
        $country_to = [];

        $user = Auth::user();
        if ($user) {
            if (!empty($user->moving_from))
                $country_from = DB::table('countries')->where(['code' => $user->moving_from])->get()->first();
            if (!empty($user->moving_to))
                $country_to = DB::table('countries')->where(['code' => $user->moving_to])->get()->first();
            $user_detail = User::with(['preferences', 'services'])->where('id', $user->id)->first();
            $selected_property_types = empty($user_detail->property_type) ? [] : explode(',', $user_detail->property_type);
        } else {
            //put country_from into $reg_steps_info session
            $reg_steps_info = $request->session()->get('reg_steps_info');
            if (!empty($request->moving_from)) {
                $country_from = DB::table('countries')->where(['id' => $request->moving_from])->get()->first();
                $reg_steps_info['moving_from'] = $country_from->code;
            }
            if (empty($country_from) && !empty($reg_steps_info['moving_from']))
                $country_from = DB::table('countries')->where(['code' => $reg_steps_info['moving_from']])->get()->first();

            //put country_to into $reg_steps_info session
            if (!empty($request->moving_to)) {
                $country_to = DB::table('countries')->where(['id' => $request->moving_to])->get()->first();
                $reg_steps_info['moving_to'] = $country_to->code;
            }
            if (empty($country_to) && !empty($reg_steps_info['moving_to']))
                $country_to = DB::table('countries')->where(['code' => $reg_steps_info['moving_to']])->get()->first();

            //save $reg_steps_info session
            if (!empty($reg_steps_info))
                $request->session()->put('reg_steps_info', $reg_steps_info);
            $user_detail = new \stdClass();
            $selected_property_types = empty($reg_steps_info['property_type']) ? [] : explode(',', $reg_steps_info['property_type']);
        }
        if ($request->isMethod('post') && !empty($country_to) && $country_to->country !== 'Singapore')
            return  view('register-step.email-step', compact('country_from', 'country_to'));
        $services = DB::table('services')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
        $preferences = DB::table('pref_options')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
        $property_types = DB::table('housing_type')->where(['is_active' => 1])->orderBy('id', 'asc')->get()->all();
        return view('register-step', compact('page_from', 'services', 'preferences', 'country_from', 'country_to', 'countries', 'countries_from', 'user_detail', 'property_types', 'selected_property_types'));
    }

    public function save_steps(Request $request)
    {
        if (empty($request->moving_from))
            return redirect()->back()->withErrors(['errors', 'Incorrect Moving from field value']);
        $country_from = DB::table('countries')->where(['id' => $request->moving_from])->get()->first();
        if (!empty($request->moving_to))
            $country_to = DB::table('countries')->where(['id' => $request->moving_to])->get()->first();
        if (empty($country_to->country))
            return redirect()->back()->withErrors(['errors', 'Incorrect Moving to field value']);
        if ($country_to->country !== 'Singapore')
            return view('register-step.email-step', compact('country_from', 'country_to'));
        $live_params = empty($request->live_close) ? [] : get_lat_long($request->live_close);
        $reg_steps_info = [
            'remoteness' => empty($request->remoteness) ? null : $request->remoteness,
            'transport' => empty($request->transport) ? null : $request->transport,
            'property_type' => empty($request->property_type) ? null : $request->property_type,
            'moving_from' => $country_from->code,
            'moving_to' => $country_to->code,
            'moving_with' => empty($request->moving_with) ? null : $request->moving_with,
            'moving_on' => empty($request->moving_on) ? null : $request->moving_on,
            'live_close' => empty($live_params['address']) ? null : $live_params['address'],
            'live_latitude' => empty($live_params['lat']) ? null : $live_params['lat'],
            'live_longitude' => empty($live_params['long']) ? null : $live_params['long']
        ];

        $user = Auth::user();
        if ($user) {
            $this->savePreferences($user->id, $request->preferences);
            $this->saveServices($user->id, $request->services);
            $user->update($reg_steps_info);
        } else {
            $reg_steps_info['services'] = empty($request->services) ? null : $request->services;
            $reg_steps_info['preferences'] = empty($request->preferences) ? null : $request->preferences;
            $request->session()->put('reg_steps_info', $reg_steps_info);
        }
        if (empty($user)) {
            if ($request->page_from == "step1a")
                return redirect('/');
        }

        if (Session::has('ref'))
            return redirect(Session::get('ref'));

        if ($user)
            return redirect('account');
        return redirect('dashboard');
    }

    private function savePreferences($user_id, $preferences)
    {
        $user_id = Auth::user()->id;
        User_preference::where('user_id', $user_id)->delete();

        // check if nothing to insert
        if (empty(trim($preferences)))
            return;

        $preferences = explode(',', trim($preferences));
        $preferences_update = array();
        foreach ($preferences as $preference) {
            $preferences_update[] = array(
                'user_id' => $user_id,
                'pref_id' => $preference
            );
        }

        return User_preference::insert($preferences_update);
    }

    private function saveServices($user_id, $services)
    {
        $user_id = Auth::user()->id;
        User_service::where('user_id', $user_id)->delete();

        // check if nothing to insert
        if (empty(trim($services)))
            return;

        $services = explode(',', trim($services));
        $services_update = array();
        foreach ($services as $service) {
            $services_update[] = array(
                'user_id' => $user_id,
                'service_id' => $service
            );
        }

        return User_service::insert($services_update);
    }

    public function saveEmailStep(MovingListPost $request)
    {
        $validated = $request->validated();
        MovingList::create($validated);
        return redirect(url('/'))->with('success', 'Your request saved successfully.');
    }

//    public function landing()
//    {
//        return view('landing');
//    }
//
//    public function forum()
//    {
//        return view('forum');
//    }
//
//    public function forum_detail()
//    {
//        return view('forum-detail');
//    }
//
//    public function task()
//    {
//        return view('task');
//    }
//
//    public function login()
//    {
//        return view('login');
//    }
//
//    public function join_login(request $request)
//    {
//
//        $request->session()->put('email', $request->email);
//        return view('account');
//    }
//
//    public function finance()
//    {
//        return view('finance');
//    }
//
//    public function not_found()
//    {
//        return view('not-found');
//    }
//
//    public function favorites()
//    {
//        return view('favorites');
//    }
//
//    public function comparison()
//    {
//        return view('comparison');
//    }
}
