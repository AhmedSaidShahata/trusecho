<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Profile;
use App\Providers\RouteServiceProvider;
use App\SendCode;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

// use Laravel\Socialite\Facades\Socialite;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function login(Request $request)
    {
        $this->validateLogin($request);
        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutResponse($request);
        }


        if($this->guard()->validate($this->credentials($request))){
            $user = $this->guard()->getLastAttempted();

            if($user->active&&$this->attemptLogin($request)){
                return $this->sendLoginResponse($request);
            }
            else{

                $this->incrementLoginAttempts($request);
                $user->code=SendCode::sendCode($user->profile->phone);
                if($user->save()){
                    return redirect(route('user.getverify',$user->profile->phone));
                }
            }
        }

            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request);

        }






















    //========================================= Start login with facebook ===============================

    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {


        $userSocial = Socialite::driver('facebook')->user();

        $findUser = User::where('email', $userSocial->email)->first();

        if ($findUser) {
            Auth::login($findUser);
        } else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);

            Profile::create(['user_id'=>$user->id]);

        }

        return redirect('/homepages');
    }





    //========================================= Start login with google ===============================

    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from google.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallbackGoogle()
    {

        $userSocial = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email', $userSocial->email)->first();
        if ($findUser) {
            Auth::login($findUser);

        } else {
            $user = new User;
            $user->name = $userSocial->name;
            $user->email = $userSocial->email;
            $user->password = bcrypt(123456);
            $user->save();
            Auth::login($user);
            Profile::create(['user_id'=>$user->id]);

        }
        return redirect('/homepages');
    }


}
