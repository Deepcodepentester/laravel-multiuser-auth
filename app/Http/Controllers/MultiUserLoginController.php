<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Auth\Authusers;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


class MultiUserLoginController extends Controller
{
    //
    use Authusers;
    public function showadminLoginForm()
    {
        return view('admin.login');
    }
    public function showvendorLoginForm()
    {
        return view('vendor.login');
    }
    public function adminlogin(Request $request)
    {
        $this->validateLogin($request);
        //dd($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptadminLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request,'admin/');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request); 
    }
    public function vendorlogin(Request $request)
    {
        $this->validateLogin($request);
        //dd($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptvendorLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }

            return $this->sendLoginResponse($request,'vendor/');
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request); 
    }
    protected function attemptadminLogin(Request $request)
    {
        return Auth::guard('admin')->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }

    protected function attemptvendorLogin(Request $request)
    {
        return Auth::guard('vendor')->attempt(
            $this->credentials($request), $request->boolean('remember')
        );
    }
    


}
