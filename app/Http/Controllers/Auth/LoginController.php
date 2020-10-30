<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
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

    public function showLoginForm(Request $request)
    {
        if(!session()->has('url.intended')) 
        { 
        session(['url.intended' => url()->previous()]); 
        } 
        return view('auth.login'); 
        /*if ($request->has('redirect_to')) {
            session()->put('redirect_to', $request->input('redirect_to'));
        }

        return view('auth.login');*/
    }

    public function redirectTo()
    {
        if (session()->has('redirect_to'))
            return session()->pull('redirect_to');

        return $this->redirectTo;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
