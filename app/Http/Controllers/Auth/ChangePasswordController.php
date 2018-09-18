<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Where to redirect users after password is changed.
     *
     * @var string $redirectTo
     */
    protected $redirectTo = '/account/profile';

    /**
     * Change password form
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        $user = Auth::getUser();
        return view('site.partials.change_password', compact('user'));
    }
    /**
     * Change password.
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        //dd(\request()->all());
        $user = Auth::getUser();
        $this->validator($request->all())->validate();
        if (Hash::check($request->get('current_password'), $user->password)) {

            $user->password = Hash::make($request->password);
            $user->save();
            //toastr()->success('<b>Password change successfully!</b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
            alert()->success('Good job', 'Password change successfully');
            return redirect($this->redirectTo);
        } else {
            toastr()->error('<b>Current password is incorrect </b>','<button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>');
            return redirect()->back();
        }
    }

    /**
     * Get a validator for an incoming change password request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);
    }
}
