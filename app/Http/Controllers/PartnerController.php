<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Country;
use App\Models\Lead;
use App\Models\Partner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Session;

class PartnerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function affiliate($partner_id)
    {
        $partner = Partner::where('id', $partner_id)->get()->first();
        if (empty($partner) || $partner->type !== 'affiliate')
            return redirect(route('dashboard'));
        View::share('meta_title', $partner->title);
        View::share('meta_description', $partner->meta_description);
        View::share('meta_keyword', $partner->meta_keyword);
//        $countries = get_countries(['is_active' => 1]);
//        $testimonials = Testimonial::with('country')->get();
//        return view('home', compact('countries', 'testimonials'));

        return view('affiliate-flow.step1', compact('partner'));
    }

    public function relocation(Request $request, $partner_id = 0)
    {
        if (empty($partner_id))
            $partner = Partner::where('action', 'relocation')->get()->first();
        else
            $partner = Partner::where('id', $partner_id)->get()->first();
        if (empty($partner) || $partner->type !== 'relocation')
            return redirect(route('dashboard'));
        $user = Auth::user();
        if (empty($request->moving_from)) {
            $moving_from = 'your country';
        } else {
            $country = Country::where('id', $request->moving_from)->get()->first();
            $moving_from = $country->country ?? 'your country';
        }
        if (empty($request->moving_to)) {
            $moving_to = 'your new country';
        } else {
            $country = Country::where('id', $request->moving_to)->get()->first();
            $moving_to = $country->country ?? 'your country';
        }
        return view('relocation-flow.step1', compact('user', 'moving_from', 'moving_to', 'partner_id', 'partner'));
    }

    public function relocationSave(LeadRequest $request)
    {
        $validated = $request->validated();
        foreach ($validated as $value) {
            if (empty($value))
                $value = null;
        }
        Lead::create($validated);
        return response()->json(['status' => 'success']);
    }

    public function incrementViews(Request $request)
    {
        Partner::find($request->id)->increment('views');
        return response()->json(['status' => 'success']);
    }

    public function partner_steps(Request $request)
    {
//        $countries = get_countries(['is_active' => 1]);
//        $country_from = [];
//        if (!empty($request->moving_from))
//            $country_from = DB::table('countries')->where(['code' => $request->moving_from])->get()->first();
//        $country_to = [];
//        if (!empty($request->moving_to))
//            $country_to = DB::table('countries')->where(['code' => $request->moving_to])->get()->first();
//        $services = DB::table('services')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
//        $preferences = DB::table('pref_options')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
//        return view('register-step', compact('services', 'preferences', 'country_from', 'country_to', 'countries'));
    }

    public function save_steps(Request $request)
    {
//        $moving_from = empty($request->moving_from) ? '' : $request->moving_from;
//        $moving_to = empty($request->moving_to) ? '' : $request->moving_to;
//        $preferences = empty($request->preferences) ? '' : $request->preferences;
//        $live_close = empty($request->live_close) ? '' : $request->live_close;
//        $remoteness = empty($request->remoteness) ? '' : $request->remoteness;
//        $transport = empty($request->transport) ? '' : $request->transport;
//        if (!empty($request)) {
//            $reg_steps_info = [
//                'services' => empty($request->services) ? '' : $request->services,
//                'preferences' => $preferences,
//                'remoteness' => $remoteness,
//                'transport' => $transport,
//                'moving_from' => $moving_from,
//                'moving_to' => $moving_to,
//                'live_close' => $live_close
//            ];
//            $request->session()->put('reg_steps_info', $reg_steps_info);
//        }
//        $user = Auth::user();
//        if (empty($user)) {
//            if ($request->page_from == "step1a")
//                return redirect('register');
//        }
//
//        if (Session::has('ref'))
//            return redirect(Session::get('ref'));
//
//        return redirect('dashboard');
    }

}
