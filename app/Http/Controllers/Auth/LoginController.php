<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use  App\Http\Middleware\CheckBanned;
use  App\Http\Middleware\CheckTypeUesr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends \Illuminate\Routing\Controller
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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
       $this->middleware(CheckBanned::class);
       $this->middleware(CheckTypeUesr::class);

    }
    protected function authenticated(Request $request, $user)
    {
        if($user->status ==1){
            if ($user->type_user==3) {
                return redirect()->route('admin.dashboard');
            }elseif ($user->type_user == 1) {
                return redirect()->route('driver.dashboard'); 
            }elseif ($user->type_user == 2) {
                return redirect()->route('seller.dashboard'); 
            }
            return redirect()->intended('/home');
        }else{
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Your Account is not active, please contact Admin.');
        }
        

        
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    
}
