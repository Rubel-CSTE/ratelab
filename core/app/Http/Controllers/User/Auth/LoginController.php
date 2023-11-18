<?php

namespace App\Http\Controllers\User\Auth;

use App\Models\User;
use App\Constants\Status;
use App\Models\UserLogin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\AdminNotification;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


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

    protected $username;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest')->except('logout');
        $this->username = $this->findUsername();
    }

    public function showLoginForm()
    {
        $pageTitle = "Login";
        return view($this->activeTemplate . 'user.auth.login', compact('pageTitle'));
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);
        
        $request->session()->regenerateToken();
        
        if(!verifyCaptcha()){
            $notify[] = ['error','Invalid captcha provided'];
            return back()->withNotify($notify);
        }



        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);


        return $this->sendFailedLoginResponse($request);
    }

    public function findUsername()
    {
        $login = request()->input('username');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$fieldType => $login]);
        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    protected function validateLogin(Request $request)
    {

        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

    }

    public function logout()
    {
        $this->guard()->logout();

        request()->session()->invalidate();

        $notify[] = ['success', 'You have been logged out.'];
        return to_route('user.login')->withNotify($notify);
    }





    public function authenticated(Request $request, $user)
    {
        $ip = getRealIP();
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();
        if ($exist) {
            $userLogin->longitude    = $exist->longitude;
            $userLogin->latitude     = $exist->latitude;
            $userLogin->city         = $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country      = $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude    = @implode(',',$info['long']);
            $userLogin->latitude     = @implode(',',$info['lat']);
            $userLogin->city         = @implode(',',$info['city']);
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country      = @implode(',', $info['country']);
        }
        
        
        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();

        return to_route('user.home');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // dd(Socialite::driver('google')->user());
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Google authentication failed.');
        }

        // Check if the user already exists in your database
        $existingUser = User::where(['provider' => 'google', 'provider_id' => $user->id])->first();

        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {

            $data = [
                'username' => trim($user->name) ?? trim($user->nickname),
                'email' => $user->email,
                'provider' => 'google',
                'provider_id' => $user->id,
            ];
            
            // Create a new user
            $newUser = $this->create($data);
            // $newUser->username = trim($user->name) ?? trim($user->nickname);
            // $newUser->email = $user->email;
            // $newUser->password = \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::random(6));
            // // $newUser->google_id = $user->id; // Add a google_id column to your users table
            // $newUser->save();
    
            // Log in the new user
            Auth::login($newUser);
        }
    
        return to_route('user.home');
    }

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Facebook authentication failed.');
        }
    
        // Check if the user already exists in your database
        $existingUser = User::where(['provider' => 'facebook', 'provider_id' => $user->id])->first();
    
        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {

            $data = [
                'username' => trim($user->name) ?? trim($user->nickname),
                'email' => $user->email,
                'provider' => 'facebook',
                'provider_id' => $user->id,
            ];

            // Create a new user
            $newUser = $this->create($data);
    
            // Log in the new user
            Auth::login($newUser);
        }
    
        return to_route('user.home');
    }

    public function redirectToApple()
    {
        return Socialite::driver('apple')->redirect();
    }

    public function handleAppleCallback()
    {
        try {
            $user = Socialite::driver('apple')->user();
        } catch (\Exception $e) {
            return redirect('/login')->withErrors('Apple authentication failed.');
        }
    
        // Check if the user already exists in your database
        $existingUser = User::where(['provider' => 'apple', 'provider_id' => $user->id])->first();
    
        if ($existingUser) {
            // Log in the existing user
            Auth::login($existingUser);
        } else {

            $data = [
                'username' => trim($user->name) ?? trim($user->nickname),
                'email' => $user->email,
                'provider' => 'apple',
                'provider_id' => $user->id,
            ];

            // Create a new user
            $newUser = $this->create($data);
    
            // Log in the new user
            Auth::login($newUser);
        }
    
        return to_route('user.home');
    }

    protected function create(array $data)
    {
        $general = gs();
       
        //User Create
        $user = new User();
        $user->email = strtolower(trim($data['email']));
        $user->password = Hash::make(Str::random(6));
        $user->username = trim($data['username']);
        $user->provider = trim($data['provider']);
        $user->provider_id = trim($data['provider_id']);
        // $user->country_code = $data['country_code'];
        // $user->mobile = $data['mobile_code'].$data['mobile'];
        $user->address = [
            'address' => '',
            'state' => '',
            'zip' => '',
            'country' => isset($data['country']) ? $data['country'] : null,
            'city' => ''
        ];
        $user->ev = Status::YES;
        $user->sv = Status::YES;
        $user->save();


        $adminNotification = new AdminNotification();
        $adminNotification->user_id = $user->id;
        $adminNotification->title = 'New member registered';
        $adminNotification->click_url = urlPath('admin.users.detail',$user->id);
        $adminNotification->save();


        //Login Log Create
        $ip = getRealIP();
        $exist = UserLogin::where('user_ip',$ip)->first();
        $userLogin = new UserLogin();

        //Check exist or not
        if ($exist) {
            $userLogin->longitude =  $exist->longitude;
            $userLogin->latitude =  $exist->latitude;
            $userLogin->city =  $exist->city;
            $userLogin->country_code = $exist->country_code;
            $userLogin->country =  $exist->country;
        }else{
            $info = json_decode(json_encode(getIpInfo()), true);
            $userLogin->longitude =  @implode(',',$info['long']);
            $userLogin->latitude =  @implode(',',$info['lat']);
            $userLogin->city =  @implode(',',$info['city']);
            $userLogin->country_code = @implode(',',$info['code']);
            $userLogin->country =  @implode(',', $info['country']);
        }

        $userAgent = osBrowser();
        $userLogin->user_id = $user->id;
        $userLogin->user_ip =  $ip;

        $userLogin->browser = @$userAgent['browser'];
        $userLogin->os = @$userAgent['os_platform'];
        $userLogin->save();


        return $user;
    }

}
