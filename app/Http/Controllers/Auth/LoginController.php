<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        /*
         * deny access if account is not verified
         * */
        if($user->user_type != '1x101'){
//            if (!$user->verification_status){
//                auth()->logout();
//                return redirect()->route('login')->with('flash_danger', 'You need to verify your account. We have sent you an activation code, please check your email.');
//            }

            /*
             * deny access if account is not approved
             * */
            if(!$user->approve_status) {
                auth()->logout();
                return redirect()->route('login')->with('flash_danger', 'Your account is not approved . Please contact with authority');
            }

            /*
             * deny access if account is deactivated
             * */
            if(!$user->activation_status) {
                auth()->logout();
                return redirect()->route('login')->with('flash_danger', 'Your account is currently deactivated . Please contact with authority');
            }
        }


        if(session()->has('url.intended')){
            $redirectPath = session()->get('url.intended');
        }else{
            if($user->user_type == '1x101'){
                $redirectPath = "/admin/dashboard";
            }elseif($user->user_type == '2x202' || $user->user_type == '3x303'){
                $redirectPath = "/";
            }
            else{
                $redirectPath = $this->redirectPath();
            }
        }


        return redirect()->intended($redirectPath);

    }
}
