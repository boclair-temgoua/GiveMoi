<?php

namespace App\Http\Controllers\Auth;

use App\Mail\Welcome;
use App\Notifications\UserConfirmedAccount;
use App\User;
use App\Notifications\RegisteredUsers;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }



    public function confirmAccount($id, $token) {
        $user = User::where('id', $id)->where('confirmation_token', $token)->first();
        if ($user) {
            $user->update(['confirmation_token' => null]);


            $this->guard()->login($user);


            //Mail::to($user)->send(new Welcome($user));
            $user->notify(new UserConfirmedAccount());

            toastr()->success('', 'Compte confirmer avec succès!', ['timeOut'=> 5000]);
            //Alert::success('Success', 'Votre compte a bien été confirmé !');
            return redirect($this->redirectPath());
        } else {
            alert()->error('Oops','Ce lien ne semble plus etre valide');
            return redirect('/login');
        }
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        $user->notify(new RegisteredUsers());

        alert()->success('Success','Votre compte a été bien créer bien vouloir vérifier votre address mail pour la confirmation!')->persistent('Close Me!');
        return $this->registered($request, $user)
            ?: redirect('/login');
    }


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|alpha_dash|string|unique:users,username',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            "status" => "required|in:Yes",
            'birthday' => 'required|before:today',
            'g-recaptcha-response' => 'required|captcha',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'status' => $data['status'],
            'email' => $data['email'],
            "birthday" => $data['birthday'],
            'password' => bcrypt($data['password']),
            'confirmation_token'=> str_replace('/','',bcrypt(str_random(16)))
        ]);
    }
}
