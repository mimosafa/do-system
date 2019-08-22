<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Overwrite Illuminate\Foundation\Auth\AuthenticatesUsers::showLoginForm()
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Overwrite Illuminate\Foundation\Auth\AuthenticatesUsers::loggedOut()
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        return redirect($this->redirectTo . '/login');
    }

    /**
     * Overwrite Illuminate\Foundation\Auth\AuthenticatesUsers::guard()
     */
    public function guard()
    {
        return Auth::guard('admin');
    }
}
