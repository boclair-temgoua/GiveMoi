<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use RealRashid\SweetAlert\Facades\Alert;

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




    //protected $redirectTo = 'back';


    protected function authenticated(Request $request, $user)
    {
        return redirect('/home');
    }


    protected function sendFailedLoginResponse(Request $request)
    {

        if ( ! User::where('username', $request->username)->first() ) {

            toastr()->error('<strong>Incorrect username try again</strong>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>', ['timeOut' => 5000]);
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    $this->username() => Lang::get('auth.username'),
                ]);
        }

        if ( ! User::where('username', $request->username)->where('password', bcrypt($request->password))->first() ) {

            toastr()->error('<strong>Incorrect password</strong>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>', ['timeOut' => 5000]);
            return redirect()->back()
                ->withInput($request->only($this->username(), 'remember'))
                ->withErrors([
                    'password' => Lang::get('auth.password'),
                ]);
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','UserLogout');
    }



    public function username()
    {
        $loginType = request()->input('username');
        $this->username = filter_var($loginType, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        request()->merge([$this->username => $loginType]);

        return property_exists($this, 'username') ? $this->username : 'email';
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {

        return array_merge(
            $request->only($this->username(), 'password'),
            ['confirmation_token' => null]
        );
    }
    /**
     * Send the response after the user was authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        $this->clearLoginAttempts($request);


        toastr()->success('<strong>Welcome to you </strong>'.' '.Auth::user()->username,'<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>', ['timeOut'=>5000]);
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended($this->redirectPath());
    }


    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function UserLogout()
    {
        Auth::guard('web')->logout();



       // toastr()->success('See you soon!', '',['timeOut'=>5000]);
        toastr()->success('<b>See you soon !</b> <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>','',['timeOut'=>5000]);
        return redirect('/');
    }

}









