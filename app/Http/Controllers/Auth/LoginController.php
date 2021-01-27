<?php

namespace App\Http\Controllers\Auth;

use App\AppLibrary;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return redirect('/')->with('showLoginModal',true);
    }

    public function loginByEmail(LoginRequest $request)
    {
        $validated = $request->validated();
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password]))
            return response()->json(['status' => 'success']);
        return response()->json(['status' => 'error', 'error' => 'These credentials do not match our records.']);
    }

    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            if (empty($existingUser->photo_url)) {
                User::where('id', $existingUser->id)->update([
                    'photo_url' => $this->storeUserPhoto($user->avatar)
                ]);
            }

            Auth::login($existingUser, true);
            AppLibrary::addMailchimp($existingUser);
        } else {
            $name                            = $this->explodeName($user->name);
            $newUser                         = new User;
            $newUser->first_name             = $name['first_name'];
            $newUser->last_name              = $name['last_name'];
            $newUser->email                  = $user->email;
            $newUser->google_avatar          = $user->avatar;
            $newUser->google_id              = $user->id;
            $newUser->google_avatar_original = $user->avatar_original;
            $newUser->photo_url              = $this->storeUserPhoto($user->avatar);
            $newUser->save();

            Auth::login($newUser, true);
            AppLibrary::addMailchimp($newUser);
        }

        return redirect()->to('/home');
    }

    
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login');
        }

        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            if (empty($existingUser->photo_url)) {
                User::where('id', $existingUser->id)->update([
                    'photo_url' => $this->storeUserPhoto($user->avatar)
                ]);
            }

            Auth::login($existingUser, true);
            AppLibrary::addMailchimp($existingUser);
        } else {
            $name                 = $this->explodeName($user->name);
            $newUser              = new User;
            $newUser->first_name  = $name['first_name'];
            $newUser->last_name   = $name['last_name'];
            $newUser->email       = $user->email;
            $newUser->facebook_id = $user->id;
            $newUser->photo_url   = $this->storeUserPhoto($user->avatar);
            $newUser->save();
            Auth::login($newUser, true);
            AppLibrary::addMailchimp($newUser);
        }

        return redirect()->to('/home');
    }

    public function explodeName($name)
    {
        $split = explode(" ", $name);
        $first_name = $split[0];
        array_shift($split);
        $last_name = implode(" ", $split);
        
        return array(
            'first_name' => $first_name,
            'last_name' => $last_name,
        );
    }

    public function storeUserPhoto($photo)
    {
        $photo = file_get_contents($photo);
        $filename = "user/" . Str::random(40) . '.jpg';
        Storage::disk('public')->put($filename, $photo);
        return url(Storage::url($filename));
    }

}
