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

        // This section is the only change
        if ($this->guard()->validate($this->credentials($request))) {

            // Make sure the user is active
            if ($this->attemptLogin($request)) {
                // Send the normal successful login response
                return $this->sendLoginResponse($request);
            }
        }

        return $this->sendFailedLoginResponse($request);
    }

    public function authenticated($request, $user)
    {
        if ($user->hasRole('Supervisor')) {
            return redirect()->route('supervisor.index');
        } elseif ($user->hasRole('CS')) {
            return redirect()->route('cs.index');
        } else {
            return redirect()->route('home');
        }
    }
}
