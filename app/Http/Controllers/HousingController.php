<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use App\Models\Location;
use App\Models\Housing;
use App\Models\Housing_Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\View;

class HousingController extends Controller
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

    public function index($id)
    {
        $similar_rate_diff = 100;
        $property = Housing::with(['images', 'location', 'type'])->where('id', $id)->get()->first();
        View::share('meta_title', $property->meta_title);
        View::share('meta_description', $property->meta_description);
        View::share('meta_keyword', $property->meta_keyword);
        $image = $property->images->first();
        View::share('meta_image', $image->image_url);
        $properties = Housing::with(['images', 'type'])
            ->where('location_id', $property->location_id)
            ->take(4)->get();
        $similar_properties = Housing::with(['images', 'type'])
            ->where('id', '!=', $id)
            ->whereBetween('rate', [$property->rate - $similar_rate_diff, $property->rate + $similar_rate_diff])
            ->take(4)->get();
        $user = Auth::user();
        $faves = Housing::getUserFave($user);
        return view('property', compact('property', 'properties', 'similar_properties', 'faves'));
    }

    public function list($location_seo_name)
    {
        $location = Location::with('images', 'properties.location')->where('seo_name', $location_seo_name)->get()->first();
        $user = Auth::user();
        $housing_faves = Housing::getUserFave($user);
        $types = Housing_Type::where('is_active', 1)->get()->keyBy('id')->toArray();
        $user_detail = User::with(['preferences', 'services'])->where('id', $user->id)->first();
        $user_pref_ids = $user_detail->preferences->pluck('id')->toArray();
        return view('properties', compact('location', 'housing_faves', 'types','user_pref_ids'));
    }

    public function fave(Request $request)
    {
        $user = Auth::user();
        Housing::saveUserFave($user, $request);
        return response()->json(['result' => 'success']);
    }

    public function book($property_id)
    {
        $user = Auth::user();
        return view('housing-book', compact('user', 'property_id'));
    }

    public function bookSave(LeadRequest $request)
    {
        $validated = $request->validated();
        foreach ($validated as $value) {
            if (empty($value))
                $value = null;
        }
        Lead::create($validated);
        return response()->json(['status' => 'success']);
    }

}
