<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;
use App\AppLibrary;
use App\Models\User_preference;
use App\Models\User_service;

class ProfileController extends Controller
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

    public function index()
    {
        $user = Auth::user();
        $countries = get_countries(['is_active' => 1]);

        $country_from = DB::table('countries')->where(['code' => $user->moving_from])->get()->first();
        $country_to = DB::table('countries')->where(['code' => $user->moving_to])->get()->first();
        $services = DB::table('services')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
        $preferences = DB::table('pref_options')->where(['is_active' => 1])->orderBy('order', 'asc')->get()->all();
        $user_detail = User::with(['preferences', 'services'])->where('id', $user->id)->first();

        return view('profile', compact('user', 'countries', 'services', 'preferences', 'country_from', 'country_to', 'user_detail'));
    }

    public function save(Request $request)
    {
        $this->validator($request->all())->validate();
        $data = $request->all();

        if ($request->file('photo_url')) {
            $photo_path = AppLibrary::uploadImage('user', $request->file('photo_url'));
            $data['photo_url'] = $photo_path;
        }

        unset($data['_token']);
        User::where('id', Auth::user()->id)->update($data);
        return redirect(route('profile'))->with('status', "Your profile updated succesfully!");
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validator($data)
    {
        return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'phone' => ['nullable', 'regex:/\+{0,1}[0-9]{3,12}/'],
        ]);
    }

    public function resetPassword(Request $request)
    {
        Session::flash('tab', 'reset');
        $this->resetPasswordValidator($request->all())->validate();
        $user = Auth::user();
        if (!Auth::attempt(['email' => $user->email, 'password' => $request->old_password], false))
            return redirect(route('profile'))->with(['old_password_error' => true, 'message' => "Your password is incorrect"]);
        User::where('id', $user->id)->update(['password' => Hash::make($request->password)]);
        Auth::logout();
        return redirect(route('login'));
    }

    /**
     * Validate the password resetting data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function resetPasswordValidator($data)
    {
        return Validator::make($data, [
                'old_password' => ['required', 'string', 'min:8'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    public function savePreferences(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'preferences.*' => 'integer',
            ])->validate();

        $user_id = Auth::user()->id;
        $preferences = $validator['preferences'];

        User_preference::where('user_id', $user_id)->delete();

        $preferences_update = array();
        foreach ($preferences as $preference) {
            $preferences_update[] = array(
                'user_id' => $user_id,
                'pref_id' => $preference
            );
        }

        User_preference::insert($preferences_update);

        return response()->json([
                'updated' => 'success',
                'preferences' => $preferences
        ]);
    }

    public function saveServices(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'services.*' => 'integer',
            ])->validate();

        $user_id = Auth::user()->id;
        $services = $validator['services'];

        User_service::where('user_id', $user_id)->delete();

        $services_update = array();
        foreach ($services as $services) {
            $services_update[] = array(
                'user_id' => $user_id,
                'service_id' => $services
            );
        }

        User_service::insert($services_update);

        return response()->json([
                'updated' => 'success',
                'services' => $services
        ]);
    }

    public function saveLocation(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'live_close' => 'string|max:255',
                'remoteness' => 'integer|in:5,10,20,30,40',
                'transport' => 'string|in:walking,public,drive'
            ])->validate();

        $user_id = Auth::user()->id;

        try {
            $live_close_point = get_lat_long($request->live_close);
        } catch (Exception $ex) {
            // OneMap has issues
            $live_close_point = ['lat' => User::DEFAULT_LATITUDE, 'long' => User::DEFAULT_LONGITUDE];
        }
        $validator['live_latitude'] = $live_close_point['lat'];
        $validator['live_longitude'] = $live_close_point['long'];
        User::where('id', $user_id)->update(
            $validator
        );

        return response()->json([
                'updated' => 'success',
                'updated' => $validator
        ]);
    }

}
