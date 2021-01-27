<?php

namespace App\Http\Controllers\Auth;

use App\AppLibrary;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Location;
use App\Providers\RouteServiceProvider;
use App\User;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Session;

class RegisterController extends Controller
{
    /*
      |--------------------------------------------------------------------------
      | Register Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the registration of new users as well as their
      | validation and creation. By default this controller uses a trait to
      | provide this functionality without requiring any additional code.
      |
     */

use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function registerUser(RegisterRequest $request)
    {
        $validated = $request->validated();
        $redirect = empty($request->redirect) ? route('account') : urldecode($request->redirect);
        unset($validated['redirect']);
        $this->create($validated);
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        $user = Auth::user();
        $this->registered($request, $user, false);

        $user = User::where('id', $user->id)->first();
        if (empty($user->moving_from) || empty($user->moving_to))
            return response()->json(['status' => 'success', 'redirect' => route('register_steps')]);
        return response()->json(['status' => 'success', 'redirect' => $redirect]);
    }

    public function showRegistrationForm(Request $request)
    {
        return redirect('/')->with('showRegisterModal',true);

        $ref = $request->input('ref');

        if (!empty($ref)) {
            Session::put('ref', $ref);
        }

//        if(empty(Session::get('reg_steps_info'))) {
//            return redirect('register_steps#step1a');
//        }
//        return view('auth.register');
        return redirect('register_steps');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
                'first_name' => ['required', 'string', 'max:255'],
                'last_name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request, $user, $redirect = true)
    {
        $faves = $request->session()->get('location_faves');
        if (!empty($faves)) {
            foreach ($faves as $fave) {
                Location::saveUserFave($user, (object) ['fave' => 1, 'location_id' => $fave]);
            }
            $request->session()->forget('location_faves');
        }

        $reg_steps_info = $request->session()->get('reg_steps_info');

        if (empty($reg_steps_info))
            return;

        $live_close = empty($reg_steps_info['live_close']) ? '' : $reg_steps_info['live_close'];
        try {
            $live_close_point = get_lat_long($live_close);
        } catch (Exception $ex) {
            // OneMap has issues
            $live_close_point = ['lat' => User::DEFAULT_LATITUDE, 'long' => User::DEFAULT_LONGITUDE, 'address' => User::DEFAULT_ADDRESS];
        }
        DB::table('users')->where(['id' => $user->id])->update([
            'moving_from' => empty($reg_steps_info['moving_from']) ? null : $reg_steps_info['moving_from'],
            'moving_to' => empty($reg_steps_info['moving_to']) ? null : $reg_steps_info['moving_to'],
            'live_close' => $live_close_point['address'],
            'live_latitude' => $live_close_point['lat'],
            'live_longitude' => $live_close_point['long'],
            'remoteness' => empty($reg_steps_info['remoteness']) ? 10 : $reg_steps_info['remoteness'],
            'transport' => empty($reg_steps_info['transport']) ? 'drive' : $reg_steps_info['transport'],
            'property_type' => empty($reg_steps_info['property_type']) ? null : $reg_steps_info['property_type']
        ]);

        DB::table('user_services')->where(['user_id' => $user->id])->delete();
        if (!empty($reg_steps_info['services'])) {
            $services = trim($reg_steps_info['services']);
            $servs = explode(',', $services);
            foreach ($servs as $service_id) {
                DB::table('user_services')->insert(['user_id' => $user->id, 'service_id' => $service_id]);
            }
        }

        DB::table('user_prefs')->where(['user_id' => $user->id])->delete();
        if (!empty($reg_steps_info['preferences'])) {
            $preferences = trim($reg_steps_info['preferences']);
            $prefs = explode(',', $preferences);
            foreach ($prefs as $pref_id) {
                DB::table('user_prefs')->insert(['user_id' => $user->id, 'pref_id' => $pref_id]);
            }
        }

        $user = User::where('id', $user->id)->first();
        AppLibrary::addMailchimp($user);

        if ($redirect && Session::has('ref')) {
            return redirect(Session::get('ref'));
        }

    }

}
